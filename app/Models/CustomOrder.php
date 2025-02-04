<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'custom_order';
    protected $primaryKey = 'id';
}
