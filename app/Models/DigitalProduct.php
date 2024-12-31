<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalProduct extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = [
        'features' => 'array',
    ];

    protected $table = 'digital_product';
    protected $primaryKey = 'id';
}
