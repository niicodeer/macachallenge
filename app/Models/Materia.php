<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Materia extends Model
{
    use HasFactory;

    protected $primaryKey='id_materia';
    protected $fillable = [
        'nom_materia',
        'duracion_materia',
        'horas_cursado',
        'carrera'
    ];

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'carrera', 'id_carrera');
    }

    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany(Alumno::class, 'alumnos_materias', 'id_materia', 'dni')->withPivot(['condicion', 'fecha']);
    }
}
