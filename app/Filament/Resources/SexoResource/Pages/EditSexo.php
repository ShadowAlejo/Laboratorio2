<?php

namespace App\Filament\Resources\SexoResource\Pages;

use App\Filament\Resources\SexoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSexo extends EditRecord
{
    protected static string $resource = SexoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
