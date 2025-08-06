<?php

namespace App\Filament\Resources\EventStoryResource\Pages;

use App\Filament\Resources\EventStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventStory extends CreateRecord
{
    protected static string $resource = EventStoryResource::class;
}
