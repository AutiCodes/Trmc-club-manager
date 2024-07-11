<?php

namespace Modules\Members\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Members\Database\Factories\UserSyncFactory;
use DB;

class UserSync extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    /**
     * The DB connection
     */
    protected $connection = 'wordpress_MySQL';

    protected static function newFactory(): UserSyncFactory
    {
        //return UserSyncFactory::new();
    }


    /**
     * Syncs newly added users to the TRMC.nl site
     * 
     * @var string $userLogin, $userPass, $userNiceName, $userEmail, $userDisplayName
     * @author KelvinCodes
     * @return DB
     */
    public static function syncNewUser($userLogin, $userPass, $userNicename, $userEmail, $userDisplayName)
    {
        $currentDateTime = date('Y-m-d H:i:s');

        // Save user into wp_users
        $query = DB::connection('wordpress_MySQL')->statement(
            "INSERT INTO
                wp_users (user_login, user_pass, user_nicename, user_email, user_status, user_registered, display_name)
            VALUES 
                ('$userLogin', MD5('$userPass'), '$userNicename', '$userEmail', '0', '$currentDateTime', '$userDisplayName')
            "
        );

        // Get the user ID
        $getUserId = DB::connection('wordpress_MySQL')->select("SELECT ID FROM wp_users WHERE user_login = '$userLogin'");
        $userId = $getUserId[0]->ID;

        // User role crap
        $userRole = 'a:2:{s:10:"subscriber";b:1;s:5:"leden";b:1;}';

        // Adding user metadata role and name
        DB::connection('wordpress_MySQL')->statement(
            "INSERT INTO
                 wp_usermeta (user_id, meta_key, meta_value)
             VALUES 
                ('$userId', 'wp_capabilities', '$userRole'),
                ('$userId', 'first_name', '$userDisplayName')
            "
        );

        return $query;
    }

    /**
     * Updates an user from Laravel to Wordpress
     * 
     * @var $oldName, $userNicename, $userEmail, $userDisplayName
     * @author KelvinCodes
     * @return bool
     */
    public static function updateUser($oldName, $userNicename, $userEmail, $userDisplayName): bool
    {
        $user = DB::connection('wordpress_MySQL')
                        ->table('wp_users')
                        ->where('user_login', explode(' ', $oldName))
                        ->first();
        if (!$user) {
            return false;
        }

        DB::connection('wordpress_MySQL')->statement(
                "UPDATE wp_users SET
                    user_nicename = '$userNicename',
                    user_email = '$userEmail',
                    display_name = '$userDisplayName'
                
                WHERE ID = $user->ID
                "
        );

        return true;
    }

    /**
     * Updates an user password on Wordpress
     * 
     * @var $email, $password
     * @author KelvinCodes
     * @return bool
     */
    public static function updateUserPassword($email, $password): bool
    {
        $query = DB::connection('wordpress_MySQL')->statement(
            "UPDATE wp_users SET
                user_pass = MD5('$password')
            WHERE user_email = '$email'
            "
        );

        if (!$query) {
            return false;
        }

        return true;
    }


    /**
     * Deletes an user from Laravel to Wordpress
     * 
     * @var $name
     * @author KelvinCodes
     * @return bool
     */
    public static function deleteUser($name): bool
    {
        $userDeletion = DB::connection('wordpress_MySQL')->statement(
            "DELETE FROM wp_users
            WHERE user_nicename = '$name'
            "
        );

        if (!$userDeletion) {
            return false;
        } 
        
        return true;
    }
}
