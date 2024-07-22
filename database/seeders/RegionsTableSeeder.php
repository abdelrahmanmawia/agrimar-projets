<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['name' => 'Tanger-Tétouan-Al Hoceïma'],
            ['name' => 'L\'Oriental'],
            ['name' => 'Fès-Meknès'],
            ['name' => 'Rabat-Salé-Kénitra'],
            ['name' => 'Béni Mellal-Khénifra'],
            ['name' => 'Casablanca-Settat'],
            ['name' => 'Marrakech-Safi'],
            ['name' => 'Drâa-Tafilalet'],
            ['name' => 'Souss-Massa'],
            ['name' => 'Guelmim-Oued Noun'],
            ['name' => 'Laâyoune-Sakia El Hamra'],
            ['name' => 'Dakhla-Oued Ed-Dahab']
        ];

        DB::table('regions')->insert($regions);
    }
}
