<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaxonomyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kingdom' => 'Animalia',
            'class' => $this->faker->randomElement(['vertebrata', 'invertebrata']),
            'family' => $this->faker->randomElement(['felidae', 'canidae', 'ursidae', 'mustelidae']),
            'genus' => $this->faker->randomElement(['vulpes', 'pongo', 'canis', 'panthera', 'felis']),
            'species' => $this->faker->words(2, true),
        ];
    }
}
