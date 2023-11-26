<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
