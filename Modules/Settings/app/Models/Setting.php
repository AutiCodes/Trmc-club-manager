<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Settings\Database\Factories\SettingFactory;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     * @var string setting_name
     * @var integer setting_value
     */
    protected $fillable = [
        'setting_name',
        'setting_value',
    ];


    public static function updateSetting($settingName, $settingValue)
    {
        $setting = Setting::where('setting_name', '==', $settingValue);

        if ($setting == NULL || $setting == []) {
            // Make new setting
            return;
        }

        // Update setting
        $setting->update([
            'setting_value' => $settingValue,
        ]);

        return;
    }
}
