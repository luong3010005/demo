<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observatory extends Model
{
    use HasFactory;

    // Các cột có thể gán giá trị một cách hàng loạt (mass assignable)
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];
}
