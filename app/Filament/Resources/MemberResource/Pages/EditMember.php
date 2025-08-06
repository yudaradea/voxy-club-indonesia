<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditMember extends EditRecord
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $user = $this->record->user;
        $userDataToUpdate = [
            'name' => $data['user_name'],
            'email' => $data['user_email'],
            'role' => $data['user_role'],
        ];

        // Hanya update password jika field diisi
        if (filled($data['user_password'])) {
            $userDataToUpdate['password'] = Hash::make($data['user_password']);
        }

        $user->update($userDataToUpdate);

        // Hapus data user dari array agar tidak coba disimpan ke tabel 'members'
        unset($data['user_name'], $data['user_email'], $data['user_role'], $data['user_password']);

        // Kembalikan data yang hanya berisi kolom untuk tabel 'members'
        return $data;
    }
}
