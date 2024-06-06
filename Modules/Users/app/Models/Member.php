<?php

namespace Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Database\Factories\MemberFactory;
use Modules\Form\Models\Form;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'name',
        'rdw_number',
    ];

    /**
     * Form to member relationship
     */
    public function form(): HasOne
    {
        return $this->hasOne(Form::class);
    }
}
