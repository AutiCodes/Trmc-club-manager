<?php

namespace Modules\Flights\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Flights\Database\Factories\SubmittedModelsFactory;

class SubmittedModels extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): SubmittedModelsFactory
    {
        //return SubmittedModelsFactory::new();
    }
}
