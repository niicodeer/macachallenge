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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('dni',8)->primary();
            $table->string('num_legajo', 9)->default('0000/0000');
            $table->string('nom_alumno',25);
            $table->string('ape_alumno',20);
            $table->string('telefono',15);
            $table->boolean('estado')->default(true);
            $table->foreignId('carrera')->constrained('carreras', 'id_carrera')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
