<?php

use App\Models\Alumno;
use App\Models\Materia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos_materias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Alumno::class);
            $table->foreignIdFor(Materia::class);
            $table->enum('condicion', ['Aprobado', 'Desaprobado', 'Regular', 'Libre'])->default('Regular');
            //$table->date('fecha')->nullable();
            $table->date('fecha')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos_materias');
    }
};
