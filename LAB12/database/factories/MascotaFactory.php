<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'tipo' => Arr::random(['Perro', 'Gato', 'Pájaro', 'Conejo', 'Tortuga']),
            'edad' => $this->faker->numberBetween(1, 15),
            'raza' => $this->faker->word,
            'peso' => $this->faker->randomFloat(2, 1, 40),
            'fecha_adopcion' => $this->faker->date(),
        ];
    }
}
