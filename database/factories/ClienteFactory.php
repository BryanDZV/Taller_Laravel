<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'dni' => fake()->bothify('#########?'),
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'email' => fake()->safeEmail()


        ];
    }
}
