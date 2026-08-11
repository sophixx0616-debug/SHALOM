<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;

class AppointmentController extends \Illuminate\Routing\Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role->name === 'admin') {

            $appointments = Appointment::with([
                'user',
                'service'
            ])->get();
        } else {

            $appointments = Appointment::with([
                'service'
            ])
                ->where('user_id', Auth::id())
                ->get();
        }

        return view('appointments.index', compact('appointments'));
    }

    public function show(Appointment $appointment)
    {
        if (Auth::user()->role->name !== 'admin' && $appointment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('appointments.show', compact('appointment'));
    }

    public function create()
    {
        $services = Service::all();
        $specialists = Specialist::all();
        $takenTimes = Appointment::where('date', now()->toDateString())
            ->pluck('time')
            ->toArray();

        return view(
            'appointments.create',
            compact('services', 'specialists', 'takenTimes')
        );
    }

    public function store(StoreAppointmentRequest $request)
    {
        $exists = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if ($exists) {
            return back()->with(
                'error',
                'Ya existe una cita en esa fecha y hora.'
            );
        }

        Appointment::create([
            'user_id'    => Auth::id(),
            'service_id' => $request->service_id,
            'date'       => $request->date,
            'time'       => $request->time,
            'worker'     => $request->worker,
            'status'     => 'pendiente'
        ]);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita creada correctamente');
    }

    public function calendar()
    {
        $appointments = Appointment::with([
            'service',
            'user'
        ])->get();

        $events = $appointments->map(function ($a) {
            return [
                'title' => $a->service->name . ' - ' . $a->user->name,
                'start' => $a->date . 'T' . $a->time,
            ];
        });

        return view('appointments.calendar', compact('events'));
    }

    public function edit(Appointment $appointment)
    {
        if (Auth::user()->role->name !== 'admin' && $appointment->user_id !== Auth::id()) {
            abort(403);
        }

        $services = Service::all();
        $specialists = Specialist::all();

        return view('appointments.edit', compact(
            'appointment',
            'services',
            'specialists'
        ));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        if (Auth::user()->role->name !== 'admin' && $appointment->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validated();

        if (Auth::user()->role->name !== 'admin') {
            unset($data['status']);
        }

        $appointment->update($data);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita actualizada correctamente');
    }

    public function cancel(Appointment $appointment)
    {
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }

        $appointment->update(['status' => 'cancelada']);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita cancelada correctamente');
    }

    public function destroy(Appointment $appointment)
    {
        if (Auth::user()->role->name !== 'admin') {
            abort(403);
        }

        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita eliminada correctamente');
    }
}
