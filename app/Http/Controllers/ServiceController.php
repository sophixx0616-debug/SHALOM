<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'duration' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $image = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('services', 'public');
    }

    Service::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'duration' => $request->duration,
        'status' => 1,
        'image' => $image
    ]);

    return redirect()
        ->route('services.index')
        ->with('success', 'Servicio creado correctamente');
}

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('services.edit', compact('service'));
    }

  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'duration' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $service = Service::findOrFail($id);

    $image = $service->image;

    if ($request->hasFile('image')) {

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $image = $request->file('image')->store('services', 'public');
    }

    $service->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'duration' => $request->duration,
        'image' => $image
        
    ]);
    if ($request->remove_image) {

    if ($service->image && Storage::disk('public')->exists($service->image)) {
        Storage::disk('public')->delete($service->image);
    }

    $data['image'] = null;
}

    return redirect()
        ->route('services.index')
        ->with('success', 'Servicio actualizado correctamente');
}
   public function destroy($id)
{
    $service = Service::findOrFail($id);

    if ($service->image) {
        Storage::disk('public')->delete($service->image);
    }

    $service->delete();

    return redirect()
        ->route('services.index')
        ->with('success', 'Servicio eliminado correctamente');
}
}