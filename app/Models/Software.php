<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = [
        'features' => 'array',
    ];

    protected $table = 'software';
    protected $primaryKey = 'id';
}
