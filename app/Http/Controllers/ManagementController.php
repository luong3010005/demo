<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CelestialBody;
use App\Models\Category;
use App\Models\DiscoveryData;
use App\Models\Moon;
use App\Models\Media;
use App\Models\Planet; 

use Illuminate\Support\Str; 
class ManagementController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $celestialBodies = CelestialBody::all();
        $planets = CelestialBody::where('type', 'Hành tinh')->get();
        return view('admin.management-create', compact('categories', 'celestialBodies', 'planets'));
    }

    public function storeCelestialBody(Request $request)
    {
        // Validate and handle celestial body data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'mass' => 'nullable|numeric',
            'radius' => 'nullable|numeric',
            'distance_from_sun' => 'nullable|numeric',
            'orbital_period' => 'nullable|numeric',
            'discovery_year' => 'nullable|integer|digits:4',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Handle image upload
        ]);
    
        // Generate slug based on the celestial body's name
        $validated['slug'] = Str::slug($validated['name']);
    
        // Handle image upload if it exists
        if ($request->hasFile('images')) {
            // Store the image in the 'public/images' directory
            $imagePath = $request->file('images')->store('images', 'public');
            $validated['images'] = $imagePath;
        }
    
        // Create the celestial body
        CelestialBody::create($validated);
    
        return redirect()->back()->with('success', 'Celestial Body added successfully!');
    }
    
}

