<?php

namespace App\Helpers;

class Gravatar
{
    /**
     * Gets the GravatarURL
     * 
     * @author AutiCodes
     * @return string
     */
    public static function getUrl($email, $size): string
    {
        $default = 'https://static-00.iconduck.com/assets.00/profile-default-icon-2048x2045-u3j7s5nj.png';
        $size = 70;
        
        return "https://www.gravatar.com/avatar/" . hash( "sha256", strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }
}