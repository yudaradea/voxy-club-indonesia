<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'profile_photo',
        'ktp_sim',
        'birth_place',
        'birth_date',
        'address',
        'shirt_size',
        'vehicle_type',
        'vehicle_color',
        'vehicle_year',
        'license_plate',
        'stnk_photo',
        'car_photo',
        'reason',
        'jabatan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    protected static function booted(): void
    {
        // Panggil parent::booted() jika ada
        parent::booted();

        // Daftarkan event 'deleting'
        // Event ini akan berjalan TEPAT SEBELUM member dihapus dari database
        static::deleting(function (Member $member) {
            // Hapus user yang berelasi dengan member ini
            // Tanda tanya (?) adalah nullsafe operator, untuk mencegah error
            // jika karena suatu hal member tidak memiliki user.
            $member->user?->delete();
        });
    }

    public function fotoProfil()
    {
        if ($this->profile_photo !== null) {
            return asset('storage/' . $this->profile_photo);
        } else {
            return asset('storage/profile/default.jpg');
        }
    }

    public function fotoMobil()
    {
        if ($this->car_photo !== null) {
            return asset('storage/' . $this->car_photo);
        } else {
            return asset('storage/car/default.jpg');
        }
    }

    public function fotoSTNK()
    {
        if ($this->stnk_photo !== null) {
            return asset('storage/' . $this->stnk_photo);
        } else {
            return asset('storage/stnk/default.jpg');
        }
    }

    public function isVerified(): bool
    {
        return $this->status === 'verified';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }
}
