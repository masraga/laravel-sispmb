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
        Schema::create('pmb', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default("");
            $table->date("date_start")->useCurrent();
            $table->date("date_end")->useCurrent();
            $table->integer("fee")->default(0);
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });

        Schema::create('pmb_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("pmb_id");
            $table->foreignId("studies_id");
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pmb');
        Schema::dropIfExists('pmb_studies');
    }
};
