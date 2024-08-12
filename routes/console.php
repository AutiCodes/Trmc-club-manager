<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Modules\Fail2Ban\Models\Fail2Ban;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    $bans = Fail2Ban::all();

    foreach ($bans as $ban) {
        if (Carbon::now() > $ban->unban_time) {
            Log::channel('Fail2Ban')->info('IP: ' . $ban->ip . ' with Username ' . $ban->username . ' has been unbanned!');
            $ban->delete();
        } 

    }
})->everyMinute();
