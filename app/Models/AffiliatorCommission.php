<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatorCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'purpose',
        'order_id',
        'amount',
    ];
}
