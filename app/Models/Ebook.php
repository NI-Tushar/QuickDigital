<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $casts = [
        'release_date' => 'date', 
    ];
    
    protected $table = 'ebooks';
    protected $primaryKey = 'id';
}


  


