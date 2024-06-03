<?php

namespace Modules\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Database\Factories\FormFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Form\Models\PlaneModel;

class Form extends Model
{
    use HasFactory;
    protected $table = 'form';
    
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'date_time',
    ];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(PlaneModel::class, 'form_model');
    }
}
