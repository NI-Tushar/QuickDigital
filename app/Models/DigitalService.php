<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalService extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'address',
        'order_number',
        'start_date',
        'end_date',
        'services',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
