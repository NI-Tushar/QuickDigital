<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
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
    public function digitalproduct()
    {
        return $this->belongsTo(DigitalProduct::class, 'service_id');
    }
    public function softwareList()
    {
        return $this->belongsTo(Software::class, 'service_id');
    }
    
}
