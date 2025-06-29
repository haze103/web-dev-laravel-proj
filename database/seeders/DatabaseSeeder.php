<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional test user (not Super Admin)
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'Sales Representative',
            'status' => 'Active',
        ]);

        // Create Super Admin if not exists
        if (!User::where('role', 'Super Admin')->exists()) {
            User::create([
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@lynq.com',
                'password' => Hash::make('supersecure123'),
                'role' => 'Super Admin',
                'status' => 'Active',
            ]);
        }

        // Call RoleSeeder to create roles and assign them to users
        $this->call(RoleSeeder::class);
    }
}
//comment