<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickShopProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'quick_shop_category_id',
        'name',
        'slug',
        'price',
        'discount',
        'qty',
        'unit',
        'images',
        'thumbnail_image',
        'description'
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function variations()
    {
        return $this->hasMany(QuickShopProductVariation::class, 'quick_shop_product_id');
    }
}
