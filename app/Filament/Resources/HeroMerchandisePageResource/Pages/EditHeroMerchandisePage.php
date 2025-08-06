<?php

namespace App\Filament\Resources\HeroMerchandisePageResource\Pages;

use App\Filament\Resources\HeroMerchandisePageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroMerchandisePage extends EditRecord
{
    protected static string $resource = HeroMerchandisePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
