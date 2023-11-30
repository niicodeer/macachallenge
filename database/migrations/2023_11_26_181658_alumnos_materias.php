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
            /* $table->foreignIdFor(Alumno::class, 'id_materia');
            $table->foreignIdFor(Materia::class, 'dni'); */
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_materia')->references('id_materia')->on('materias')->cascadeOnUpdate();

            $table->string('dni');
            $table->foreign('dni')->references('dni')->on('alumnos')->cascadeOnUpdate();

            /* $table->enum('condicion', ['Aprobado', 'Desaprobado', 'Regular', 'Libre'])->default('Regular'); */
            $table->string('condicion',15)->nullable();
            //$table->date('fecha')->nullable();
            $table->date('fecha')->nullable();
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
