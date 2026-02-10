<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
