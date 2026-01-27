<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CartController extends Controller
{
    public function index(): Response {
        return Inertia::render('Cart/Index');
    }

    public function update(Request $request, string $productId): RedirectResponse {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $validated['quantity'];
            session()->put('cart', $cart);

            return back()->with('success', 'Kosár frissítve!');
        }

        return back()->with('error', 'Termék nem található a kosárban.');
    }

    public function remove(string $productId): RedirectResponse {
        $cart = session('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);

            return back()->with('success', 'Termék eltávolítva a kosárból.');
        }

        return back()->with('error', 'Termék nem található a kosárban.');
    }

    public function add(Request $request): RedirectResponse {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$validated['product_id']])) {
            $cart[$validated['product_id']]['quantity'] += $validated['quantity'];
        } else {
            $product = Product::find($validated['product_id']);
            $cart[$validated['product_id']] = [
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => $validated['quantity'],
                'image' => $product->getImageUrl(),
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Termék hozzáadva a kosárhoz!');
    }
}
