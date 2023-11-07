<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $file_path = Storage::disk('public')->path('uploads');
        $image = $this->faker->image($file_path, 640, 480);
        $fileName = basename($image);

        return [
            'task_id' => \App\Models\Task::all()->random()->id,
            'path' => $fileName,
        ];
    }
}
