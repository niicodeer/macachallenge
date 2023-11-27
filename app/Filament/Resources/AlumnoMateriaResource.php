<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumnoMateriaResource\Pages;
use App\Filament\Resources\AlumnoMateriaResource\RelationManagers;
use App\Models\AlumnoMateria;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\Support\Htmlable;

class AlumnoMateriaResource extends Resource
{
    protected static ?string $model = AlumnoMateria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'inscripcion-materias';

    protected static ?string $navigationLabel = 'Inscripción Materias';


    public function getTitle(): string | Htmlable
    {
        return __('Custom Page Title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_materia')
                    ->relationship('materia', 'nom_materia')
                    ->label('Materia')
                    ->required(),
                Select::make('dni')
                    ->relationship('alumno', 'dni')
                    ->label('DNI Alumno')
                    ->required(),
                Select::make('condicion')
                    ->options([
                        'Aprobado' => 'Aprobado',
                        'Desaprobado' => 'Desaprobado',
                        'Regular' => 'Regular',
                        'Libre' => 'Libre'
                    ])
                    ->required(),
                DatePicker::make('fecha')
                    ->maxDate(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('dni')
                    ->label('Alumno con dni'),
                TextColumn::make('id_materia'),
                TextColumn::make('condicion')
                    ->label('Condicion Alumno'),
                TextColumn::make('fecha')
                    ->label('Fecha'),
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
            'index' => Pages\ListAlumnoMaterias::route('/'),
            'create' => Pages\CreateAlumnoMateria::route('/create'),
            'edit' => Pages\EditAlumnoMateria::route('/{record}/edit'),
        ];
    }
}
