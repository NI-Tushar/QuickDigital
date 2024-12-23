<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderStatus()
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function latestStatus()
    {
        return $this->hasOne(OrderStatus::class)->latest();
    }

    public function ebook()
    {
        return $this->belongsTo(Ebook::class);
    }
}
