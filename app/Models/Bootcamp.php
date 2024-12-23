<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'profession',
        'institute',
        'gender',
        'interests',
        'division',
        'district',
        'address',
        'agree',
        'type'
    ];
}
