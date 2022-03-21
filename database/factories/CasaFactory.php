<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Casa>
 */
class CasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'imageBase' => $this->faker->imageUrl(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'category' => $this->faker->randomElement(['Casa', 'Apartamento', 'Casa de Campo', 'Casa de Campo']),
            'information' => 'Precio: $45',
            'description' => $this->faker->text(),
            'imageList' => $this->faker->imageUrl(),
        ];
    }
}
