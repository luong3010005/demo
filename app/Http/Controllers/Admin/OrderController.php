<?php

// app/Http/Controllers/Admin/OrderController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items');
        return view('admin.orders_show', compact('order'));
    }


    
}
