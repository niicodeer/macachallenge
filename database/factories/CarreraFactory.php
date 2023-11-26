<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrera>
 */
class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carreras = [
            'Ingeniería Civil',
            'Abogacía',
            'Medicina',
            'Arquitectura',
            'Psicología',
            'Ciencias de la Computación',
            'Contador Público',
            'Comunicación Social',
            'Diseño Gráfico',
            'Ciencias Ambientales',
            'Educación Inicial',
            'Ingeniería Industrial',
            'Enfermería',
            'Nutrición',
            'Odontología',
            'Ciencias Políticas',
            'Geología',
            'Turismo',
            'Veterinaria',
            'Matemáticas',
        ];

        return [
            'nom_carrera' => fake()->unique()->randomElement($carreras),
            'duracion_carrera' => fake()->numberBetween(1, 6),
        ];
    }
}
