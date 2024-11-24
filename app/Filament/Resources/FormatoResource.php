<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormatoResource\Pages;
use App\Models\Formato;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FormatoResource extends Resource
{
    protected static ?string $model = Formato::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('for_nombre')
                    ->label('Nombre del Formato')
                    ->required()
                    ->maxLength(60),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('for_id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('for_nombre')
                    ->label('Nombre del Formato')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormatos::route('/'),
            'create' => Pages\CreateFormato::route('/create'),
            'edit' => Pages\EditFormato::route('/{record}/edit'),
        ];
    }
}
