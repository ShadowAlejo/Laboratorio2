<?php


namespace App\Filament\Resources;

use App\Filament\Resources\ActorResource\Pages;
use App\Models\Actor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActorResource extends Resource
{
    protected static ?string $model = Actor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Actores';
    protected static ?string $pluralModelLabel = 'Actores';
    protected static ?string $modelLabel = 'Actor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('act_nombre')
                    ->label('Nombre del Actor')
                    ->required()
                    ->maxLength(80), // Limita la longitud del texto
                Forms\Components\Select::make('sex_id')
                    ->label('Sexo')
                    ->relationship('sexo', 'sex_nombre') // Relación con el modelo 'Sexo'
                    ->required(), // Obligatorio
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('act_id')
                    ->label('ID')
                    ->sortable(), // Permite ordenar por este campo
                Tables\Columns\TextColumn::make('act_nombre')
                    ->label('Nombre del Actor')
                    ->sortable()
                    ->searchable(), // Permite buscar por este campo
                Tables\Columns\TextColumn::make('sexo.sex_nombre')
                    ->label('Sexo') // Muestra el nombre del sexo asociado
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListActors::route('/'),
            'create' => Pages\CreateActor::route('/create'),
            'edit' => Pages\EditActor::route('/{record}/edit'),
        ];
    }
}
