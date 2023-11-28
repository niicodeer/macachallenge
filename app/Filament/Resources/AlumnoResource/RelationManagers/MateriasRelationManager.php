<?php

namespace App\Filament\Resources\AlumnoResource\RelationManagers;

use App\Models\Carrera;
use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriasRelationManager extends RelationManager
{
    protected static string $relationship = 'materias';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('dni')
                    ->default(fn (Get $get) => $get('alumno.dni'))
                    ->required()
                    ->hiddenOn('edit'),
                Select::make('id_materia')
                    //->relationship('materia', 'nom_materia')
                    ->options(function (callable $get) {
                        $materia = Materia::where('carrera', $get('alumno.carrera'))->get();
                        if (!$materia) {
                            return Materia::all()->pluck('nom_materia', 'id_materia');
                        }
                        dd($get('alumno.carrera'));
                        return $materia->pluck('nom_materia', 'id_materia');
                    })
                    ->reactive()
                    //->afterStateUpdated(fn(callable $set)=> $set('city_id', null))
                    ->required()
                    ->hiddenOn('edit'),

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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id_materia')
            ->columns([
                /* TextColumn::make('id'), */
                TextColumn::make('alumno.num_legajo'),
                TextColumn::make('materia.nom_materia'),
                TextColumn::make('condicion'),
                TextColumn::make('fecha'),
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
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
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
}
