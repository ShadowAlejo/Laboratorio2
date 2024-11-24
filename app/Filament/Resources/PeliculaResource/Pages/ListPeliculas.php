<?php

namespace App\Filament\Resources\PeliculaResource\Pages;

use App\Filament\Resources\PeliculaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeliculas extends ListRecords
{
    protected static string $resource = PeliculaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
