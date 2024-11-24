<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeliculaResource\Pages;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\Director; // Asegúrate de importar el modelo Director
use App\Models\Formato;  // Asegúrate de importar el modelo Formato
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PeliculaResource extends Resource
{
    protected static ?string $model = Pelicula::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('gen_id')
                    ->label('Género')
                    ->options(Genero::all()->pluck('gen_nombre', 'gen_id'))
                    ->required(),

                Forms\Components\TextInput::make('pel_nombre')
                    ->label('Nombre de la Película')
                    ->required()
                    ->maxLength(100),

                Forms\Components\Select::make('dir_id')
                    ->label('Director')
                    ->options(Director::all()->pluck('dir_nombre', 'dir_id'))
                    ->required(), // Relación con Director

                Forms\Components\Select::make('for_id')
                    ->label('Formato')
                    ->options(Formato::all()->pluck('for_nombre', 'for_id'))
                    ->required(), // Relación con Formato

                Forms\Components\TextInput::make('costo')
                    ->label('Costo')
                    ->numeric()
                    ->required()
                    ->minValue(0), // Campo para el costo

                Forms\Components\DatePicker::make('fecha_estreno')
                    ->label('Fecha de Estreno')
                    ->required(), // Campo para la fecha de estreno
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('genero.gen_nombre')
                    ->label('Género')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('pel_nombre')
                    ->label('Nombre de la Película')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('director.dir_nombre')
                    ->label('Director') // Mostrar nombre del director
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('formato.for_nombre')
                    ->label('Formato') // Mostrar formato de la película
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('costo')
                    ->label('Costo') // Mostrar costo
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('fecha_estreno')
                    ->label('Fecha de Estreno')
                    ->date() // Mostrar fecha de estreno
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime(),
            ])
            ->filters([/* Filtros personalizados si es necesario */])
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
            // Definir relaciones si es necesario
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeliculas::route('/'),
            'create' => Pages\CreatePelicula::route('/create'),
            'edit' => Pages\EditPelicula::route('/{record}/edit'),
        ];
    }
}
