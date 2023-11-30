<?php

namespace App\Filament\Resources\AlumnoMateriaResource\Pages;

use App\Filament\Resources\AlumnoMateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAlumnoMateria extends CreateRecord
{
    protected static string $resource = AlumnoMateriaResource::class;
    protected static ?string $title = 'Inscripción a Materias';
    protected ?string $heading = 'Inscripción a Materias';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
