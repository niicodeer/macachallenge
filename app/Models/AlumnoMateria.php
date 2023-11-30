<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AlumnoMateria extends Pivot
{
    protected $table = 'alumnos_materias';
    public $incrementing = true;
/*     use HasFactory;
    protected $guarded=[]; */


    public function alumno(): BelongsTo
    {
        return $this->belongsTo(Alumno::class, 'dni', 'dni');
    }

    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class, 'id_materia', 'id_materia');
    }
}
