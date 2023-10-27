<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CraneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (\App\Models\Crane::count() > 0) {
            return;
        }

        \App\Models\Crane::factory(10)->create();
    }
}
