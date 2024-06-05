<?php

namespace Modules\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Database\Factories\FormFactory;
use Modules\Users\Models\Member;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Form\Models\SubmittedModel;

class Form extends Model
{
    use HasFactory;
    protected $table = 'form';
    
    /**
     * The attributes that are mass assignable.
     * @var string name, email, password
     */
    protected $fillable = [
        'name',
        'date_time',
    ];

    /**
     * Form to member relationship
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class);
    }

    /**
     * Form to submitted models relationship
     */
    public function submittedModels(): BelongsToMany
    {
        return $this->belongsToMany(SubmittedModel::class, 'form_model');
    }
}
