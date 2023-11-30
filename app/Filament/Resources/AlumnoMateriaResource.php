<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumnoMateriaResource\Pages;
use App\Filament\Resources\AlumnoMateriaResource\RelationManagers;
use App\Models\Alumno;
use App\Models\AlumnoMateria;
use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('dni')
                    //->relationship('alumno', 'dni')
                    ->options(Alumno::all()->pluck('dni', 'dni')->toArray())
                    ->label('DNI Alumno')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('id_materia', null)),
                Select::make('id_materia')
                    //->relationship('materia', 'nom_materia')
                    ->options(function (Get $get) {
                        $alumno = Alumno::find($get('dni'));
                        if (!$alumno) {
                            return Materia::all()->pluck('nom_materia', 'id_materia');
                        }
                        $carrera = $alumno->carrera;
                        $materias = Materia::where('carrera', $carrera)->get();
                        if (!$materias) {
                            return Materia::all()->pluck('nom_materia', 'id_materia');
                        }
                        return $materias->pluck('nom_materia', 'id_materia');
                    })
                    ->label('Materia')
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
                TextColumn::make('dni')
                    ->label('Dni Alumno')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alumno.num_legajo')
                    ->label('Nro Legajo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('materia.nom_materia')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('condicion')
                    ->label('Condicion Alumno'),
                TextColumn::make('fecha')
                    ->label('Fecha'),
            ])
            ->filters([
                SelectFilter::make('condicion')
                ->options([
                    'Aprobado' => 'Aprobado',
                    'Desaprobado' => 'Desaprobado',
                    'Regular' => 'Regular',
                    'Libre' => 'Libre'
                ]),
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
            'index' => Pages\ListAlumnoMaterias::route('/'),
            'create' => Pages\CreateAlumnoMateria::route('/create'),
            'edit' => Pages\EditAlumnoMateria::route('/{record}/edit'),
        ];
    }
}
