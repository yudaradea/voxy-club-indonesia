<?php

namespace App\Filament\Resources\EventStoryResource\Pages;

use App\Filament\Resources\EventStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventStory extends EditRecord
{
    protected static string $resource = EventStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
