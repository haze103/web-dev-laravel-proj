<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Check if a Super Admin already exists
        if (User::where('role', 'Super Admin')->exists()) {
            $this->command->info('Super Admin already exists. Skipping...');
            return;
        }

        // Create Super Admin
        User::create([
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'email'      => 'superadmin@lynq.test',
            'password'   => Hash::make('superadmin123'), //Set your own strong password
            'role'       => 'Super Admin',
            'status'     => 'Active',
        ]);

        $this->command->info('Super Admin created successfully!');
    }
}
