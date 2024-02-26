<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Moto>
 */
class MotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numplaque' => fake()->string()->unique(),
            'type' => fake()->string(),
            'puissance' => fake()->string(),
            'poidvide' => fake()->string(),
            'nomproprietaire' => fake()->name(),
        ];
    }
}
