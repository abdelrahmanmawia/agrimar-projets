<?php

namespace Database\Seeders;

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


        // User::factory(10)->create();


        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        foreach (range(1, 10) as $index) {
            User::factory()->create([
                'name' => "user$index",
                'email' => "user$index@gmail.com",
                'password' => bcrypt('1234'),
                'phone_number' => '0' . rand(100000000, 999999999),
                'role' => 'user'
            ]);
        }
        $this->call([CategoriesTableSeeder::class]);
        $this->call([RegionsTableSeeder::class]);
        $this->call([ProductsTableSeeder::class]);

    }
}
