<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depenses>
 */
class DepensesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => fake()->name(),
            'prix' => fake()->numberBetween(150, 7000) ,
            'commentaire' => fake()->city(),
            'user_id' => 1,
            
           
        ];
    }
}
