<?php

namespace App\Helpers;

class GetLogs
{
    /**
     * Gets the Laravel log file
     * 
     * @author KelvinCodes
     * @return array logs
     */
    public static function laravel()
    {
        return array_reverse(file(storage_path('logs/laravel.log')));
    }

    /**
     * Gets the user activity log file
     * 
     * @author KelvinCodes
     * @return array logs
     */    
    public static function userActivity()
    {
        return array_reverse(file(storage_path('logs/user_activity.log')));
    }

    /**
     * Gets the members activity log file
     * 
     * @author KelvinCodes
     * @return array logs
     */    
    public static function memberActivity()
    {
        return array_reverse(file(storage_path('logs/member_activity.log')));
    }

    /**
     * Gets the access log file
     * 
     * @author KelvinCodes
     * @return array logs
     */    
    public static function access()
    {
        return array_reverse(file(storage_path('logs/access.log')));
    }
}