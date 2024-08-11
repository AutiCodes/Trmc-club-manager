<?php

namespace Modules\Members\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Members\Enums\ClubStatus;

class MembersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Makes an new member to test functionality
     * 
     * @author AutiCodes
     * @return void
     */
    public function run(): void
    {
        DB::table('members')->insert([
            'name' => 'Test member one',
            'birthdate' => date('Y-m-d'),
            'address' => 'Test street 69', // Nice.
            'postcode' => '1234AB',
            'city' => 'Simboektoe',
            'phone' => '1234567890',
            'rdw_number' => Str::random(6),
            'knvvl' => Str::random(6),
            'email' => Str::random(5).'@domain.nl',
            'club_status' => ClubStatus::MEMBER->value,
            'instruct' => 0,
            'has_plane_brevet' => 0,
            'has_helicopter_brevet' => 0,
            'has_glider_brevet' => 0,
            'in_memoriam' => 0,
            'has_drone_a1' => 0,
            'has_drone_a2' => 0,
            'has_drone_a3' => 0,
        ]);
    }
}
