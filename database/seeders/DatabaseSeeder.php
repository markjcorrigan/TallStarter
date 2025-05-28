<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Post::factory(200)->create();

        User::factory()->create([
            'name' => 'Markus',
            'email' => 'markjc@mweb.co.za',
            'password' => Hash::make('Password123'),
        ]);

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
