<?php

namespace App\Helpers;

class GetLogs
{
    /**
     * Gets the Laravel log file and reverses it
     * 
     * @author AutiCodes
     * @return array logs
     */
    public static function laravel(): array
    {
        return array_reverse(file(storage_path('logs/laravel.log')));
    }

    /**
     * Gets the user activity log file and reverses it
     * 
     * @author AutiCodes
     * @return array logs
     */    
    public static function userActivity(): array
    {
        return array_reverse(file(storage_path('logs/user_activity.log')));
    }

    /**
     * Gets the member activity log file and reverses it
     * 
     * @author AutiCodes
     * @return array logs
     */    
    public static function memberActivity(): array
    {
        return array_reverse(file(storage_path('logs/member_activity.log')));
    }

    /**
     * Gets the access log file and reverses it
     * 
     * @author AutiCodes
     * @return array logs
     */    
    public static function access(): array
    {
        return array_reverse(file(storage_path('logs/access.log')));
    }

    /**
     * Gets the Fail2Ban log file and reverses it
     * 
     * @author AutiCodes
     * @return array logs
     */
    public static function fail2ban(): array
    {
        return array_reverse(file(storage_path('logs/Fail2Ban.log')));
    }
}