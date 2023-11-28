<?php

namespace App\Filament\Resources\AlumnoResource\Widgets;

use App\Models\Alumno;
use App\Models\AlumnoMateria;
use App\Models\Carrera;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AlumnoOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Alumnos', Alumno::all()->count()),
            Stat::make('Total Carreras', Carrera::all()->count()),
            Stat::make('Total Inscripciones', AlumnoMateria::all()->count()),
        ];
    }
}
