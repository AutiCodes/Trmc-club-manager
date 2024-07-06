<?php

namespace Modules\Members\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Members\Database\Factories\NewMemberFactory;

class NewMember extends Model
{
    use HasFactory;

    protected $table = 'new_members_submissions';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'birthdate',
        'address',
        'postcode',
        'city',
        'phonenumber',
        'nationality',
        'has_brevet_glider',
        'has_brevet_motor',
        'has_brevet_helicopter',
        'has_drone_a1_a3',
        'has_drone_a2',
        'rdw_reg_number',
        'member_of_another_rc_club',
        'want_be_member_at',
    ];
}
