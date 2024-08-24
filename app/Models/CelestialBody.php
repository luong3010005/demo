<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CelestialBody extends Model
{
    use HasFactory;

    // Add 'name' to the fillable property
    protected $fillable = [
        'name',
        'content',
        'slug',
        'type',
        'category_id',
        'mass',
        'radius',
        'distance_from_sun',
        'orbital_period',
        'discovery_year',
        'images', 
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Optionally, you might want to specify which attributes are hidden or casts
    // protected $hidden = [];
    // protected $casts = [];
}
