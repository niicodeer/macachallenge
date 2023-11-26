<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $materias = [
            'Matemáticas Avanzadas',
            'Derecho Civil',
            'Anatomía Humana',
            'Diseño Arquitectónico',
            'Psicología Clínica',
            'Programación en C++',
            'Contabilidad Financiera',
            'Redacción y Comunicación',
            'Diseño Gráfico Digital',
            'Ecología y Medio Ambiente',
            'Didáctica de la Educación Inicial',
            'Gestión de Proyectos Industriales',
            'Enfermería Básica',
            'Nutrición Clínica',
            'Odontología Preventiva',
            'Teoría Política',
            'Geología Estructural',
            'Gestión Turística',
            'Patología Veterinaria',
            'Álgebra Lineal',
            'Procesal Civil',
            'Histología Humana',
            'Diseño Web',
            'Psicología Organizacional',
            'Algoritmos y Estructuras de Datos',
            'Auditoría Contable',
            'Producción de Contenidos Multimedia',
            'Química Ambiental',
            'Educación Física Infantil',
        ];

        return [
            'nom_materia' => fake()->unique()->randomElement($materias),
            'duracion_materia' => fake()->randomElement(['Anual', 'Cuatrimestral']),
            'horas_cursado' => fake()->numberBetween(24,144),
            'carrera' => fake()->numberBetween(1,10)
        ];
    }
}
