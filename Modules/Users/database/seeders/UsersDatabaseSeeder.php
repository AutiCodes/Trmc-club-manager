<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Models\User;
use Hash;
use Str;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Default user',
            'username' => 'Admin',
            'password' => Hash::make('Admin'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([UsersDatabaseSeeder::class]);
    }
}
