<?php

namespace App\Filament\Resources\DewanPengurusResource\Pages;

use App\Filament\Resources\DewanPengurusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDewanPengurus extends EditRecord
{
    protected static string $resource = DewanPengurusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
