<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            [
                'id' => 1,
                'province_name' => 'Koshi Pradesh',
            ],
            [
                'id' => 2,
                'province_name' => 'Madhesh Pradesh',
            ],
            [
                'id' => 3,
                'province_name' => 'Bagmati Pradesh',
            ],
            [
                'id' => 4,
                'province_name' => 'Gandaki Pradesh',
            ],
            [
                'id' => 5,
                'province_name' => 'Lumbini Pradesh',
            ],
            [
                'id' => 6,
                'province_name' => 'Karnali Pradesh',
            ],
            [
                'id' => 7,
                'province_name' => 'Sudurpachchim Pradesh',
            ],
        ];
        DB::table('provinces')->insert($provinces);
    }
}
