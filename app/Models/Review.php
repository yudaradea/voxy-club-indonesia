<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    protected $casts = [
        'rating' => 'decimal:1',
    ];
}
