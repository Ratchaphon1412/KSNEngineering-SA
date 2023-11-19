<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crane>
 */
class CraneFactory extends Factory
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
            'company_id' => \App\Models\Company::all()->random()->id, // 'company_id' => 'factory:App\Models\Company
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'waranty' => $this->faker->dateTimeBetween('-3 years', '3 years')->format('Y-m-d'),
        ];
    }
}
