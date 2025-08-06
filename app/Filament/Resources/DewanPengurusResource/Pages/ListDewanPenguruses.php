<?php

namespace App\Filament\Resources\DewanPengurusResource\Pages;

use App\Filament\Resources\DewanPengurusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDewanPenguruses extends ListRecords
{
    protected static string $resource = DewanPengurusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
