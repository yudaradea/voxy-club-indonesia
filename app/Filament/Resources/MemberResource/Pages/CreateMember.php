<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // 1. Buat user terlebih dahulu dari data form
        $user = User::create([
            'name' => $data['user_name'],
            'email' => $data['user_email'],
            'role' => $data['user_role'],
            // Sebaiknya hash password sebelum disimpan
            'password' => Hash::make($data['user_password']),
        ]);

        // 2. Tambahkan user_id ke dalam data yang akan disimpan ke tabel Member
        $data['user_id'] = $user->id;

        // 3. (Opsional tapi direkomendasikan) Hapus data user dari array 
        //    agar tidak coba disimpan ke tabel 'members' jika nama kolomnya tidak ada.
        unset($data['user_name'], $data['user_email'], $data['user_role'], $data['user_password']);

        // 4. Kembalikan data yang sudah dimodifikasi untuk membuat record Member
        return $data;
    }
}
