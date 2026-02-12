<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable = [

        'user_id',
        'total_price',
        'cart_id',
        'address_id',
        'status',
        'payment_status',
        'stripe_session_id'

    ];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }



}
