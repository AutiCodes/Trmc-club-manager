<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Default user',
            'username' => 'Admin',
            'password' => Hash::make('Admin'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([DatabaseSeeder::class]);
    }
}
