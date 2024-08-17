<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        // Logic to show all products
        return view('login.reriter');
    }
    public function index1()
    {
        // Logic to show all products
        return view('fonend.home');
    }
}
