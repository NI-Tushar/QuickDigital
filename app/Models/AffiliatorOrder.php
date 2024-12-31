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

        'sub_total', 10, 2,
        'total', 10, 2
    ];
}
