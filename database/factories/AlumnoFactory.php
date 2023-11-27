<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => fake()->regexify('[3-4]{2}[0-9]{6}'),
            'nom_alumno' => fake()->firstName(),
            'ape_alumno'=> fake()->lastName(),
            'telefono' => fake()->regexify('(\d{3}) \d{3}-\d{4}'),
            'estado'=> fake()-> boolean(),
            'carrera'=> fake()->numberBetween(1,10),
        ];
    }
}
