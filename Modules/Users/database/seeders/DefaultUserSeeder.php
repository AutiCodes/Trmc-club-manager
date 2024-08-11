<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creates an default user to sign in to.
     * 
     * @author AutiCodes
     */
    public function run(): void
    {
        User::create([
            'name' => 'Default user',
            'username' => 'Admin',
            'password' => Hash::make('Admin'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([DefaultUserSeeder::class]);
    }
}
