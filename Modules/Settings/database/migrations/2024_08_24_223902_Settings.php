<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Settings\Models\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->text('value')->nullable();            
            $table->timestamps();
        });

        Setting::create([
            'key' => 'test_setting',
            'label' => 'Test setting',
            'value' => 1,
        ]);

        Setting::create([
            'key' => 'fail2ban',
            'label' => 'Fail2Ban',
            'value' => 1,
        ]);

        Setting::create([
            'key' => 'automatic_flight_report',
            'label' => 'Automatic flight reports send to email',
            'value' => 0,
        ]);

        Setting::create([
            'key' => 'automatic_flight_report_date',
            'label' => 'Automatic flight reports send to email date',
            'value' => '00/00/2000',
        ]);
        
        Setting::create([
            'key' => 'automatic_flight_report_email',
            'label' => 'Automatic flight reports send to email - email address',
            'value' => 'example@example.com',
        ]);        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
