<?php

namespace App\Filament\Resources\HomeHeroImageResource\Pages;

use App\Filament\Resources\HomeHeroImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomeHeroImages extends ListRecords
{
    protected static string $resource = HomeHeroImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
