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
        Schema::create('form_submission', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('date_time');
            $table->integer('lipo_count');
            $table->integer('model_type');
            $table->timestamps();
        });

        Schema::create('model_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('model_id');
            $table->timestamps();
        });       

        Schema::create('power_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('power_id');
            $table->timestamps();
        });          

        Schema::create('form_submission_model_type', function (Blueprint $table) {
            $table->unsignedBigInteger('form_submission_id');
            $table->unsignedBigInteger('model_id');
        });

        Schema::create('form_submission_power_type', function (Blueprint $table) {
            $table->unsignedBigInteger('form_submission_id');
            $table->unsignedBigInteger('power_id');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submission');
    }
};
