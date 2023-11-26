<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_materia', true);
            $table->string('nom_materia',25);
            $table->enum('duracion_materia',['Anual', 'Cuatrimestral']);
            $table->integer('horas_cursado');
            $table->foreignId('carrera')->constrained('carreras', 'id_carrera')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
