<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActorPeliResource\Pages;
use App\Filament\Resources\ActorPeliResource\RelationManagers;
use App\Models\Actor_Peli;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActorPeliResource extends Resource
{
    protected static ?string $model = Actor_Peli::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('act_id')
                    ->label('Actor')
                    ->relationship('actor', 'act_nombre') // Relación con modelo Actor
                    ->required(),

                Forms\Components\Select::make('pel_id')
                    ->label('Película')
                    ->relationship('pelicula', 'pel_nombre') // Relación con modelo Pelicula
                    ->required(),
                Forms\Components\TextInput::make('actor_papel')
                    ->label('Papel del Actor')
                    ->maxlength(60)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actor.act_nombre')
                    ->label('Actor')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('pelicula.pel_nombre')
                    ->label('Película')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('actor_papel')
                    ->label('Papel del Actor')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime(),


            ])
            ->filters([
                //
            ])
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActorPelis::route('/'),
            'create' => Pages\CreateActorPeli::route('/create'),
            'edit' => Pages\EditActorPeli::route('/{record}/edit'),
        ];
    }
}
