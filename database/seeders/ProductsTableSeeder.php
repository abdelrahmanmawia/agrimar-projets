<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::beginTransaction();
      try {
          // Seeding logic here
          DB::commit();
      } catch (\Exception $e) {
          DB::rollBack();
          throw $e;
      }

        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 1, 100),
                'image' => $faker->imageUrl(640, 480, 'technics', true),
                'quantity' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 5),
                'address' => $faker->city,
                'user_id' => 8,
            ]);
        }DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }


}
