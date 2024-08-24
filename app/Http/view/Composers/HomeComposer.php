<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\CelestialBody;
use App\Models\Category;





class HomeComposer
{
    public function compose(View $view)
    {
        $categories = Category::where('name', 'Các Vì Sao')
            ->whereHas('children') 
            ->with('children')
            ->whereNull('parent_id')
            ->get();

        $view->with('categories', $categories);
    }
}
