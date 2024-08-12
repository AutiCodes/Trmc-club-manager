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
        Schema::create('fail2ban', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('username');
            $table->integer('failed_login_count');
            $table->datetime('unban_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fail2ban');
    }
};
