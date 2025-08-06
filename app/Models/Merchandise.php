<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    protected $guarded = [];

    protected $casts = [
        'sizes' => 'array',
        'images' => 'array',
        'price' => 'integer',
    ];
}
