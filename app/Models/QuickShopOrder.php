<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickShopOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_code',
        'sub_total',
        'shipping',
        'coupon',
        'total',
        'delivery_status',
        'payment_status',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(QuickShopOrderItem::class, 'quick_shop_order_id');
    }


}
