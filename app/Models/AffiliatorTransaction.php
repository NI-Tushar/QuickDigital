<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatorTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'affiliator_account_id',
        'amount',
        'status'
    ];

    public function account()
    {
        return $this->belongsTo(AffiliatorAccount::class, 'affiliator_account_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
