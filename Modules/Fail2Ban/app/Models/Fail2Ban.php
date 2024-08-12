<?php

namespace Modules\Fail2Ban\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Fail2Ban\Database\Factories\Fail2BanFactory;
use Illuminate\Http\Request;

class Fail2Ban extends Model
{
    use HasFactory;
    protected $table = 'fail2ban';

    /**
     * The attributes that are mass assignable.
     * 
     * @author AutiCodes
     * @var string ip, username
     * @var integer failed_login_count
     * @var datetime created_at, updated_at
     */
    protected $fillable = [
        'ip',
        'username',
        'failed_login_count',
        'created_at',
        'updated_at',
    ];
}
