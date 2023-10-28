<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repair>
 */
class RepairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => \App\Models\Company::all()->random()->id,
            'user_id' => \App\Models\User::all()->random()->id,
            'crane_id' => \App\Models\Crane::all()->random()->id,
            'name' => $this->faker->name(),
            'description' => fake()->text(100),
        ];
    }
}
