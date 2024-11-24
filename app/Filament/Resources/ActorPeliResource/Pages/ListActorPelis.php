<?php

namespace App\Filament\Resources\ActorPeliResource\Pages;

use App\Filament\Resources\ActorPeliResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActorPelis extends ListRecords
{
    protected static string $resource = ActorPeliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
