<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children.children')->whereNull('parent_id')->get();
        return view('admin.category-index', compact('categories'));
    }
    
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $categories = Category::all();
        return view('admin.danhmuc', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_name' => 'nullable|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'child_parent_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->filled('parent_name')) {
            $parentSlug = Str::slug($request->input('parent_name'), '-');
            Category::create([
                'name' => $request->input('parent_name'),
                'slug' => $parentSlug,
                'parent_id' => null,
            ]);
        }

        if ($request->filled('child_name') && $request->filled('child_parent_id')) {
            $childSlug = Str::slug($request->input('child_name'), '-');
            Category::create([
                'name' => $request->input('child_name'),
                'slug' => $childSlug,
                'parent_id' => $request->input('child_parent_id'),
            ]);
        }

        if ($request->filled('grandchild_name') && $request->filled('grandchild_parent_id')) {
            $grandchildSlug = Str::slug($request->input('grandchild_name'), '-');
            Category::create([
                'name' => $request->input('grandchild_name'),
                'slug' => $grandchildSlug,
                'parent_id' => $request->input('grandchild_parent_id'),
            ]);
        }

        return redirect()->route('categories.create')->with('success', 'Categories created successfully.');
    }


    public function edit(Category $category)
    {
        // Show the edit form for a category
        return view('admin.category-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the category
        $category->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'), '-'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function show($id)
    {
        $category = Category::with('children.children')->findOrFail($id);
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category-show', compact('category', 'categories'));
    }



    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Optional: Handle deletion of child categories
        $category->children()->delete();

        $category->delete();

        return redirect()->route('categories.create')->with('success', 'Category deleted successfully.');
    }
//     public function index1($slug)
// {
//     $category = Category::where('slug', $slug)
//         ->with(['children.celestialBodies']) 
//         ->firstOrFail();

//     if ($slug === 'cac-vi-sao') {
//         $category->children = $category->children->random(min(3, $category->children->count()));
//     }

//     return view('fonend.index', compact('category'));
// }

public function index1($slug)
{
    $category = Category::where('slug', $slug)
        ->with(['children.celestialBodies']) 
        ->firstOrFail();

    if ($slug === 'cac-vi-sao') {
        $desiredChildrenSlugs = ['sao-hoa', 'sao-kim', 'sao-moc'];

        $category->children = $category->children->filter(function ($child) use ($desiredChildrenSlugs) {
            return in_array($child->slug, $desiredChildrenSlugs);
        });
    }

    return view('fonend.index', compact('category'));
}


}
