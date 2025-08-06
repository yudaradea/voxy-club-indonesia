<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStory extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'hero_image',
        'event_date',
        'location',
        'content',
        'is_featured',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
