<?php

namespace App\Livewire\Forms;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class ProfileSettingForm extends Form
{
    use WithFileUploads;

    public $name, $email, $phone, $profile_photo, $ktp_sim, $birth_place, $birth_date, $address, $shirt_size, $vehicle_type, $vehicle_color,  $vehicle_year, $license_plate, $stnk_photo, $car_photo, $reason, $current_password, $new_password, $new_password_confirmation;



    public function rules()
    {
        $userId = Auth::check() ? Auth::user()->id : null;

        $rules = [
            'name'          => ['required', 'string', 'max:255'],
            'email'         => [
                'required',
                'email',
                'max:255',
                $userId ? 'unique:users,email,' . $userId : 'unique:users,email',
            ],
            'phone'         => ['required', 'string'],
            'ktp_sim'       => ['required', 'string'],
            'birth_place'   => ['nullable', 'string'],
            'birth_date'    => ['required', 'date'],
            'address'       => ['required', 'string'],
            'shirt_size'    => ['required'],
            'vehicle_type'  => ['required'],
            'vehicle_color' => ['nullable', 'string'],
            'vehicle_year'  => ['required', 'digits:4'],
            'license_plate' => ['required', 'string'],
            'reason'        => ['nullable', 'string'],
        ];

        if ($this->profile_photo instanceof UploadedFile) {
            $rules['profile_photo'] = ['image', 'max:2048'];
        }

        if ($this->stnk_photo instanceof UploadedFile) {
            $rules['stnk_photo'] = ['image', 'max:2048'];
        }

        if ($this->car_photo instanceof UploadedFile) {
            $rules['car_photo'] = ['image', 'max:2048'];
        }

        return $rules;
    }

    public function setMember($user)
    {

        $this->name = $user->name;
        $this->email = $user->email;
        $this->profile_photo = $user->member->profile_photo;
        $this->phone = $user->member->phone;
        $this->ktp_sim = $user->member->ktp_sim;
        $this->birth_place = $user->member->birth_place;
        $this->birth_date = $user->member->birth_date;
        $this->address = $user->member->address;
        $this->reason = $user->member->reason;
        $this->shirt_size = $user->member->shirt_size;
        $this->vehicle_type = $user->member->vehicle_type;
        $this->vehicle_color = $user->member->vehicle_color;
        $this->vehicle_year = $user->member->vehicle_year;
        $this->license_plate = $user->member->license_plate;
        $this->stnk_photo = $user->member->stnk_photo;
        $this->car_photo = $user->member->car_photo;
    }



    private function uploadAndReplace($newFile, $oldFilePath, $folder)
    {
        if (!$newFile instanceof \Illuminate\Http\UploadedFile) {
            return $oldFilePath;
        }

        // Hapus file lama
        if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
            Storage::disk('public')->delete($oldFilePath);
        }

        // Simpan file baru dengan nama unik
        $filename = time() . '_' . $newFile->getClientOriginalName();
        return $newFile->storeAs($folder, $filename, 'public');
    }

    public function editMember($id)
    {

        $this->validate();

        $user = User::where('id', $id)->first();
        $member = Member::where('user_id', $id)->first();

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $member->update([
            'profile_photo' => $this->uploadAndReplace($this->profile_photo, $member->profile_photo, 'profile'),
            'phone' => $this->phone,
            'ktp_sim' => $this->ktp_sim,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'address' => $this->address,
            'reason' => $this->reason,
            'shirt_size' => $this->shirt_size,
            'vehicle_type' => $this->vehicle_type,
            'vehicle_color' => $this->vehicle_color,
            'vehicle_year' => $this->vehicle_year,
            'license_plate' => $this->license_plate,
            'stnk_photo' => $this->uploadAndReplace($this->stnk_photo, $member->stnk_photo, 'stnk'),
            'car_photo' => $this->uploadAndReplace($this->car_photo, $member->car_photo, 'car'),
        ]);
    }

    public function editPassword($id)
    {
        $user = User::where('id', $id)->first();


        $this->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required', 'same:new_password'],
        ]);

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        Auth::logout();
    }
}
