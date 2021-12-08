<?php

namespace Database\Factories;

use App\Models\Taxonomy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'weight' => $this->faker->numberBetween(50, 200),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['ACTIVE', 'HEALTHY', 'SICK', 'DYING', 'RIP']),
            'taxonomy_id' => Taxonomy::inRandomOrder()->first()->id,
        ];
    }
}
