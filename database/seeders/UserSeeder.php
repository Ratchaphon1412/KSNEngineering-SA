<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (User::count() > 0) {
            return;
        }

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

        \App\Models\User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('technician');
        });


        $user = new User();
        $user->name = 'poomffi';
        $user->email = 'poomffi@hotmail.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
