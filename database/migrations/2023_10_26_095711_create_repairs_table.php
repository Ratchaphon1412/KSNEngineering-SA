<?php

use App\Models\Company;
use App\Models\Crane;
use App\Models\User;
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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Crane::class)->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('image')->nullable();
            $table->double('amount')->default(0);
            $table->boolean('waranty')->default(false);
            $table->string('purchase_order')->nullable();
            $table->string('payment_status')->default('pending')->enum('pending', 'paid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
