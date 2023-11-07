<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        $file_path = Storage::disk('public')->path('repairs');
        $image = $this->faker->image($file_path, 640, 480);
        $fileName = basename($image);


        return [
            'company_id' => \App\Models\Company::all()->random()->id,
            'user_id' => \App\Models\User::all()->random()->id,
            'crane_id' => \App\Models\Crane::all()->random()->id,
            'name' => $this->faker->name(),
            'description' => fake()->text(100),
            'image' => $fileName,
        ];
    }
}
