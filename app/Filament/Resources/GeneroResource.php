<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneroResource\Pages;
use App\Models\Genero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GeneroResource extends Resource
{
    protected static ?string $model = Genero::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';


    protected static ?string $navigationLabel = 'Géneros';
    protected static ?string $pluralModelLabel = 'Géneros';
    protected static ?string $modelLabel = 'Género';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('gen_nombre')
                    ->label('Nombre del Género')
                    ->required()
                    ->maxLength(100), // Máximo de caracteres según la migración
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gen_id')
                    ->label('ID')
                    ->sortable(), // Permite ordenar por este campo
                Tables\Columns\TextColumn::make('gen_nombre')
                    ->label('Nombre del Género')
                    ->sortable()
                    ->searchable(), // Permite buscar por este campo
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime('d/m/Y H:i'), // Formatea como fecha
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([]) // Puedes agregar filtros personalizados si es necesario
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
            // Agrega relaciones aquí si es necesario
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGeneros::route('/'),
            'create' => Pages\CreateGenero::route('/create'),
            'edit' => Pages\EditGenero::route('/{record}/edit'),
        ];
    }
}
