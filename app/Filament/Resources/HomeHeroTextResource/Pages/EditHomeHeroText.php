<?php

namespace App\Filament\Resources\HomeHeroTextResource\Pages;

use App\Filament\Resources\HomeHeroTextResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeHeroText extends EditRecord
{
    protected static string $resource = HomeHeroTextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
