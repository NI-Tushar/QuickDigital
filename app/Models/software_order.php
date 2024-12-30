<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software_order extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $table = 'software_order';
    protected $primaryKey = 'id';
}
