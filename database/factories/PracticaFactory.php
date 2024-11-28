<?php

namespace Database\Factories;

use App\Models\Practica;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practica>
 */
class PracticaFactory extends Factory
{
    protected $model = Practica::class;
    public function definition(): array
    {
        return [
            // Forma de crear un valor único de número aleatorio
            'codigo' => $this->faker->unique()->randomNumber(),

            // Forma de crear un número aleatorio entre dos valores
            'idestudiante' => $this->faker->numberBetween(1, 100),
            'iddocente' => $this->faker->numberBetween(1, 20),
            'idempresa' => $this->faker->numberBetween(1, 50),
            'idetapa' => $this->faker->numberBetween(1, 3),

            // Forma de crear una oración
            'titulo' => $this->faker->sentence()
        ];
    }
}
