<?php

namespace Modules\Members\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Database\Factories\MemberFactory;
use Modules\Form\Models\Form;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;
    protected $table = 'Members';

    /**
     * The attributes that are mass assignable.
     * 
     * @var string name, first_name, email, password, birthdate, address, postcode, city
     * @var integer id, KNVvl, club_status, rdw_number, instruct, has_plane_brevet, has_helicopter_brevet, has_glider_brevet, in_memoriam, has_drone_a1, has_drone_a2, has_drone_a3
     */
    protected $fillable = [
        'id',
        'KNVvl',
        'name',
        'first_name',
        'email',
        'birthdate',
        'address',
        'postcode',
        'city',
        'phone',
        'club_status',
        'rdw_number',
        'instruct',
        'has_plane_brevet',
        'has_helicopter_brevet',
        'has_glider_brevet',
        'in_memoriam',
        'has_drone_a1',
        'has_drone_a2',
        'has_drone_a3',
    ];

    /**
     * Form to member relationship
     * 
     * @return BelongsToMany
     */
    public function form(): BelongsToMany
    {
        return $this->belongsToMany(Form::class);
    }
}
