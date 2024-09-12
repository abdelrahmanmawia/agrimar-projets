<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'apples',
                'user_id' => 2,
                'description' => 'high quality apples',
                'price' => 10,
                'category_id' => 1,
                'region_id' => 1,
                'image' => 'uploads/1ZMAvQXe2mz7HwzD5xXGWYN0ptJ2frI60gliYVGk.jpg',
                'quantity' => 100

            ],

            [
                'name' => 'bananas',
                'user_id' => 2,
                'description' => 'high quality bananas',
                'price' => 200,
                'category_id' => 1,
                'region_id' => 2,
                'image' => 'uploads/8fhm80BQ7TBoymy1JmSRMSAM56hJavflM1xaG501.jpg',
                'quantity' => 20

            ],

            [
                'name' => 'strawberries',
                'user_id' => 3,
                'description' => 'very delicous strawberries',
                'price' => 25,
                'category_id' => 1,
                'region_id' => 3,
                'image' => 'uploads/JaFcTxmEIDREfT5ciJNUpS3fcVhiQ8iEUdg0lDKM.jpg',
                'quantity' => 30

            ],

            [
                'name' => 'kiwi',
                'user_id' => 4,
                'description' => 'high quality kiwi',
                'price' => 40,
                'category_id' => 1,
                'region_id' => 4,
                'image' => 'uploads/FNX2KqdPTVU4KGO9mSw2lfM1eccCGpxj0m2FYy4n.jpg',
                'quantity' => 40

            ],

            [
                'name' => 'mango',
                'user_id' => 5,
                'description' => 'high quality mangoes',
                'price' => 40,
                'category_id' => 1,
                'region_id' => 5,
                'image' => 'uploads/CAfFXDznQKnJLxvquUp7IxUibVEYS17Rib7NoqXq.jpg',
                'quantity' => 40

            ],






        ]);
    }
}
