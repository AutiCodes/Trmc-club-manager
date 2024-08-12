<?php

namespace App\Helpers;

use Modules\Fail2Ban\Models\Fail2Ban;
use Illuminate\Http\Request;

class Fail2BanHelper
{
    /**
     * Adds an failed login to an new or excisting entry
     * 
     * @author AutiCodes
     * @param string $username the username that's tried to log in
     */
    public static function addOrCheckFailedLogin($username)
    {
        $endUserIP = file_get_contents('https://api.ipify.org');
        $entry = Fail2Ban::where('ip', "$endUserIP")->first();

        // If that IP is not in the failed login db
        if (!$entry) {
            Fail2Ban::create([
                'ip' => $endUserIP,
                'username' => $username,
                'failed_login_count' => 1,
            ]);

            return false;
        }
        
        // If the IP is in the failed login db
        $entry->update([
            'failed_login_count' => ++ $x->failed_login_count
        ]);

        if (++ $entry->failed_login_count < 4) { 
            return false;
        }

        return true;
    }
}