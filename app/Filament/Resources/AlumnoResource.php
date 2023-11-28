<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumnoResource\Pages;
use App\Filament\Resources\AlumnoResource\RelationManagers;
use App\Filament\Resources\AlumnoResource\RelationManagers\MateriasRelationManager;
use App\Filament\Resources\AlumnoResource\Widgets\AlumnoOverview;
use App\Models\Alumno;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class AlumnoResource extends Resource
{
    protected static ?string $model = Alumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Gestion Academica';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('dni')
                    ->numeric()
                    ->required()
                    ->minLength(8)
                    ->maxLength(8),
                TextInput::make('nom_alumno')
                    ->label('Nombre')
                    ->required()
                    ->minLength(3)
                    ->maxLength(25),
                TextInput::make('ape_alumno')
                    ->label('Apellido')
                    ->required()
                    ->minLength(3)
                    ->maxLength(20),
                TextInput::make('telefono')
                    ->required()
                    ->minLength(9)
                    ->maxLength(15),
                Radio::make('estado')
                    ->options([
                        1 => 'Si',
                        0 => 'No',
                    ])
                    ->default(true)
                    ->label('¿El alumno se encuentra activo?'),
                Select::make('carrera')
                    ->relationship('carrera', 'nom_carrera')
                    ->required(),
                /*                 Select::make('materias')
                ->relationship('materias', 'nom_materia')
                ->multiple(), */
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('num_legajo')
                    ->label('Nro Legajo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('dni')
                    ->label('DNI')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nom_alumno')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ape_alumno')
                    ->label('Apellido')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('telefono')
                    ->label('Telefono'),
                ToggleColumn::make('estado')
                    ->label('¿Activo?')
                    ->sortable(),
                /* TextColumn::make('estado') */
            ])

            ->filters([
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        '1' => 'Activo',
                        '0' => 'Inactivo',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                ExportBulkAction::make(),
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MateriasRelationManager::class
        ];
    }
    public static function getWidgets(): array
    {
      return [
        AlumnoOverview::class,
      ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumnos::route('/'),
            'create' => Pages\CreateAlumno::route('/create'),
            'edit' => Pages\EditAlumno::route('/{record}/edit'),
        ];
    }
}
