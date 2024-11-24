<?php

namespace App\Filament\Resources\ActorPeliResource\Pages;

use App\Filament\Resources\ActorPeliResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActorPeli extends EditRecord
{
    protected static string $resource = ActorPeliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
