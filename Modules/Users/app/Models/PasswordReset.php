<?php

namespace Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Database\Factories\PasswordResetFactory;

class PasswordReset extends Model
{
    use HasFactory;
    protected $table = 'password_reset_tokens';

    /**
     * The attributes that are mass assignable.
     * 
     * @author AutiCodes
     * @var string email
     * $var string token
     * @var datetime created_at
     */
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
}
