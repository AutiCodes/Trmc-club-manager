<?php

namespace App\Helpers;

use Modules\Fail2Ban\Models\Fail2Ban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Fail2BanHelper
{
    /**
     * Adds an failed login to an new or excisting entry
     * 
     * @author AutiCodes
     * @param string $username the username that's tried to log in
     */
    public static function AddFailedLogin($username, $unban_time)
    {
        $entry = Fail2Ban::where('ip', file_get_contents('https://api.ipify.org'))->first();

        // If that IP is not in the failed login db
        if (!$entry || $entry == NULL) {
            Fail2Ban::create([
                'ip' => file_get_contents('https://api.ipify.org'),
                'username' => $username,
                'failed_login_count' => 1,
                'unban_time' => Carbon::now()->addMinutes($unban_time),
            ]);

            return false;
        }
        
        // If the IP is in the failed login db
        $entry->update([
            'failed_login_count' => ++ $entry->failed_login_count
        ]);

        // Add to log if someone is banned
        if (++ $entry->failed_login_count >=4) {
            Log::channel('fail2ban')->warning('Added someone to Fail2Ban! Username: ' . $username . '. IP: ' . $entry->ip);
        } 

        return true;
    }

    /**
     * Checks if an IP is BANNED
     * 
     * @author AutiCodes
     */
    public static function checkIfBanned()
    {
        $entry = Fail2Ban::where('ip', file_get_contents('https://api.ipify.org'))->first();

        if (!$entry || $entry == NULL) {
            return false;
        }

        if ($entry->failed_login_count < 4) {
            return false;
        }

        return true;
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule()
    {
        $schedule->call(function () {
            Fail2Ban::truncate();
        })->everyMinute();
    }
}