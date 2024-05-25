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
            $table->integer('rdw_number');
            $table->timestamp('created');
            $table->integer('lipo_count');
            $table->integer('model_type');
            $table->timestamps();
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
