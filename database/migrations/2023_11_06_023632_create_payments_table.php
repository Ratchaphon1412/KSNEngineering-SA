    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use App\Models\Repair;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->string('transection_token');
                $table->string('payment_method');
                $table->double('pay');
                $table->string('payment_status')->default('pending')->enum('pending', 'paid', 'failed', 'expired');
                $table->time('create_at');
                $table->string('confirm_payment_uri')->nullable();
                $table->foreignIdFor(Repair::class);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('payments');
        }
    };
