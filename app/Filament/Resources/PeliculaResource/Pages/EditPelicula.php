<?php

namespace App\Filament\Resources\PeliculaResource\Pages;

use App\Filament\Resources\PeliculaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelicula extends EditRecord
{
    protected static string $resource = PeliculaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
