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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("code")->default("");
            $table->string("name")->default("");
            $table->boolean("gender")->default(1);
            $table->string("school_origin")->default("");
            $table->string("address")->default("");
            $table->foreignId('user_id');
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });

        Schema::create('students_pmb', function (Blueprint $table) {
            $table->id();
            $table->foreignId("pmb_studies_id");
            $table->foreignId("students_id");
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('students_pmb');
    }
};
