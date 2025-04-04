<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Samuel Beteta',
            'email' => 'admin@sonicwave.com',
            'password' => Hash::make('superadmin123'), 
            'role' => 'Superadmin',
            'is_super_admin' => true
        ]);
    }
}
