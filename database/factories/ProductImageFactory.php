<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\productImage>
 */
class productImageFactory extends Factory
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
            'type' => $this->faker->randomElement(['image', 'video']),
            'imageUrl' => $this->faker->imageUrl(),
            'product_id' =>  \App\Models\product::all()->random()->id,

        ];
    }
}
