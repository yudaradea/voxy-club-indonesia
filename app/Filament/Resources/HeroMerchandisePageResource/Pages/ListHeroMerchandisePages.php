<?php

namespace App\Filament\Resources\HeroMerchandisePageResource\Pages;

use App\Filament\Resources\HeroMerchandisePageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroMerchandisePages extends ListRecords
{
    protected static string $resource = HeroMerchandisePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
