<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatorTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliator_account_id',
        'amount',
        'status'
    ];

    public function account()
    {
        return $this->belongsTo(AffiliatorAccount::class);
    }
}
