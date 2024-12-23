<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickShopProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quick_shop_product_id',
        'color',
        'color_code',
        'size',
        'qty',
    ];
}
