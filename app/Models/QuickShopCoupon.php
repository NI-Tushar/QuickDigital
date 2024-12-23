<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickShopCoupon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'code', 'is_active', 'discount'];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
