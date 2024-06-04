<?php

namespace Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Database\Factories\MemberFactory;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.'
     * @var string name
     * @var integer rdw_number
     */
    protected $fillable = [
        'name',
        'rdw_number',
    ];

    protected static function newFactory(): MemberFactory
    {
        //return MemberFactory::new();
    }
}
