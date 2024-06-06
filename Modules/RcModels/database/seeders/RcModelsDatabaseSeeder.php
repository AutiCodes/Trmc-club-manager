<?php

namespace Modules\RcModels\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RcModelsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: For install: php artisan module:seed RcModels
        // TODO: Use enum
        DB::table('rc_models')->insert([
            'model_id' => 1,
            'model_name' => 'Vliegtuig'
        ]);

        DB::table('rc_models')->insert([
            'model_id' => 2,
            'model_name' => 'Zweefvliegtuig'
        ]);
        
        DB::table('rc_models')->insert([
            'model_id' => 3,
            'model_name' => 'Helicopter'
        ]);
        
        DB::table('rc_models')->insert([
            'model_id' => 4,
            'model_name' => 'Drone'
        ]);        
    }
}
