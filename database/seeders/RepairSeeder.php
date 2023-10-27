<?php

namespace Database\Seeders;

use App\Models\Repair;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Repair::factory(5)->has(Task::factory(1))->create();
    }
}
