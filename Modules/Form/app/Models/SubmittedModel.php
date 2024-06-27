<?php

namespace Modules\Form\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Database\Factories\SubmittedModelFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Form\Models\Form;

class SubmittedModel extends Model
{
    use HasFactory;
    protected $table = 'model';

    /**
     * The attributes that are mass assignable.
     * @var int id, model_type, class, lipo_count
     */
    protected $fillable = [
        'id',
        'model_type',
        'class',
        'lipo_count',
    ];

    /**
     * Submitted models to form relationship
     * 
     * @return BelongsToMany
     */
    public function form(): belongsToMany
    {
        $this->belongsToMany(Form::class);
    }
}
