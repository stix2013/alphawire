<?php

namespace Database\Seeders;

use App\Models\Product; // Import the Product model
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a couple of roles if they don't exist
        $adminRole = \App\Models\Role::firstOrCreate(['name' => 'Admin'], ['description' => 'Administrator role', 'enable' => true]);
        $userRole = \App\Models\Role::firstOrCreate(['name' => 'User'], ['description' => 'Standard user role', 'enable' => true]);

        // Create an admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role_id' => $adminRole->id,
        ]);

        // Create some regular users
        \App\Models\User::factory(10)->create([
            'role_id' => $userRole->id,
        ]);

        // You can still call other seeders if needed, for example:
        // $this->call([
        //     ProductSeeder::class, // Assuming ProductSeeder exists
        // ]);
    }
}
