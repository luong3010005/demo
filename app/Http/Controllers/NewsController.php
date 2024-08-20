<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        // Fetch all news records with pagination
        $news = News::paginate(10); // Adjust the number of records per page as needed
    
        // Return view with news records
        return view('admin.new_show', compact('news'));
    }

    public function createnews()
    {
        return view('admin.news'); // Đảm bảo view tồn tại tại `resources/views/admin/news.blade.php`
    }
    
    public function storeNews(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images', 'public');
            $validated['images'] = $imagePath;
        }

        News::create($validated);

        return redirect()->back()->with('success', 'News item added successfully!');
    }
    
    public function newedit($id)
{
    $news = News::findOrFail($id);

    return view('admin.new_edit', compact('news'));
}

public function newupdate(Request $request, $id)
{
    // Validate the incoming request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'short_description' => 'required|string',
        'long_description' => 'required|string',
        'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $news = News::findOrFail($id);

    $validated['slug'] = Str::slug($validated['name']);

    if ($request->hasFile('images')) {
        if ($news->images) {
            \Storage::disk('public')->delete($news->images);
        }

        $imagePath = $request->file('images')->store('images', 'public');
        $validated['images'] = $imagePath;
    } else {
        $validated['images'] = $news->images;
    }
    $news->update($validated);
    return redirect()->route('news.index')->with('success', 'News item updated successfully!');
}


public function newdestroy($id)
{
    $news = News::findOrFail($id);
    if ($news->images) {
        \Storage::disk('public')->delete($news->images);
    }
    $news->delete();
    return redirect()->route('news.index')->with('success', 'News item deleted successfully!');
}

}
