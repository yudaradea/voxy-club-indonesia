<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'member_id',
        'notes',
        'amount',
        'paid_at',
        'proof_image',
    ];

    protected $casts = [
        'amount' => 'integer',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
