<?php

use App\Models\PMBStudies;
use App\Models\Students;
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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string("paymentStatus")->default("unpaid");
            $table->integer("fee")->default(0);
            $table->string("code")->default("");
            $table->string("payment_url")->default("");
            $table->dateTime("expired_at")->useCurrent();
            $table->foreignIdFor(PMBStudies::class);
            $table->foreignIdFor(Students::class);
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
