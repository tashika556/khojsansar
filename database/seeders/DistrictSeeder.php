<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $province_1 = [
            [
                'province_id' => 1,
                'district_name' => 'Bhojpur',

            ],
            [
                'province_id' => 1,
                'district_name' => 'Dhankuta',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Ilam',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Jhapa',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Khotang',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Morang',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Okhaldhunga',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Panchthar',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Sankhuwasabha',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Solukhumbu',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Sunsari',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Taplejung',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Terhrathum',
            ],
            [
                'province_id' => 1,
                'district_name' => 'Udayapur',
            ],
        ];
    
        $province_2 = [
            [
                'province_id' => 2,
                'district_name' => 'Parsa',
            ],
            [
                'province_id' => 2,
                'district_name' => 'Bara',
            ],
            [
                'province_id' => 2,
                'district_name' => 'Rautahat',
            ],
            [
                'province_id' => 2,
                'district_name' => 'Sarlahi',
            ],
            [
                'province_id' => 2,
                'district_name' => 'Mahottari',
            ],
            [
                'province_id' => 2,
                'district_name' => 'Dhanusha',
            ],
            [
                'province_id' => 2,
                'district_name' => 'Siraha',
            ],
            [
                'province_id' => 2,
                'district_name' => 'Saptari',
            ],
        ];
     
        $province_3 = [
            [
                'province_id' => 3,
                'district_name' => 'Kathmandu',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Lalitpur',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Bhaktapur',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Kavre',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Sindhupalchowk',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Dolakha',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Dhading',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Nuwakot',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Makwanpur',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Rasuwa',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Ramechhap',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Chitwan',
            ],
            [
                'province_id' => 3,
                'district_name' => 'Sindhuli',
            ],
        ];
 
        $province_4 = [
            [
                'province_id' => 4,
                'district_name' => 'Kaski',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Gorkha',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Nawalparasi East',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Parbhat',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Tanahu',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Baglung',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Myagdi',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Lamjung',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Syangja',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Manang',
            ],
            [
                'province_id' => 4,
                'district_name' => 'Mustang',
            ],
        ];
	
        $province_5 = [
            [
                'province_id' => 5,
                'district_name' => 'Parasi',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Dang',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Gulmi',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Kapilvastu',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Arghakharchi',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Palpa',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Rukum East',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Pyuthan',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Banke',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Bardiya',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Rupandehi',
            ],
            [
                'province_id' => 5,
                'district_name' => 'Rolpa',
            ],
        ];
 
        $province_6 = [
            [
                'province_id' => 6,
                'district_name' => 'Rukum West',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Mugu',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Dailekh',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Dolpa',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Jumla',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Jajarkot',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Kalikot',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Salyan',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Surkhet',
            ],
            [
                'province_id' => 6,
                'district_name' => 'Humla',
            ],
        ];
	
        $province_7 = [
            [
                'province_id' => 7,
                'district_name' => 'Kailali',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Kanchanpur',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Achham',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Dadeldhura',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Doti',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Darchula',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Bajhang',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Bajura',
            ],
            [
                'province_id' => 7,
                'district_name' => 'Baitadi',
            ],
        ];

        $districts = array_merge($province_1,$province_2,$province_3,$province_4,$province_5,$province_6,$province_7);

        DB::table('districts')->insert($districts);
    }
}
