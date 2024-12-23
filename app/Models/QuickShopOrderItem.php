<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickShopOrderItem extends Model
{

    use HasFactory;

    protected $fillable = [
        'quick_shop_order_id',
        'product_name',
        'product_image',
        'color',
        'size',
        'qty',
        'price',
        'discount',
        'total'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'quick_shop_order_id');
    }
}
