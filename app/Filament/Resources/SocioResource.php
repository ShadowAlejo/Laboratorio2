<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocioResource\Pages;
use App\Filament\Resources\SocioResource\RelationManagers;
use App\Models\Socio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocioResource extends Resource
{
    protected static ?string $model = Socio::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Socios';
    protected static ?string $pluralModelLabel = 'Socios';
    protected static ?string $slug = 'socios'; // URL base para el recurso

    public static function form(Form $form): Form // Esto usa la clase correcta
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('soc_cedula')
                    ->label('Cédula')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('soc_nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('soc_direccion')
                    ->label('Dirección')
                    ->maxLength(60),
                Forms\Components\TextInput::make('soc_telefono')
                    ->label('Teléfono')
                    ->maxLength(10),
                Forms\Components\TextInput::make('soc_correo')
                    ->label('Correo Electrónico')
                    ->email()
                    ->maxLength(60),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('soc_cedula')->label('Cédula'),
                Tables\Columns\TextColumn::make('soc_nombre')->label('Nombre'),
                Tables\Columns\TextColumn::make('soc_direccion')->label('Dirección'),
                Tables\Columns\TextColumn::make('soc_telefono')->label('Teléfono'),
                Tables\Columns\TextColumn::make('soc_correo')->label('Correo Electrónico'),
                Tables\Columns\TextColumn::make('created_at')->label('Creado el')->date(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocios::route('/'),
            'create' => Pages\CreateSocio::route('/create'),
            'edit' => Pages\EditSocio::route('/{record}/edit'),
        ];
    }
}