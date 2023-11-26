<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Alumno extends Model
{
    use HasFactory;

    protected $primaryKey = 'num_legajo';

    protected $fillable = [
        'dni',
        'nom_alumno',
        'ape_alumno',
        'telefono',
        'activo',
        'carrera',
    ];

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class);
    }

    public function materias(): BelongsToMany
    {
        return $this->belongsToMany(Materia::class, 'alumno_materias')->withPivot(['condicion', 'fecha']);
    }
}
