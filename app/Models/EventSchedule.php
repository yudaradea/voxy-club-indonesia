<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Models\Member;
use App\Mail\EventScheduled;
use Illuminate\Support\Str;


class EventSchedule extends Model
{
    protected $guarded = [];

    protected $casts = [
        'start_date' => 'datetime', // ✅ Tambahkan ini
        'end_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        // static::creating(function ($event) {
        //     $event->slug = Str::slug($event->title);
        // });

        // static::updated(function ($event) {
        //     $event->slug = Str::slug($event->title);
        // });

        static::created(function ($event) {
            $verifiedMembers = \App\Models\Member::where('status', 'verified')->get();
            foreach ($verifiedMembers as $member) {
                Mail::to($member->user->email)->send(new \App\Mail\EventScheduled($event, $member));
            }
        });
    }

    public function getDynamicStatusAttribute()
    {
        $now = now();
        if ($this->start_date > $now) return 'upcoming';
        if ($this->end_date && $this->end_date < $now) return 'past';
        return 'ongoing';
    }
}
