<?php

namespace App\Http\Controllers;

use App\Models\Observatory;
use Illuminate\Http\Request;

class ObservatoryController extends Controller
{
    public function index()
    {
        $observatories = Observatory::all();
        return view('fonend.observatories', compact('observatories'));
    }

    public function create()
    {
        return view('admin.observatories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Observatory::create($request->all());
        return redirect()->route('observatories.index');
    }

    public function edit(Observatory $observatory)
    {
        return view('observatories.edit', compact('observatory'));
    }

    public function update(Request $request, Observatory $observatory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $observatory->update($request->all());
        return redirect()->route('observatories.index');
    }

    public function destroy(Observatory $observatory)
    {
        $observatory->delete();
        return redirect()->route('observatories.index');
    }
}
