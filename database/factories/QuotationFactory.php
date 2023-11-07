<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quotation>
 */
class QuotationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $repair = \App\Models\Repair::all()->random();

        return [
            //
            'company_id' => \App\Models\Company::all()->random()->id,
            'user_id' => \App\Models\User::all()->filter(
                function ($user) {
                    return $user->roles->where('name', 'sale')->toArray();
                }
            )->random()->id,
            'task_id' => $repair->task->id,
            'repair_id' => $repair->id,
            'discount' => 0,
            'total' => 0,
            'grand_total' => 0,
            'payment_status' => $this->faker->randomElement(['pending', 'paid']),
            'quotation_pdf' => null,
            'purchase_order_pdf' => null,


        ];
    }
}
