<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
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

        $this->call([DefaultUserSeeder::class]);
    }
}
