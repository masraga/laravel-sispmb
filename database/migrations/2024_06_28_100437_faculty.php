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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default("");
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });

        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default("");
            $table->foreignId("faculty_id")->constrained();
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
        Schema::dropIfExists('faculties');
        Schema::dropIfExists('studies');
    }
};
