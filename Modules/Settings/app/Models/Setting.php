<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Settings\Database\Factories\SettingFactory;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @author AutiCodes
     * @var string key The setting key
     * @var string label The setting name
     * @var mixed value The setting value
     */
    protected $fillable = [
        'key',
        'label',
        'value',
    ];

    /**
     * Gets an specific setting value
     * 
     * @author AutiCodes
     * @var string $key the key of the setting
     * @return mixed
     */
    public static function getValue(string $key): mixed
    {
        return Setting::where('key', $key)->first()->value;
    }

    /**
     * Updates an specific setting
     * 
     * @author AutiCodes
     * @var string $key the key of the setting name
     * @var mixed $value the new value of the setting
     */
    public static function updateValue(string $key, mixed $value)
    {
        Setting::where('key', $key)->first()->update([
            'value' => $value,
        ]);
    }
}
