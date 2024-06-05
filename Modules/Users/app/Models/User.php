<?php

namespace Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Database\Factories\UserFactory;

class User extends Model
{
    use HasFactory;
    protected $table = 'Users';

    /**
     * The attributes that are mass assignable.
     * @var string name, email, password
     * @var int is_admin
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin',
    ];

    protected static function newFactory(): UserFactory
    {
        //return UserFactory::new();
    }
}
