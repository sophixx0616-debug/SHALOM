<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    public function index()
    {
        $items = Inventory::all();

        $totalProductos = $items->count();
        $stockBajo = $items->where('stock', '<=', 5)->count();
        $sinStock = $items->where('stock', 0)->count();

        return view('inventory.index', compact(
            'items',
            'totalProductos',
            'stockBajo',
            'sinStock'
        ));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('inventory', 'public');
        }

        Inventory::create([
            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('inventory.index')
            ->with('success', 'Producto agregado correctamente');
    }

    public function edit($id)
    {
        $item = Inventory::findOrFail($id);

        return view('inventory.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $item = Inventory::findOrFail($id);

        $imagePath = $item->image;

        if ($request->hasFile('image')) {

            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }

            $imagePath = $request->file('image')->store('inventory', 'public');
        }

        $item->update([
            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('inventory.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $item = Inventory::findOrFail($id);

        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()
            ->route('inventory.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}