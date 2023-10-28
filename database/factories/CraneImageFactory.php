<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CraneImage>
 */
class CraneImageFactory extends Factory
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
            'crane_id' => \App\Models\Crane::all()->random()->id, // 'crane_id' => 'factory:App\Models\Crane
            'image' => $this->faker->imageUrl(),
        ];
    }
}
