<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipalities = [
            [
                'municipality_name' =>  'Shadananda Municipality',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Salpa Silichho Gaunpalika',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Temkemaiyum Gaunpalika',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Bhojpur Municipality',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Arun Gaunpalika',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Pauwa Dunma Gaunpalika',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Ramprasad Rai Gaunpalika',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Hatuwagadhi Gaunpalika',
                'district_id' =>  1,
            ],
            [
                'municipality_name' =>  'Aamchowk Gaunpalika',
                'district_id' =>  1,
            ],


            [
                'municipality_name' =>  'Mahalaxmi Municipality',
                'district_id' =>  2,
            ],
            [
                'municipality_name' =>  'Pakhribas Municipality',
                'district_id' =>  2,
            ],
            [
                'municipality_name' =>  'Chhathar Jorpati Gaunpalika',
                'district_id' =>  2,
            ],
            [
                'municipality_name' =>  'Dhankuta Municipality',
                'district_id' =>  2,
            ],
            [
                'municipality_name' =>  'Shahidbhumi Municipality',
                'district_id' =>  2,
            ],
            [
                'municipality_name' =>  'Sangurigadhi Gaunpalika',
                'district_id' =>  2,
            ],
            [
                'municipality_name' =>  'Chaubise Gaunpalika',
                'district_id' =>  2,
            ],


            [
                'municipality_name' =>  'Mai Jogmai Gaunpalika',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Sandakpur Gaunpalika',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Ilam Municipality',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Deumai Municipality',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Fakfokathum Gaunpalika',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Mangsebung Gaunpalika',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Chulachuli Gaunpalika',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Mai Municipality',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Suryodaya Municipality',
                'district_id' =>  3,
            ],
            [
                'municipality_name' =>  'Rong Gaunpalika',
                'district_id' =>  3,
            ],



            [
                'municipality_name' =>  'Mechinagar Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Buddhashanti Gaunpalika',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Arjundhara Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Kankai Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Shivasatakshi Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Kamal Gaunpalika',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Damak Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Gauradaha Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Gauriganj Gaunpalika',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Jhapa Gaunpalika',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Barhadashi Gaunpalika',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Birtamod Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Haldibari Gaunpalika',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Bhadrapur Municipality',
                'district_id' =>  4,
            ],
            [
                'municipality_name' =>  'Kanchanakawal Gaunpalika',
                'district_id' =>  4,
            ],




            [
                'municipality_name' =>  'Kepilasgadhi Gaunpalika',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Aiselukharka Gaunpalika',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Rawa Besi Gaunpalika',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Halesi Tuwachung Municipality',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Diktel Rupakot Majhuwagadhi Municipality',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Sakela Gaunpalika',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Diprung Chuichumma Gaunpalika',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Khotehang Gaunpalika',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Jante Dhunga Gaunpalika',
                'district_id' =>  5,
            ],
            [
                'municipality_name' =>  'Barahi Pokhari Gaunpalika',
                'district_id' =>  5,
            ],


         
            [
                'municipality_name' =>  'Biratnagar Metropolitan City',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Miklajung Gaunpalika',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Letang Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Kerabari Gaunpalika',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Sundarharaicha Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Belbari Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Kanepokhari Gaunpalika',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Pathari Shanishchare Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Urlabari Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Ratuwamai Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Sunwarshi Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Rangeli Municipality',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Gramthan Gaunpalika',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Budhiganga Gaunpalika',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Katahari Gaunpalika',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Dhanapalthan Gaunpalika',
                'district_id' =>  6,
            ],
            [
                'municipality_name' =>  'Jahada Gaunpalika',
                'district_id' =>  6,
            ],




            [
                'municipality_name' =>  'Chishankhu Gadhi Gaunpalika',
                'district_id' =>  7,
            ],
            [
                'municipality_name' =>  'Siddhicharan Municipality',
                'district_id' =>  7,
            ],
            [
                'municipality_name' =>  'Molung Gaunpalika',
                'district_id' =>  7,
            ],
            [
                'municipality_name' =>  'Khiji Demba Gaunpalika',
                'district_id' =>  7,
            ],
            [
                'municipality_name' =>  'Likhu Gaunpalika',
                'district_id' =>  7,
            ],
            [
                'municipality_name' =>  'Champadevi Gaunpalika',
                'district_id' =>  7,
            ],[
                'municipality_name' =>  'Sunkoshi Gaunpalika',
                'district_id' =>  7,
            ],
            [
                'municipality_name' =>  'Manebhanjyang Gaunpalika',
                'district_id' =>  7,
            ],



           
            [
                'municipality_name' =>  'Yangbarak Gaunpalika',
                'district_id' =>  8,
            ],
            [
                'municipality_name' =>  'Hilihan Gaunpalika',
                'district_id' =>  8,
            ],
            [
                'municipality_name' =>  'Falelung Gaunpalika',
                'district_id' =>  8,
            ],
            [
                'municipality_name' =>  'Phidim Municipality',
                'district_id' =>  8,
            ],
            [
                'municipality_name' =>  'Falgunanda Gaunpalika',
                'district_id' =>  8,
            ],
            [
                'municipality_name' =>  'Kummayak Gaunpalika',
                'district_id' =>  8,
            ],
            [
                'municipality_name' =>  'Tumbewa Gaunpalika',
                'district_id' =>  8,
            ],
            [
                'municipality_name' =>  'Miklajung Gaunpalika',
                'district_id' =>  8,
            ],
        



            [
                'municipality_name' =>  'Bhotkhola Gaunpalika',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Makalu Gaunpalika',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Silichong Gaunpalika',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Chichila Gaunpalika',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Sabhapokhari Gaunpalika',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Khandabari Municipality',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Panchakhapan Municipality',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Chainapur Municipality',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Madi Municipality',
                'district_id' =>  9,
            ],
            [
                'municipality_name' =>  'Dharmadevi Municipality',
                'district_id' =>  9,
            ],




            [
                'municipality_name' =>  'Khumbu Pasanglhamu Gaunpalika',
                'district_id' =>  10,
            ],
            [
                'municipality_name' =>  'Mahakulung Gaunpalika',
                'district_id' =>  10,
            ],
            [
                'municipality_name' =>  'Sotang Gaunpalika',
                'district_id' =>  10,
            ],
            [
                'municipality_name' =>  'Mapya Dudhkoshi Gaunpalika',
                'district_id' =>  10,
            ],
            [
                'municipality_name' =>  'Thulung Dudhkoshi Gaunpalika',
                'district_id' =>  10,
            ],
            [
                'municipality_name' =>  'Necha Salyan Gaunpalika',
                'district_id' =>  10,
            ],
            [ 
                'municipality_name' =>  'Solu Dhudhakunda Municipality',
                'district_id' =>  10,
            ],
            [
                'municipality_name' =>  'Likhu Pike Gaunpalika',
                'district_id' =>  10,
            ],


            
            [
                'municipality_name' =>  'Dharan Sub-Metropolitan City',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Barahachhetra Municipality',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Koshi Gaunpalika',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Bhokraha Narsingh Gaunpalika',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Ramdhuni Municipality',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Itahari Sub-Metropolitan City',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Duhabi Municipality',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Gadhi Gaunpalika',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Inaruwa Municipality',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Harinagar Gaunpalika',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Dewangunj Gaunpalika',
                'district_id' =>  11,
            ],
            [
                'municipality_name' =>  'Barju Gaunpalika',
                'district_id' =>  11,
            ],





            [
                'municipality_name' =>  'Phaktanlung Gaunpalika',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Mikwakhola Gaunpalika',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Meringden Gaunpalika',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Maiwakhola Gaunpalika',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Aatharai Tribeni Gaunpalika',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Phungling Municipality',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Pathivara Yangwarak Gaunpalika',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Sirijanga Gaunpalika',
                'district_id' =>  12,
            ],
            [
                'municipality_name' =>  'Sidingba Gaunpalika',
                'district_id' =>  12,
            ],


         

            [
                'municipality_name' =>  'Aatharai Gaunpalika',
                'district_id' =>  13,
            ],
            [
                'municipality_name' =>  'Phedap Gaunpalika',
                'district_id' =>  13,
            ],
            [
                'municipality_name' =>  'Menchhayayem Gaunpalika',
                'district_id' =>  13,
            ],
            [
                'municipality_name' =>  'Myanglung Municipality',
                'district_id' =>  13,
            ],
            [
                'municipality_name' =>  'Laligurans Municipality',
                'district_id' =>  13,
            ],
            [
                'municipality_name' =>  'Chhathar Gaunpalika',
                'district_id' =>  13,
            ],




            [
                'municipality_name' =>  'Belaka Municipality',
                'district_id' =>  14,
            ],
            [
                'municipality_name' =>  'Chaudandigadhi Municipality',
                'district_id' =>  14,
            ],
            [
                'municipality_name' =>  'Triyuga Municipality',
                'district_id' =>  14,
            ],
            [
                'municipality_name' =>  'Rautamai Gaunpalika',
                'district_id' =>  14,
            ],
            [
                'municipality_name' =>  'Limchunbung Gaunpalika',
                'district_id' =>  14,
            ],
            [
                'municipality_name' =>  'Tapli Gaunpalika',
                'district_id' =>  14,
            ],
            [
                'municipality_name' =>  'Katari Municipality',
                'district_id' =>  14,
            ],
            [
                'municipality_name' =>  'Udayapurgadhi Gaunpalika',
                'district_id' =>  14,
            ],




            [
                'municipality_name' =>  'Birgunj Metropolitan City',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Thori Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Jirabhawani Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Jagarnathpur Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Paterwa Sugauli Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Sakhuwa Prasauni Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Parsagadhi Municipality',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Bahudarmai Municipality',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Pokhariya Municipality',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Kalikamai Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Dhobini Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Chhipaharmai Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Pakaha Mainpur Gaunpalika',
                'district_id' =>  15,
            ],
            [
                'municipality_name' =>  'Bindabasini Gaunpalika',
                'district_id' =>  15,
            ],




            [
                'municipality_name' =>  'Jitpur Simara Sub-Metropolitan City',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Kaliya Sub-Metropolitan City',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Nijagadh Municipality',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Kolhabi Municipality',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Parawanipur Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Prasauni Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Bishrampur Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Pheta Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Karaiyamai Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Baragadhi Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Aadarsha Kotwal Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Simroungadh Municipality',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Pacharauta Municipality',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Mahagadhimai Municipality',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Devtal Gaunpalika',
                'district_id' =>  16,
            ],
            [
                'municipality_name' =>  'Subarna Gaunpalika',
                'district_id' =>  16,
            ],




            [
                'municipality_name' =>  'Chandrapur Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Gujara Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Phatuwa Bijayapur Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Katahariya Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Brindaban Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Gadhimai Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Madhav Narayan Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Garuda Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Dewahi Gonahi Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Maulapur Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Boudhimai Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Paroha Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Rajpur Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Yamunamai Gaunpalika',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Durga Bhagawati Gaunpalika',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Rajdevi Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Gaur Municipality',
                'district_id' =>  17,
            ],
            [
                'municipality_name' =>  'Ishanath Municipality',
                'district_id' =>  17,
            ],





            [
                'municipality_name' =>  'Lalbandi Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Hariwan Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Bagmati Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Barahathawa Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Haripur Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Ishworpur Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Haripurwa Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Parsa Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Brahmapuri Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Chandranagar Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Kabilashi Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Chakraghatta Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Basbariya Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Dhanakaul Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Ramnagar Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Balara Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Godaita Municipality',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Bishnu Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Kaudena Gaunpalika',
                'district_id' =>  18,
            ],
            [
                'municipality_name' =>  'Malangawa Municipality',
                'district_id' =>  18,
            ],




            [
                'municipality_name' =>  'Bardibas Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Gaushala Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Sonama Gaunpalika',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Aurahi Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Bhangaha Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Loharpatti Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Balawa Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Ram Gopalpur Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Samsi Gaunpalika',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Manara Shisawa Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Ekadara Gaunpalika',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Mahottari Gaunpalika',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Pipara Gaunpalika',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Matihani Municipality',
                'district_id' =>  19,
            ],
            [
                'municipality_name' =>  'Jaleshwor Municipality',
                'district_id' =>  19,
            ],


            

            [
                'municipality_name' =>  'Janakpurdham Sub-Metropolitan City',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Ganeshman Charnath Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Dhanushadham Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Mithila Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Bateshwor Gaunpalika',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Chhireshwornath Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Laxminiya Gaunpalika',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Mithila Bihari Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Hansapur Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Sabaila Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Shahidnagar Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Kamala Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Janak Nandini Gaunpalika',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Bideha Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Aurahi Gaunpalika',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Dhanauji Gaunpalika',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Nagarain Municipality',
                'district_id' =>  20,
            ],
            [
                'municipality_name' =>  'Mukhiyapatti Musaharmiya Gaunpalika',
                'district_id' =>  20,
            ],




            [
                'municipality_name' =>  'Lahan Municipality',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Dhangadhimai Municipality',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Golbazar Municipality',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Mirchaiya Municipality',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Karjanha Municipality',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Kalyanpur Municipality',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Naraha Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Bishnupur Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Arnama Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Sukhipur Municipality',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Laxmipur Patari Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Sakhuwa Nankarkatti Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Bhagawanpur Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Nawarajpur Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Bariyarpatti Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Aurahi Gaunpalika',
                'district_id' =>  21,
            ],
            [
                'municipality_name' =>  'Siraha Municipality',
                'district_id' =>  21,
            ],
  



            [
                'municipality_name' =>  'Saptakoshi Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Kanchanrup Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Agnisair Krishna Sabaran Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Rupani Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Shambhunath Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Khadak Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Surunga Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Balan-Bihul Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Bode Barsain Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Dakneshwori Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Rajgadh Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Bishnupur Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Rajbiraj Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Mahadewa Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Tirahut Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Hanumannagar Kankalini Municipality',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Tilathi Koiladi Gaunpalika',
                'district_id' =>  22,
            ],
            [
                'municipality_name' =>  'Chhinnamasta Gaunpalika',
                'district_id' =>  22,
            ],




            [
                'municipality_name' =>  'Kathmandu Metropolitian City',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Kageshwori Manohara Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Kirtipur Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Gokarneshwor Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Chandragiri Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Tokha Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Tarakeshwar Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Dakshinkali Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Nagarjun Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Budhanilkantha Municipality',
                'district_id' =>  23,
            ],
            [
                'municipality_name' =>  'Shankharapur Municipality',
                'district_id' =>  23,
            ],




            [
                'municipality_name' =>  'Lalitpur Metropolitian City',
                'district_id' =>  24,
            ],
            [
                'municipality_name' =>  'Mahalaxmi Municipality',
                'district_id' =>  24,
            ],
            [
                'municipality_name' =>  'Godawari Municipality',
                'district_id' =>  24,
            ],
            [
                'municipality_name' =>  'Konjyosom Gaunpalika',
                'district_id' =>  24,
            ],
            [
                'municipality_name' =>  'Mahankal Gaunpalika',
                'district_id' =>  24,
            ],
            [
                'municipality_name' =>  'Bagmati Gaunpalika',
                'district_id' =>  24,
            ],



            [
                'municipality_name' =>  'Bhaktapur Municipality',
                'district_id' =>  25,
            ],
            [
                'municipality_name' =>  'Changunarayan Municipality',
                'district_id' =>  25,
            ],
            [
                'municipality_name' =>  'Madhyapur Thimi Municipality',
                'district_id' =>  25,
            ],
            [
                'municipality_name' =>  'Suryabinayak Municipality',
                'district_id' =>  25,
            ],




            [
                'municipality_name' =>  'Chauri Deurali Gaunpalika',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Bhumlu Gaunpalika',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Mandan Deupur Municipality',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Banepa Municipality',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Dhulikhel Municipality',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Panchkhal Municipality',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Temal Gaunpalika',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Namobuddha Municipality',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Panauti Municipality',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Bethanchowk Gaunpalika',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Roshi Gaunpalika',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Mahabharat Gaunpalika',
                'district_id' =>  26,
            ],
            [
                'municipality_name' =>  'Khanikhola Gaunpalika',
                'district_id' =>  26,
            ],
        
        



            [
                'municipality_name' =>  'Bhotekoshi Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Jugal Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Panchpokhari Thangpal Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Helambu Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Melanchi Municipality',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Indrawoti Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Choutara Sangachowkgadhi Municipality',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Balephi Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Bahrabise Municipality',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Tripurasundari Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Lisankhu Pakhar Gaunpalika',
                'district_id' =>  27,
            ],
            [
                'municipality_name' =>  'Sunkoshi Gaunpalika',
                'district_id' =>  27,
            ],




            [
                'municipality_name' =>  'Bhimeshwor Municipality',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Gaurishankar Gaunpalika',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Bigul Gaunpalika',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Kalinchowk Gaunpalika',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Jiri Municipality',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Baiteshwor Gaunpalika',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Tamakoshi Gaunpalika',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Melung Gaunpalika',
                'district_id' =>  28,
            ],
            [
                'municipality_name' =>  'Shailung Gaunpalika',
                'district_id' =>  28,
            ],

            

          
            [
                'municipality_name' =>  'Dhunibenshi Municipality',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Rubi Valley Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Khaniyabas Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Ganga Jamuna Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Nilkhantha Municipality',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Tripurasundari Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Netrawati Dabjong Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Jwalamukhi Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Siddhalek Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Benighat Rorang Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Gajuri Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Galchhi Gaunpalika',
                'district_id' =>  29,
            ],
            [
                'municipality_name' =>  'Thakre Gaunpalika',
                'district_id' =>  29,
            ],




            [
                'municipality_name' =>  'Bidur Municipality',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Dupcheshwor Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Tadi Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Suryagadhi Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Belkotgadhi Municipality',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Kispang Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Myagang Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Tarakeshwor Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Likhu Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Panchakanya Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Shivapuri Gaunpalika',
                'district_id' =>  30,
            ],
            [
                'municipality_name' =>  'Kakani Gaunpalika',
                'district_id' =>  30,
            ],
        



            [
                'municipality_name' =>  'Hetauda Sub-Metropolitian City',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Thaha Municipality',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Indrasarowar Gaunpalika',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Kailash Gaunpalika',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Raksirang Gaunpalika',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Manahari Gaunpalika',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Bhimphedi Gaunpalika',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Makawanpurgadhi Gaunpalika',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Bakaiya Gaunpalika',
                'district_id' =>  31,
            ],
            [
                'municipality_name' =>  'Bagmati Gaunpalika',
                'district_id' =>  31,
            ],




            [
                'municipality_name' =>  'Gosaikunda Gaunpalika',
                'district_id' =>  32,
            ],
            [
                'municipality_name' =>  'Aamachhodingmo Gaunpalika',
                'district_id' =>  32,
            ],
            [
                'municipality_name' =>  'Uttargaya Gaunpalika',
                'district_id' =>  32,
            ],
            [
                'municipality_name' =>  'Kalika Gaunpalika',
                'district_id' =>  32,
            ],
            [
                'municipality_name' =>  'Naukunda Gaunpalika',
                'district_id' =>  32,
            ],




            [
                'municipality_name' =>  'Ramechhap Municipality',
                'district_id' =>  33,
            ],
            [
                'municipality_name' =>  'Manthali Municipality',
                'district_id' =>  33,
            ],
            [
                'municipality_name' =>  'Umakunda Gaunpalika',
                'district_id' =>  33,
            ],
            [
                'municipality_name' =>  'Gokulganga Gaunpalika',
                'district_id' =>  33,
            ],
            [
                'municipality_name' =>  'Likhu Tamakoshi Gaunpalika',
                'district_id' =>  33,
            ],
            [
                'municipality_name' =>  'Khandadevi Gaunpalika',
                'district_id' =>  33,
            ],
            [
                'municipality_name' =>  'Doramba Gaunpalika',
                'district_id' =>  33,
            ],
            [
                'municipality_name' =>  'Sunapati Gaunpalika',
                'district_id' =>  33,
            ],
       
     
     

            [
                'municipality_name' =>  'Bharatpur Metropolitian City',
                'district_id' =>  34,
            ],
            [
                'municipality_name' =>  'Rapti Municipality',
                'district_id' =>  34,
            ],
            [
                'municipality_name' =>  'Kalika Municipality',
                'district_id' =>  34,
            ],
            [
                'municipality_name' =>  'Ichchha Kamana Gaunpalika',
                'district_id' =>  34,
            ],
            [
                'municipality_name' =>  'Ratnanagar Municipality',
                'district_id' =>  34,
            ],
            [
                'municipality_name' =>  'Khairahani Municipality',
                'district_id' =>  34,
            ],
            [
                'municipality_name' =>  'Madi Municipality',
                'district_id' =>  34,
            ],




            
            [
                'municipality_name' =>  'Dudhouli Municipality',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Kamalamai Municipality',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Phikkal Gaunpalika',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Tinpatan Gaunpalika',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Golanjor Gaunpalika',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Sunkoshi Gaunpalika',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Ghyanglekha Gaunpalika',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Marin Gaunpalika',
                'district_id' =>  35,
            ],
            [
                'municipality_name' =>  'Hariharpurgaghi Gaunpalika',
                'district_id' =>  35,
            ],
      
      


            [
                'municipality_name' =>  'Pokhara Metropolitian City',
                'district_id' =>  36,
            ],
            [
                'municipality_name' =>  'Madi Gaunpalika',
                'district_id' =>  36,
            ],
            [
                'municipality_name' =>  'Machhapuchchhre Gaunpalika',
                'district_id' =>  36,
            ],
            [
                'municipality_name' =>  'Annapurna Gaunpalika',
                'district_id' =>  36,
            ],
            [
                'municipality_name' =>  'Rupa Gaunpalika',
                'district_id' =>  36,
            ],




            [
                'municipality_name' =>  'Gorkha Municipality',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Chumanubri Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Ajirkot Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Barpak Sulikot Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Dharche Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Aarughat Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Bhimsenthapa Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Siranchowk Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Palungtar Municipality',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Shahid Lakhan Gaunpalika',
                'district_id' =>  37,
            ],
            [
                'municipality_name' =>  'Gandaki Gaunpalika',
                'district_id' =>  37,
            ],
     
    



            [
                'municipality_name' =>  'Gaidakot Municipality',
                'district_id' =>  38,
            ],
            [
                'municipality_name' =>  'Bulingtar Gaunpalika',
                'district_id' =>  38,
            ],
            [
                'municipality_name' =>  'Baudikali Gaunpalika',
                'district_id' =>  38,
            ],
            [
                'municipality_name' =>  'Hupsekot Gaunpalika',
                'district_id' =>  38,
            ],
            [
                'municipality_name' =>  'Devchuli Municipality',
                'district_id' =>  38,
            ],
            [
                'municipality_name' =>  'Kawasoti Municipality',
                'district_id' =>  38,
            ],
            [
                'municipality_name' =>  'Madhya Bindu Municipality',
                'district_id' =>  38,
            ],
            [
                'municipality_name' =>  'Binayi Tribeni Gaunpalika',
                'district_id' =>  38,
            ],




            [
                'municipality_name' =>  'Modi Gaunpalika',
                'district_id' =>  39,
            ],
            [
                'municipality_name' =>  'Jaljala Gaunpalika',
                'district_id' =>  39,
            ],
            [
                'municipality_name' =>  'Kushma Municipality',
                'district_id' =>  39,
            ],
            [
                'municipality_name' =>  'Phalebas Municipality',
                'district_id' =>  39,
            ],
            [
                'municipality_name' =>  'Mahashila Gaunpalika',
                'district_id' =>  39,
            ],
            [
                'municipality_name' =>  'Bihadi Gaunpalika',
                'district_id' =>  39,
            ],
            [
                'municipality_name' =>  'Paiyu Gaunpalika',
                'district_id' =>  39,
            ],

       


 
            [
                'municipality_name' =>  'Bhanu Municipality',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Byas Municipality',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Myagde Gaunpalika',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Shuklagandaki Municipality',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Bhimad Municipality',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Ghiring Gaunpalika',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Rhishing Gaunpalika',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Devghat Gaunpalika',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Bandipur Gaunpalika',
                'district_id' =>  40,
            ],
            [
                'municipality_name' =>  'Aanbu Khaireni Gaunpalika',
                'district_id' =>  40,
            ],
        




            [
                'municipality_name' =>  'Baglung Municipality',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Kathekhola Gaunpalika',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Tarakhola Gaunpalika',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Tamankhola Gaunpalika',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Dhorpatan Municipality',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Nisikhola Gaunpalika',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Badigad Gaunpalika',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Galkot Municipality',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Bareng Gaunpalika',
                'district_id' =>  41,
            ],
            [
                'municipality_name' =>  'Jaimuni Municipality',
                'district_id' =>  41,
            ],
    
        


            [
                'municipality_name' =>  'Beni Municipality',
                'district_id' =>  42,
            ],
            [
                'municipality_name' =>  'Annapurna Gaunpalika',
                'district_id' =>  42,
            ],
            [
                'municipality_name' =>  'Raghuganga Gaunpalika',
                'district_id' =>  42,
            ],
            [
                'municipality_name' =>  'Dhawalagiri Gaunpalika',
                'district_id' =>  42,
            ],
            [
                'municipality_name' =>  'Malika Gaunpalika',
                'district_id' =>  42,
            ],
            [
                'municipality_name' =>  'Mangala Gaunpalika',
                'district_id' =>  42,
            ],




            [
                'municipality_name' =>  'Besisahar Municipality',
                'district_id' =>  43,
            ],
            [
                'municipality_name' =>  'Dordi Gaunpalika',
                'district_id' =>  43,
            ],
            [
                'municipality_name' =>  'Marshyangdi Gaunpalika',
                'district_id' =>  43,
            ],
            [
                'municipality_name' =>  'Kwhola Sothar Gaunpalika',
                'district_id' =>  43,
            ],
            [
                'municipality_name' =>  'Madhya Nepal Municipality',
                'district_id' =>  43,
            ],
            [
                'municipality_name' =>  'Sundarbazar Municipality',
                'district_id' =>  43,
            ],
            [
                'municipality_name' =>  'Rainas Municipality',
                'district_id' =>  43,
            ],
            [
                'municipality_name' =>  'Dudhapokhari Gaunpalika',
                'district_id' =>  43,
            ],




            [
                'municipality_name' =>  'Putalibazar Municipality',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Phedikhola Gaunpalika',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Aandhikhola Gaunpalika',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Arjun Choupari Gaunpalika',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Bhirkot Municipality',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Biruwa Gaunpalika',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Harinas Gaunpalika',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Chapakot Municipality',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Walling Municipality',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Galyang Municipality',
                'district_id' =>  44,
            ],
            [
                'municipality_name' =>  'Kaligandaki Gaunpalika',
                'district_id' =>  44,
            ],




    
            [
                'municipality_name' =>  'Narpa Bhumi Gaunpalika',
                'district_id' =>  45,
            ],
            [
                'municipality_name' =>  'Manang Ngisyang Gaunpalika',
                'district_id' =>  45,
            ],
            [
                'municipality_name' =>  'Chame Gaunpalika',
                'district_id' =>  45,
            ],
            [
                'municipality_name' =>  'Nason Gaunpalika',
                'district_id' =>  45,
            ],



            [
                'municipality_name' =>  'Lo Ghekar Damodarkunda Gaunpalika',
                'district_id' =>  46,
            ],
            [
                'municipality_name' =>  'Gharpajhong Gaunpalika',
                'district_id' =>  46,
            ],
            [
                'municipality_name' =>  'Varagung Muktichhetra Gaunpalika',
                'district_id' =>  46,
            ],
            [
                'municipality_name' =>  'Lomanthang Gaunpalika',
                'district_id' =>  46,
            ],
            [
                'municipality_name' =>  'Thasang Gaunpalika',
                'district_id' =>  46,
            ],



            [
                'municipality_name' =>  'Bardaghat Municipality',
                'district_id' =>  47,
            ],
            [
                'municipality_name' =>  'Sunawal Municipality',
                'district_id' =>  47,
            ],
            [
                'municipality_name' =>  'Ramgram Municipality',
                'district_id' =>  47,
            ],
            [
                'municipality_name' =>  'Palhinandan Gaunpalika',
                'district_id' =>  47,
            ],
            [
                'municipality_name' =>  'Sarawal Gaunpalika',
                'district_id' =>  47,
            ],
            [
                'municipality_name' =>  'Pratapapur Gaunpalika',
                'district_id' =>  47,
            ],
            [
                'municipality_name' =>  'Susta Gaunpalika',
                'district_id' =>  47,
            ],
            



            [
                'municipality_name' =>  'Ghorahi Sub-Metropolitan City',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Tulsipur Sub-Metropolitan City',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Bangalachuli Gaunpalika',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Shantinagar Gaunpalika',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Babai Gaunpalika',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Dangisharan Gaunpalika',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Lamahi Municipality',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Rapti Gaunpalika',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Gadhawa Gaunpalika',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Rajpur Gaunpalika',
                'district_id' =>  48,
            ],




            [
                'municipality_name' =>  'Musikot Municipality',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Kali Gandaki Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Satyawoti Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Chandrakot Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Isma Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Malika Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Madane Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Dhurkot Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Resunga Municipality',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Gulmi Durbar Gaunpalika',
                'district_id' =>  48,
            ],
            [
                'municipality_name' =>  'Chhatrakot Gaunpalika',
                'district_id' =>  49,
            ],
            [
                'municipality_name' =>  'Ruruchhetra Gaunpalika',
                'district_id' =>  49,
            ],
     

            
    
            [
                'municipality_name' =>  'Banganga Municipality',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Buddhabhumi Municipality',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Shivaraj Municipality',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Bijayanagar Gaunpalika',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Krishnanagar Municipality',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Maharajganj Municipality',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Kapilbastu Municipality',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Yasodhara Gaunpalika',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Mayadevi Gaunpalika',
                'district_id' =>  50,
            ],
            [
                'municipality_name' =>  'Shuddhodhan Gaunpalika',
                'district_id' =>  50,
            ],
    



            [
                'municipality_name' =>  'Bhumikasthan Municipality',
                'district_id' =>  51,
            ],
            [
                'municipality_name' =>  'Chhatradev Gaunpalika',
                'district_id' =>  51,
            ],
            [
                'municipality_name' =>  'Malarani Gaunpalika',
                'district_id' =>  51,
            ],
            [
                'municipality_name' =>  'Sandhikharka Municipality',
                'district_id' =>  51,
            ],
            [
                'municipality_name' =>  'Panini Gaunpalika',
                'district_id' =>  51,
            ],
            [
                'municipality_name' =>  'Shitaganga Municipality',
                'district_id' =>  51,
            ],




            
            [
                'municipality_name' =>  'Rampur Municipality',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Purbakhola Gaunpalika',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Rambha Gaunpalika',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Baganaskali Gaunpalika',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Tansen Municipality',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Ribdikot Gaunpalika',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Rainadevi Chhahara Gaunpalika',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Tinau Gaunpalika',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Mathagadhi Gaunpalika',
                'district_id' =>  52,
            ],
            [
                'municipality_name' =>  'Nisdi Gaunpalika',
                'district_id' =>  52,
            ],
         
         

           
            [
                'municipality_name' =>  'Putha Uttanganga Gaunpalika',
                'district_id' =>  53,
            ],
            [
                'municipality_name' =>  'Sisne Gaunpalika',
                'district_id' =>  53,
            ],
            [
                'municipality_name' =>  'Bhoome Gaunpalika',
                'district_id' =>  53,
            ],




            [
                'municipality_name' =>  'Gaumukhi Gaunpalika',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Naubahini Gaunpalika',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Jhimaruk Gaunpalika',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Pyuthan Municipality',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Sworgadwari Municipality',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Mandavi Gaunpalika',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Mallarani Gaunpalika',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Aairawati Gaunpalika',
                'district_id' =>  54,
            ],
            [
                'municipality_name' =>  'Sarumarani Gaunpalika',
                'district_id' =>  54,
            ],





            [
                'municipality_name' =>  'Nepalganj Sub-Metropolitan City',
                'district_id' =>  55,
            ],
            [
                'municipality_name' =>  'Rapti Sonari Gaunpalika',
                'district_id' =>  55,
            ],
            [
                'municipality_name' =>  'Kohalpur Municipality',
                'district_id' =>  55,
            ],
            [
                'municipality_name' =>  'Baijanath Gaunpalika',
                'district_id' =>  55,
            ],
            [
                'municipality_name' =>  'Khajura Gaunpalika',
                'district_id' =>  55,
            ],
            [
                'municipality_name' =>  'Janaki Gaunpalika',
                'district_id' =>  55,
            ],
            [
                'municipality_name' =>  'Duduwa Gaunpalika',
                'district_id' =>  55,
            ],
            [
                'municipality_name' =>  'Narainapur Gaunpalika',
                'district_id' =>  55,
            ],





            [
                'municipality_name' =>  'Bansgadhi Municipality',
                'district_id' =>  56,
            ],
            [
                'municipality_name' =>  'Barbardiya Municipality',
                'district_id' =>  56,
            ],
            [
                'municipality_name' =>  'Thakurbaba Municipality',
                'district_id' =>  56,
            ],
            [
                'municipality_name' =>  'Geruwa Gaunpalika',
                'district_id' =>  56,
            ],
            [
                'municipality_name' =>  'Rajapur Municipality',
                'district_id' =>  56,
            ],
            [
                'municipality_name' =>  'Madhuwan Municipality',
                'district_id' =>  56,
            ],
            [
                'municipality_name' =>  'Gulariya Municipality',
                'district_id' =>  56,
            ],
            [
                'municipality_name' =>  'Baijanath Gaunpalika',
                'district_id' =>  55,
            ],




            
            [
                'municipality_name' =>  'Butwal Sub-Metropolitian City',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Devdaha Municipality',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Sainamaina Municipality',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Kanchan Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Gaidahawa Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Suddhodhan Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Siyari Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Tilottama Municipality',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Om Satiya Gaunpalika',
                'district_id' =>  57,
            ],           
            [
                'municipality_name' =>  'Rohini Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Siddharthanagar Municipality',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Mayadevi Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Lumbini Sanskritik Municipality',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Kotahimai Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Sammarimai Gaunpalika',
                'district_id' =>  57,
            ],
            [
                'municipality_name' =>  'Marchawari Gaunpalika',
                'district_id' =>  57,
            ],




            [
                'municipality_name' =>  'Sunchhahari Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Thawang Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Pariwartan Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Gangadev Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Madi Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Tribeni Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Rolpa Municipality',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Runtigadhi Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Sunil Smriti Gaunpalika',
                'district_id' =>  58,
            ],
            [
                'municipality_name' =>  'Lungri Gaunpalika',
                'district_id' =>  58,
            ],




            [
                'municipality_name' =>  'Aathabisakot Municipality',
                'district_id' =>  59,
            ],
            [
                'municipality_name' =>  'Sanibheri Gaunpalika',
                'district_id' =>  59,
            ],
            [
                'municipality_name' =>  'Banphikot Gaunpalika',
                'district_id' =>  59,
            ],
            [
                'municipality_name' =>  'Musikot Municipality',
                'district_id' =>  59,
            ],
            [
                'municipality_name' =>  'Tribeni Gaunpalika',
                'district_id' =>  59,
            ],
            [
                'municipality_name' =>  'Chaurjahari Municipality',
                'district_id' =>  59,
            ],




            [
                'municipality_name' =>  'Chhayanath Rara Municipality',
                'district_id' =>  60,
            ],
            [
                'municipality_name' =>  'Mugumakarmarog Gaunpalika',
                'district_id' =>  60,
            ],
            [
                'municipality_name' =>  'Soru Gaunpalika',
                'district_id' =>  60,
            ],
            [
                'municipality_name' =>  'Khatyad Gaunpalika',
                'district_id' =>  60,
            ],




            [
                'municipality_name' =>  'Aathbis Municipality',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Naumule Gaunpalika',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Mahabu Gaunpalika',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Bhairabi Gaunpalika',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Thantikandh Gaunpalika',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Chamunda Bindrasaini Municipality',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Dullu Municipality',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Narayan Municipality',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Bhagawatimai Gaunpalika',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Dungeshwor Gaunpalika',
                'district_id' =>  61,
            ],
            [
                'municipality_name' =>  'Gurans Gaunpalika',
                'district_id' =>  61,
            ],





            [
                'municipality_name' =>  'Tripurasundari Municipality',
                'district_id' =>  62,
            ],
            [
                'municipality_name' =>  'Dolpo Buddha Gaunpalika',
                'district_id' =>  62,
            ],
            [
                'municipality_name' =>  'Shey Phoksundo Gaunpalika',
                'district_id' =>  62,
            ],
            [
                'municipality_name' =>  'Jagadulla Gaunpalika',
                'district_id' =>  62,
            ],
            [
                'municipality_name' =>  'Mudkechula Gaunpalika',
                'district_id' =>  62,
            ],
            [
                'municipality_name' =>  'Thulibheri Municipality',
                'district_id' =>  62,
            ],
            [
                'municipality_name' =>  'Kaike Gaunpalika',
                'district_id' =>  62,
            ],
            [
                'municipality_name' =>  'Chharka Tangsong Gaunpalika',
                'district_id' =>  62,
            ],

            [
                'municipality_name' =>  'Chandannath Municipality',
                'district_id' =>  63,
            ],
            [
                'municipality_name' =>  'Patarasi Gaunpalika',
                'district_id' =>  63,
            ],
            [
                'municipality_name' =>  'Kanaka Sundari Gaunpalika',
                'district_id' =>  63,
            ],
            [
                'municipality_name' =>  'Sinja Gaunpalika',
                'district_id' =>  63,
            ],
            [
                'municipality_name' =>  'Guthichaur Gaunpalika',
                'district_id' =>  63,
            ],
            [
                'municipality_name' =>  'Tatopani Gaunpalika',
                'district_id' =>  63,
            ],
            [
                'municipality_name' =>  'Tila Gaunpalika',
                'district_id' =>  63,
            ],
            [
                'municipality_name' =>  'Hima Gaunpalika',
                'district_id' =>  63,
            ],


            [
                'municipality_name' =>  'Chhedagad Municipality',
                'district_id' =>  64,
            ],
            [
                'municipality_name' =>  'Barekot Gaunpalika',
                'district_id' =>  64,
            ],
            [
                'municipality_name' =>  'Kuse Gaunpalika',
                'district_id' =>  64,
            ],
            [
                'municipality_name' =>  'Junichande Gaunpalika',
                'district_id' =>  64,
            ],
            [
                'municipality_name' =>  'Shivalaya Gaunpalika',
                'district_id' =>  64,
            ],
            [
                'municipality_name' =>  'Bheri Malika Municipality',
                'district_id' =>  64,
            ],
            [
                'municipality_name' =>  'Nalgad Municipality',
                'district_id' =>  64,
            ],
          



            [
                'municipality_name' =>  'Raskot Municipality',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Palata Gaunpalika',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Pachal Jharana Gaunpalika',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Sanni Tribeni Gaunpalika',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Naraharinath Gaunpalika',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Khandachakra Municipality',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Tilagupha Municipality',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Mahawai Gaunpalika',
                'district_id' =>  65,
            ],
            [
                'municipality_name' =>  'Shuva Kalika Gaunpalika',
                'district_id' =>  65,
            ],
       




            [
                'municipality_name' =>  'Banagad Kupinde Municipality',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Darma Gaunpalika',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Kumakh Gaunpalika',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Siddha Kumakh Gaunpalika',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Bagachour Municipality',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Chhatreshwori Gaunpalika',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Sharada Municipality',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Kalimati Gaunpalika',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Tribeni Gaunpalika',
                'district_id' =>  66,
            ],
            [
                'municipality_name' =>  'Kapurkot Gaunpalika',
                'district_id' =>  66,
            ],




            [
                'municipality_name' =>  'Birendranagar Municipality',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Simta Gaunpalika',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Chingad Gaunpalika',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Lekabeshi Municipality',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Gurbhakot Municipality',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Bheriganga Municipality',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Barahatal Gaunpalika',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Panchapuri Municipality',
                'district_id' =>  67,
            ],
            [
                'municipality_name' =>  'Chaukune Gaunpalika',
                'district_id' =>  67,
            ],
       




   
            [
                'municipality_name' =>  'Chankheli Gaunpalika',
                'district_id' =>  68,
            ],
            [
                'municipality_name' =>  'Kharpunath Gaunpalika',
                'district_id' =>  68,
            ],
            [
                'municipality_name' =>  'Simkot Gaunpalika',
                'district_id' =>  68,
            ],
            [
                'municipality_name' =>  'Namkha Gaunpalika',
                'district_id' =>  68,
            ],
            [
                'municipality_name' =>  'Sarkegad Gaunpalika',
                'district_id' =>  68,
            ],
            [
                'municipality_name' =>  'Adanchuli Gaunpalika',
                'district_id' =>  68,
            ],
            [
                'municipality_name' =>  'Tanjakot Gaunpalika',
                'district_id' =>  68,
            ],




            [
                'municipality_name' =>  'Dhangadhi Sub-Metropolitian City',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Mohanyal Gaunpalika',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Chure Gaunpalika',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Godawari Municipality',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Gauriganga Municipality',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Ghodaghodi Municipality',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Bardagoriya Gaunpalika',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Lamki Chuha Municipality',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Janaki Gaunpalika',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Joshipur Gaunpalika',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Tikapur Municipality',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Bhajani Municipality',
                'district_id' =>  69,
            ],
            [
                'municipality_name' =>  'Kailari Gaunpalika',
                'district_id' =>  69,
            ],




            [
                'municipality_name' =>  'Krishnapur Municipality',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Shuklaphanta Municipality',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Bedkot Municipality',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Bhimdatta Municipality',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Dodhara Chandani Municipality',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Laljhadi Gaunpalika',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Punarbas Municipality',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Belouri Municipality',
                'district_id' =>  70,
            ],
            [
                'municipality_name' =>  'Beldandi Gaunpalika',
                'district_id' =>  70,
            ],





            [
                'municipality_name' =>  'Panchdebal Binayak Municipality',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Ramaroshan Gaunpalika',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Mellekh Gaunpalika',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Sanphebagar Municipality',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Chaurpati Gaunpalika',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Mangalsen Municipality',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Bannigadhi Jayagadh Gaunpalika',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Kamal bazar Municipality',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Dhakari Gaunpalika',
                'district_id' =>  71,
            ],
            [
                'municipality_name' =>  'Turmakhand Gaunpalika',
                'district_id' =>  71,
            ],
    




            [
                'municipality_name' =>  'Parashuram Municipality',
                'district_id' =>  72,
            ],
            [
                'municipality_name' =>  'Nawadurga Gaunpalika',
                'district_id' =>  72,
            ],
            [
                'municipality_name' =>  'Amargadhi Municipality',
                'district_id' =>  72,
            ],
            [
                'municipality_name' =>  'Ajayameru Gaunpalika',
                'district_id' =>  72,
            ],
            [
                'municipality_name' =>  'Bhageshwor Gaunpalika',
                'district_id' =>  72,
            ],
            [
                'municipality_name' =>  'Aalital Gaunpalika',
                'district_id' =>  72,
            ],
            [
                'municipality_name' =>  'Ganyapdhura Gaunpalika',
                'district_id' =>  72,
            ],






            [
                'municipality_name' =>  'Shikhar Municipality',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'Purbichouki Gaunpalika',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'Sayal Gaunpalika',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'Aadarsha Gaunpalika',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'Dipayal Silgadhi Municipality',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'K.I. Singh Gaunpalika',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'Bogatan Phudsil Gaunpalika',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'Badi Kedar Gaunpalika',
                'district_id' =>  73,
            ],
            [
                'municipality_name' =>  'Jorayal Gaunpalika',
                'district_id' =>  73,
            ],





            [
                'municipality_name' =>  'Shailyashikhar Municipality',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Byas Gaunpalika',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Duhun Gaunpalika',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Mahakali Municipality',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Naugad Gaunpalika',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Apihimal Gaunpalika',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Marma Gaunpalika',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Malikarjun Gaunpalika',
                'district_id' =>  74,
            ],
            [
                'municipality_name' =>  'Lekam Gaunpalika',
                'district_id' =>  74,
            ],
      
      

        
            [
                'municipality_name' =>  'Bungal Municipality',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Saipal Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Surma Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Talkot Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Masta Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Jayaprithbi Municipality',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Chhabis Pathibhara Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Durgathali Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Kedarsyun Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Bitthadchir Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Thalara Gaunpalika',
                'district_id' =>  75,
            ],
            [
                'municipality_name' =>  'Khaptad Chhanna Gaunpalika',
                'district_id' =>  75,
            ],
      
      



            [
                'municipality_name' =>  'Badimalika Municipality',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Himali Gaunpalika',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Gaumul Gaunpalika',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Budhinanda Municipality',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Swamikartik Khapar Gaunpalika',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Jagannath Gaunpalika',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Khaptad Chhededaha Gaunpalika',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Budhiganga Municipality',
                'district_id' =>  76,
            ],
            [
                'municipality_name' =>  'Tribeni Municipality',
                'district_id' =>  76,
            ],




            [
                'municipality_name' =>  'Patan Municipality',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Dilasaini Gaunpalika',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Dogada Kedar Gaunpalika',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Puchaundi Municipality',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Surnaya Gaunpalika',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Dasharathchand Municipality',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Pancheshwor Gaunpalika',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Shivanath Gaunpalika',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Melauli Municipality',
                'district_id' =>  77,
            ],
            [
                'municipality_name' =>  'Sigas Gaunpalika',
                'district_id' =>  77,
            ],
 


        ];

            DB::table('municipalities')->insert($municipalities);
    }
}
