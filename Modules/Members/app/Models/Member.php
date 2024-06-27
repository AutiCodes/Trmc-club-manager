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
     * The attributes that are mass assignable.'
     * @var string name
     * @var integer rdw_number
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
    ];

    /**
     * Form to member relationship
     */
    public function form(): BelongsToMany
    {
        return $this->belongsToMany(Form::class);
    }
}
