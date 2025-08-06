<?php

namespace App\Filament\Resources\HomeHeroImageResource\Pages;

use App\Filament\Resources\HomeHeroImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeHeroImage extends EditRecord
{
    protected static string $resource = HomeHeroImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
