<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AuthController extends Controller
{
    public function index()
    {
        // Logic to show all products
        return view('login.reriter');
    }
    public function index1()
    {
        $categories = Category::where('name', 'Vũ trụ')
        ->whereHas('children') 
        ->with('children')
        ->whereNull('parent_id')
        ->get();
        return view('fonend.home' ,compact('categories'));
    }
}
