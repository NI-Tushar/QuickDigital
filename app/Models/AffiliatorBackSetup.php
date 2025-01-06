<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatorBackSetup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_type',
        'holder_name',
        'email',
        'phone',
        'bank_name',
        'account_number',
        'branch_name',
        'routing_number',
        'mobile_banking_type',
        'mobile_banking_number',
    ];

    /**
     * Relationship with User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
