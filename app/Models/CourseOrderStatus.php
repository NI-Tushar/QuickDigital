<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOrderStatus extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(CourseOrder::class);
    }
}
