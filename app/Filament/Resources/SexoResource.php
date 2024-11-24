<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SexoResource\Pages;
use App\Models\Sexo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SexoResource extends Resource
{
    protected static ?string $model = Sexo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Sexos';
    protected static ?string $pluralModelLabel = 'Sexos';
    protected static ?string $modelLabel = 'Sexo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sex_nombre')
                    ->label('Nombre del Sexo')
                    ->required()
                    ->maxLength(60), // Limita la longitud del texto
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sex_id')
                    ->label('ID')
                    ->sortable(), // Permite ordenar por este campo
                Tables\Columns\TextColumn::make('sex_nombre')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(), // Permite buscar por este campo
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime('d/m/Y H:i'), // Formatea como fecha
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([]) // Puedes agregar filtros si es necesario
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Puedes definir relaciones aquí, si existen
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSexos::route('/'),
            'create' => Pages\CreateSexo::route('/create'),
            'edit' => Pages\EditSexo::route('/{record}/edit'),
        ];
    }
}
