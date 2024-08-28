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
            'email' => 'admin@admin.nl',
            'password' => Hash::make('Admin'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([DefaultUserSeeder::class]);
    }
}
