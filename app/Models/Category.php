<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id'];

    // Mối quan hệ danh mục cha
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Mối quan hệ danh mục con
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


}
