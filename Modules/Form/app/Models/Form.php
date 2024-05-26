<?php

namespace Modules\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Database\Factories\FormFactory;

class Form extends Model
{
    use HasFactory;
    protected $table = 'form_submission';
    
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'date',
        'time',
        'lipo_count',
        'model_type',
    ];
}
