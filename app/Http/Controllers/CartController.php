<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; // Importante: Usamos el modelo de tu compañera

class CartController extends Controller
{
    // 1. Mostrar el carrito (La página donde se ve la lista)
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // 2. Añadir al carrito con validación de stock (Coherencia)
    public function add(Request $request, $id)
    {
        // Buscamos el producto en el inventario de ella
        $product = Inventory::findOrFail($id);

        // Verificamos si hay existencias
        if ($product->stock <= 0) {
            return back()->with('error', '¡Lo sentimos! No hay stock de ' . $product->name);
        }

        $cart = session()->get('cart', []);

        // Si ya está en el carrito, verificamos que no pida más de lo que hay
        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] + 1 > $product->stock) {
                return back()->with('error', 'No puedes añadir más; solo quedan ' . $product->stock . ' unidades.');
            }
            $cart[$id]['quantity']++;
        } else {
            // Si es nuevo, lo guardamos con sus datos de inventario
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image ?? 'default-product.png'
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', $product->name . ' se añadió al carrito.');
    }

    // 3. Eliminar un item del carrito
    public function remove($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return back()->with('success', 'Producto eliminado.');
    }
// 4. Añadir un Servicio al carrito (Funcionalidad extra)
    public function addService(Request $request, $id)
    {
        // Buscamos el servicio en tu tabla
        $service = \App\Models\Service::findOrFail($id);

        $cart = session()->get('cart', []);

        // Si el servicio ya está en la bolsa, no lo duplicamos, solo avisamos
        if(isset($cart['service_' . $id])) {
            return back()->with('error', 'Este servicio ya está en tu agenda de la bolsa.');
        }

        // Lo guardamos en la sesión con un identificador único para servicios
        $cart['service_' . $id] = [
            "name" => $service->name . " (Servicio)",
            "quantity" => 1,
            "price" => $service->price,
            "image" => "service-icon" // Etiqueta para identificar que es un servicio
        ];

        session()->put('cart', $cart);
        return back()->with('success', '¡' . $service->name . ' se añadió a tu bolsa de experiencias!');
    }
}
