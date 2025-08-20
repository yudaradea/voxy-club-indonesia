<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use App\Models\Member;
use Flasher\Toastr\Prime\Toastr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class RegisterForm extends Form
{
    use WithFileUploads;

    public $name, $email, $phone, $profile_photo, $ktp_sim, $birth_place, $birth_date, $address, $shirt_size, $vehicle_type, $vehicle_color,  $vehicle_year, $license_plate, $stnk_photo, $car_photo, $reason, $password, $password_confirmation;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email'],
        'phone' => ['required', 'string', 'min:10', 'max:13'],
        'ktp_sim' => ['required', 'string', 'min:16', 'max:16'],
        'birth_place' => ['nullable', 'string'],
        'birth_date' => ['required', 'date'],
        'address' => ['required', 'string'],
        'shirt_size' => ['required'],
        'vehicle_type' => ['required'],
        'vehicle_color' => ['nullable', 'string'],
        'vehicle_year' => ['required', 'digits:4'],
        'license_plate' => ['required', 'string'],
        'reason' => ['nullable', 'string'],
        'password' => ['required', 'confirmed', 'min:8'],
        'password_confirmation' => ['required', 'same:password'],
        'profile_photo' => ['required', 'image', 'max:5000'],
        'stnk_photo' => ['required', 'image', 'max:5000'],
        'car_photo' => ['nullable', 'image', 'max:5000'],
    ];

    public function addMember()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'member',
        ]);

        $profile_photo_path = 'profile/' . basename($this->profile_photo->store('profile', 'public'));
        $stnk_photo_path    = 'stnk/'    . basename($this->stnk_photo->store('stnk', 'public'));
        $car_photo_path     = $this->car_photo
            ? 'car/' . basename($this->car_photo->store('car', 'public'))
            : null;

        Member::create([
            'user_id' => $user->id,
            'phone' => $this->phone,
            'profile_photo' => $profile_photo_path,
            'ktp_sim' => $this->ktp_sim,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'address' => $this->address,
            'shirt_size' => $this->shirt_size,
            'vehicle_type' => $this->vehicle_type,
            'vehicle_color' => $this->vehicle_color,
            'vehicle_year' => $this->vehicle_year,
            'license_plate' => $this->license_plate,
            'stnk_photo' => $stnk_photo_path,
            'car_photo' => $car_photo_path,
            'reason' => $this->reason,
        ]);

        Auth::login($user);
    }
}
