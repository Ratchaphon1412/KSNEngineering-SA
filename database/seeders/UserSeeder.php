<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //admin
        \App\Models\User::factory()->count(1)->create(
            [
                'name' => 'admin'
            ]
        )->each(function ($user) {
            $user->assignRole('admin');
        });
        //user
        \App\Models\User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
