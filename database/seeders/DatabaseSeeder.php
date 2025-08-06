<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // // Member
        // $memberUser = User::create([
        //     'name' => 'Member User',
        //     'email' => 'member@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'member',
        // ]);

        Member::create([
            'user_id' => $admin->id,
            'phone' => '081234567890',
            'profile_photo' => 'profile/default.jpg',   // disimpan di folder public/profile
            'ktp_sim' => '1234567890123456',
            'birth_place' => 'Jakarta',
            'birth_date' => '1990-01-01',
            'address' => 'Jl. Contoh No.1',
            'shirt_size' => 'L',
            'vehicle_type' => 'R 80',
            'vehicle_color' => 'Hitam',
            'vehicle_year' => '2015',
            'license_plate' => 'B 1234 ABC',
            'stnk_photo' => 'stnk/default.jpg',     // disimpan di folder public/stnk
            'car_photo' => 'car/default.jpg',      // disimpan di folder public/mobil
            'reason' => 'Ingin bergabung komunitas',
            'status' => 'verified',
        ]);
    }
}
