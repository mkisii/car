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
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid('uuid')->index()->primary();
            $table->uuid('user_id');
            $table->string('make_name');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('image');
            $table->string('year_of_make');
            $table->string('drive_type');
            $table->enum('condition',['new','used'])->default('new');
            $table->enum('transmission',['manual','automatic','cvt'])->default('automatic');
            $table->string('mileage');
            $table->string('engine_size');
            $table->string('cylinder');
            $table->string('vin_number');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
