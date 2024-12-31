<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatorOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliator_order_id',
        'ser_type',
        'ser_id',
        'title',
        'description',
        'quantity',
        'unit',
        'rate',
        'tax',
        'amount',
    ];
}
