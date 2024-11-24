<?php
namespace App\Filament\Resources;

use App\Filament\Resources\AlquilerResource\Pages;
use App\Models\Alquiler;
use App\Models\Socio;   // Asegúrate de importar el modelo Socio
use App\Models\Pelicula; // Asegúrate de importar el modelo Pelicula
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AlquilerResource extends Resource
{
    protected static ?string $model = Alquiler::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\Select::make('soc_id')
                    ->label('Socio')
                    ->relationship('socio', 'soc_nombre') // Relación con el modelo Socio
                    ->required(),
                Forms\Components\Select::make('pel_id')
                    ->label('Película')
                    ->options(Pelicula::whereNotNull('pel_nombre')->pluck('pel_nombre', 'pel_id'))  // Filtra las películas sin nombre
                    ->required(),

                Forms\Components\DatePicker::make('fecha_alquiler_inicio')
                    ->label('Fecha de Inicio del Alquiler')
                    ->required(),

                Forms\Components\DatePicker::make('fecha_alquiler_final')
                    ->label('Fecha de Fin del Alquiler')
                    ->required(),

                Forms\Components\TextInput::make('valor_alquiler')
                    ->label('Valor del Alquiler')
                    ->numeric()
                    ->required(),

                Forms\Components\DatePicker::make('fecha_entrega')
                    ->label('Fecha de Entrega')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('socio.nombre')
                    ->label('Socio')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('pelicula.pel_nombre')
                    ->label('Película')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('fecha_alquiler_inicio')
                    ->label('Fecha de Inicio')
                    ->date(),

                Tables\Columns\TextColumn::make('fecha_alquiler_final')
                    ->label('Fecha de Fin')
                    ->date(),

                Tables\Columns\TextColumn::make('valor_alquiler')
                    ->label('Valor del Alquiler')
                    ->money(),

                Tables\Columns\TextColumn::make('fecha_entrega')
                    ->label('Fecha de Entrega')
                    ->date(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime(),
            ])
            ->filters([
                // Agrega filtros si es necesario
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
            'index' => Pages\ListAlquilers::route('/'),
            'create' => Pages\CreateAlquiler::route('/create'),
            'edit' => Pages\EditAlquiler::route('/{record}/edit'),
        ];
    }
}
