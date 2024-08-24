<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'city', 'zip', 'country', 'total_amount',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}