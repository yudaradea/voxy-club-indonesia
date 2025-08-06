<?php

namespace App\Filament\Resources\HeroEventPageResource\Pages;

use App\Filament\Resources\HeroEventPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroEventPage extends EditRecord
{
    protected static string $resource = HeroEventPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
