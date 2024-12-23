<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_title',
        'price',
        'customer_info',
        'payment_info'
    ];

    public function orderStatus()
    {
        return $this->hasMany(OrderStatusProduct::class, 'order_id');
    }

    public function latestStatus()
    {
        return $this->hasOne(OrderStatusProduct::class, 'order_id')->latest();
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
