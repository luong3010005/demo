<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->sale_price ?? $product->price,
                "image_url" => $product->image_url
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
    
        foreach ($request->input('cart', []) as $id => $item) {
            if (isset($item['id']) && isset($item['quantity'])) {
                $quantity = $item['quantity'];
    
                if (isset($cart[$id])) {
                    if ($quantity > 0) {
                        $cart[$id]['quantity'] = $quantity;
                    } else {
                        unset($cart[$id]);
                    }
                }
            }
        }
    
        session()->put('cart', $cart);
    
        return response()->json(['success' => true]);
    }
    

    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
