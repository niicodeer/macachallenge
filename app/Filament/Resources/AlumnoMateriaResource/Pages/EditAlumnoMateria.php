<?php

namespace App\Filament\Resources\AlumnoMateriaResource\Pages;

use App\Filament\Resources\AlumnoMateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumnoMateria extends EditRecord
{
    protected static string $resource = AlumnoMateriaResource::class;
    protected static ?string $title = 'Inscripción a Materias';
    protected ?string $heading = 'Inscripción a Materias';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
