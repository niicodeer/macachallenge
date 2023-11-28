<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaResource\Pages;
use App\Filament\Resources\MateriaResource\RelationManagers;
use App\Models\Materia;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup='Gestion Academica';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom_materia')
                ->label('Nombre materia')
                ->maxLength(50)
                ->required(),
                Select::make('duracion_materia')
                ->options([
                    'Anual'=>'Anual',
                    'Cuatrimestral'=>'Cuatrimestral',
                ])
                ->required(),
                TextInput::make('horas_cursado')
                ->numeric()
                ->minValue(24)
                ->maxValue(144)
                ->required(),
                Select::make('carrera')
                ->relationship('carrera', 'nom_carrera')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_materia')
                ->label('Id')
                ->searchable()
                ->sortable(),
                TextColumn::make('nom_materia')
                ->label('Nombre')
                ->searchable()
                ->sortable(),
                TextColumn::make('duracion_materia')
                ->label('Duracion')
                ->sortable(),
                TextColumn::make('horas_cursado')
                ->label('Horas')
                ->sortable(),
                TextColumn::make('carrera') //TODO: revisar porque no me trae el nombre de la carrera
                /* TextColumn::make('carrera.nom_carrera') //TODO: revisar porque no me trae el nombre de la carrera */

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMateria::route('/create'),
            'edit' => Pages\EditMateria::route('/{record}/edit'),
        ];
    }
}
