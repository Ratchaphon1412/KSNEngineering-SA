<?php

namespace Database\Seeders;

use App\Models\Repair;
use App\Models\Task;
use App\Models\Quotation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (Repair::count() > 0) {
            return;
        }

        Repair::factory(10)->has(Task::factory(1))->has(Quotation::factory(1))->create();
    }
}
