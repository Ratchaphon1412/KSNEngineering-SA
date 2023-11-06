<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Company::class);
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Repair::class)->nullable();
            $table->foreignIdFor(\App\Models\Task::class)->nullable();
            $table->integer('discount')->default(0);
            $table->double('total');
            $table->double('grand_total');
            $table->string('payment_status')->default('pending')->enum('pending', 'paid');
            $table->string('quotation_pdf')->nullable();
            $table->string('purchase_order_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
