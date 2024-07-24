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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id')->nullable();
            $table->string('degree_title')->nullable();
            $table->string('institute')->nullable();
            $table->date('edu_start_date')->nullable();
            $table->date('edu_end_date')->nullable();
            $table->longText('education_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_');
    }
};
