<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatorOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service_type',
        'service_id',
        'start_date',
        'end_date',
        'delivery_status',
        'payment_status',
        'payment_method',
        'user_id',
        'sub_total',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(AffiliatorOrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
