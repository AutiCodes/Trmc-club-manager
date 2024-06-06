<?php

namespace Modules\RcModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\RcModels\Database\Factories\RcModelFactory;

class RcModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): RcModelFactory
    {
        //return RcModelFactory::new();
    }
}
