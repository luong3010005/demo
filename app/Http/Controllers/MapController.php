<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    public function index()
    {
        $maps = Map::all();
        return view('admin.indexmap', compact('maps'));
    }
    public function index1()
    {
        $maps = Map::all();
        return view('fonend.map', compact('maps'));
    }

    public function create()
    {
        return view('admin.map');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Correct variable name here
            'url' => 'required|url',
        ]);
    
        $map = new Map();
        $map->name = $request->name;
        $map->content = $request->content;
    
        if ($request->hasFile('image')) { // Correct variable name here
            $imagePath = $request->file('image')->store('images', 'public'); // Correct variable name here
            $map->image = $imagePath; // Assign to correct attribute
        }
    
        $map->url = $request->url;
        $map->save();
    
        return redirect()->route('maps.index')->with('success', 'Map added successfully.');
    }
    

    public function edit(Map $map)
    {
        return view('admin.editmap', compact('map'));
    }

    public function update(Request $request, Map $map)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'url' => 'required|url',
        ]);

        $map->name = $request->name;
        $map->content = $request->content;

        if ($request->hasFile('image')) {
            if ($map->image) {
                Storage::disk('public')->delete($map->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $map->image = $imagePath;
        }

        $map->url = $request->url;
        $map->save();

        return redirect()->route('maps.index')->with('success', 'Map updated successfully.');
    }

    public function destroy(Map $map)
    {
        if ($map->image) {
            Storage::disk('public')->delete($map->image);
        }
        $map->delete();
        return redirect()->route('maps.index')->with('success', 'Map deleted successfully.');
    }
}
