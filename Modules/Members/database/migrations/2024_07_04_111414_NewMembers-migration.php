<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("new_members_submissions", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("birthdate");
            $table->string("address");
            $table->string("postcode");
            $table->string("city");
            $table->integer("phonenumber");
            $table->string("nationality");
            $table->integer("has_brevet_glider");
            $table->integer("has_brevet_motor");
            $table->integer("has_brevet_helicopter");
            $table->integer("has_drone_a1_a3");
            $table->integer("has_drone_a2");
            $table->integer("rdw_reg_number")->nullable();
            $table->integer("member_of_another_rc_club")->nullable();
            $table->date("want_be_member_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("new_members_submissions");
    }
};
