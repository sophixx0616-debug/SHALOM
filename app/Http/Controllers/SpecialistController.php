<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::all();

        return view('specialists.index', compact('specialists'));
    }

    public function create()
    {
        return view('specialists.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'specialty' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $data = [
        'name' => $request->name,
        'specialty' => $request->specialty,
    ];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('specialists', 'public');
    }

    Specialist::create($data);

    return redirect()
        ->route('specialists.index')
        ->with('success', 'Especialista creada correctamente');
}
    public function show(Specialist $specialist)
    {
        return view('specialists.show', compact('specialist'));
    }

    public function edit(Specialist $specialist)
    {
        return view('specialists.edit', compact('specialist'));
    }

    public function update(Request $request, Specialist $specialist)
{
    $request->validate([
        'name' => 'required',
        'specialty' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $data = [
        'name' => $request->name,
        'specialty' => $request->specialty,
    ];

    if ($request->hasFile('image')) {

        // Elimina la imagen anterior
        if ($specialist->image && Storage::disk('public')->exists($specialist->image)) {
            Storage::disk('public')->delete($specialist->image);
        }

        // Guarda la nueva
        $data['image'] = $request->file('image')->store('specialists', 'public');
    }

    $specialist->update($data);

    return redirect()
        ->route('specialists.index')
        ->with('success', 'Especialista actualizada correctamente');
}

    public function destroy(Specialist $specialist)
    {
        $specialist->delete();

        return redirect()
            ->route('specialists.index')
            ->with('success', 'Especialista eliminada correctamente');
    }
}