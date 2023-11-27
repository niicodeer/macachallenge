<?php

namespace App\Filament\Resources\AlumnoMateriaResource\Pages;

use App\Filament\Resources\AlumnoMateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumnoMaterias extends ListRecords
{
    protected static string $resource = AlumnoMateriaResource::class;
    protected static ?string $title = 'Inscripción a Materias';
    protected ?string $heading = 'Inscripción a Materias';

    //protected ?string $subheading = 'Inscripción a Materias';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
