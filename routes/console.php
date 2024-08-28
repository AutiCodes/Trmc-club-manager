<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Modules\Fail2Ban\Models\Fail2Ban;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Form\Models\Form;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/**
 * Deletes banned users/IP's from Fail2Ban
 * 
 * @author AutiCodes
 */
Schedule::call(function () {
    $bans = Fail2Ban::all();

    foreach ($bans as $ban) {
        if (Carbon::now() > $ban->unban_time) {
            Log::channel('Fail2Ban')->info('IP: ' . $ban->ip . ' with Username ' . $ban->username . ' has been unbanned!');
            $ban->delete();
        } 

    }
})->everyMinute();

/**
 * Cleans up empty form fill ins
 * TODO Temp fix, needs code refactoring 
 * 
 * @author AutiCodes
 */
Schedule::call(function () {
    $flightSubmittions = Form::orderBy('id', 'desc')
                            ->with('member')
                            ->with('submittedModels')
                            ->get();

    foreach ($flightSubmittions as $flightSubmittion) {
        if (count($flightSubmittion->submittedModels) == 0) {
            // Delete flight
            $flightSubmittion->delete();
        } 
    }
})->everyMinute();

/**
 * Makes an automated mail to Wilma (temp) for exports of flights
 * TODO: fix with new setting system
 */
Schedule::call(function () {
    
})->lastDayOfMonth('8:00');