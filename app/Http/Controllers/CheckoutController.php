<?php

// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CartItem;

class CheckoutController extends Controller
{
    public function create()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'country' => 'required|string|max:255',
        ]);

        // Calculate total amount
        $cart = session()->get('cart', []);
        $totalAmount = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Create Order
        $order = Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'country' => $request->country,
            'total_amount' => $totalAmount,
        ]);

        // Save Cart Items
        foreach ($cart as $id => $details) {
            $order->items()->create([
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        // Clear Cart
        session()->forget('cart');

        return redirect()->route('checkout.success');
    }
}
