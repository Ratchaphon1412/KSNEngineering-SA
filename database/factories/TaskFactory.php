<?php

namespace Database\Factories;

use App\Models\Repair;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'repair_id' => fake()->numberBetween(1,Repair::count()),
            'stage' => 'todo',
            'todo_date' => fake()->dateTimeBetween('+1 week', '+2 week'),
        ];
    }
}
