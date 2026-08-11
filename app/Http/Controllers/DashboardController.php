<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Inventory;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Si es administrador
        if ($user->role && $user->role->name === 'admin') {
            $usuarios = User::count();
            $citas = Appointment::count();
            $servicios = Service::count();
            $productos = Inventory::count();

            $ultimasCitas = Appointment::with(['user', 'service'])
                ->latest()
                ->take(5)
                ->get();

            return view('dashboard', compact(
                'usuarios',
                'citas',
                'servicios',
                'productos',
                'ultimasCitas'
            ));
        }

        // Usuario normal
        $misCitas = Appointment::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('misCitas'));
    }

    public function reportes()
    {
        $citas = Appointment::with(['user', 'service'])
            ->latest()
            ->take(20)
            ->get();

        return view('reportes.citas', compact('citas'));
    }
    public function serviciosMasSolicitados()
{
    $servicios = \App\Models\Appointment::selectRaw(
        'service_id, COUNT(*) as total'
    )
    ->with('service')
    ->groupBy('service_id')
    ->orderByDesc('total')
    ->get();

    return view(
        'reportes.servicios',
        compact('servicios')
    );
}
public function especialistasMasSolicitadas()
{
    $especialistas = \App\Models\Appointment::selectRaw(
        'worker, COUNT(*) as total'
    )
    ->groupBy('worker')
    ->orderByDesc('total')
    ->get();

    return view(
        'reportes.especialistas',
        compact('especialistas')
    );
}
public function inventarioBajo()
{
    $productos = \App\Models\Inventory::where('quantity', '<=', 5)
        ->orderBy('quantity')
        ->get();

    return view(
        'reportes.inventario-bajo',
        compact('productos')
    );
}
public function ingresosEstimados()
{
    $citas = \App\Models\Appointment::with('service')->get();

    $ingresos = 0;

    foreach ($citas as $cita) {

        if ($cita->service) {

            $ingresos += $cita->service->price;
        }
    }

    return view(
        'reportes.ingresos',
        compact('ingresos', 'citas')
    );
}
}
