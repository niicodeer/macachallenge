<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Alumno extends Model
{
    use HasFactory;

    //protected $primaryKey = 'num_legajo';
    protected $primaryKey = 'dni';
    public $incrementing = false;

    protected $fillable = [
        'dni',
        'nom_alumno',
        'ape_alumno',
        'telefono',
        'activo',
        'carrera',
    ];

    protected static function boot()
    {

        parent::boot();


        static::creating(function ($alumno) {
            $maxNumLegajo = self::select(DB::raw("SUBSTRING_INDEX(num_legajo, '/', 1) AS max_num_legajo"))
                ->max(DB::raw("CAST(SUBSTRING_INDEX(num_legajo, '/', 1) AS UNSIGNED)"));
            $nextNumLegajo = ($maxNumLegajo !== null) ? $maxNumLegajo + 1 : 1;
            $alumno->num_legajo = str_pad($nextNumLegajo, 4, '0', STR_PAD_LEFT) . '/' . substr(now()->year, -2);
        });
    }

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'carrera', 'id_carrera');
    }

    public function materias(): HasMany
    {
        /* return $this->belongsToMany(Alumno::class, 'alumnos_materias')->withPivot(['condicion', 'fecha']); */
        return $this->hasMany(AlumnoMateria::class, 'id_materia');
    }
}
