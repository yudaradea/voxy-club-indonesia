<?php

namespace App\Filament\Resources\EventStoryResource\Pages;

use App\Filament\Resources\EventStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventStories extends ListRecords
{
    protected static string $resource = EventStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
