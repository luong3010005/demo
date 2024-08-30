<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CelestialBody;
use App\Models\Category;

use Illuminate\Support\Str;
class ManagementController extends Controller
{


    public function index()
    {
        $celestialBodies = CelestialBody::all();
        return view('admin.management-show', compact('celestialBodies'));
    }



    // public function showCategoriesWithProducts()
    // {
    //     // Retrieve celestial bodies that are of type 'Hành tinh'
    //     $planet = CelestialBody::where('type', 'Hành tinh')->get();
    
    //     // Filter categories based on specific subcategory names
    //     $categories = Category::whereIn('name', ['type',  'Sao kim ', 'Sao hỏa', 'long'])->get();
    
      
    //     $products = CelestialBody::whereIn('category_id', $categories->pluck('id'))->get();
    
    //     // Return the view with the celestial bodies, categories, and products
    //     return view('danhmuc', compact('planet', 'categories', 'products'));
    // }
    


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
            'content' => 'required|string',
            'mass' => 'nullable|numeric',
            'radius' => 'nullable|numeric',
            'distance_from_sun' => 'nullable|numeric',
            'orbital_period' => 'nullable|numeric',
            'discovery_year' => 'nullable|integer|digits:4',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images', 'public');
            $validated['images'] = $imagePath;
        }

        CelestialBody::create($validated);

        return redirect()->back()->with('success', 'Celestial Body added successfully!');
    }



    public function edit(CelestialBody $celestialBody)
    {
        $categories = Category::all();
        return view('admin.management-edit', compact('celestialBody', 'categories'));
    }

   


    public function update(Request $request, CelestialBody $celestialBody)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'mass' => 'nullable|numeric',
            'radius' => 'nullable|numeric',
            'distance_from_sun' => 'nullable|numeric',
            'orbital_period' => 'nullable|numeric',
            'discovery_year' => 'nullable|integer|digits:4',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('images')) {
            if ($celestialBody->images) {
                \Storage::disk('public')->delete($celestialBody->images);
            }

            $imagePath = $request->file('images')->store('images', 'public');
            $validated['images'] = $imagePath;
        }

        $celestialBody->update($validated);

        return redirect()->route('management-show')->with('success', 'Celestial Body updated successfully!');
    }




    public function destroy(CelestialBody $celestialBody)
    {
        // Delete the image file if it exists
        if ($celestialBody->images) {
            \Storage::disk('public')->delete($celestialBody->images);
        }

        $celestialBody->delete();

        return redirect()->route('management-show')->with('success', 'Celestial Body deleted successfully!');
    }









}

