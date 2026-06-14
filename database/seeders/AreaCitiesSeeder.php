<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\AreaCity;
use App\Models\City;
use Illuminate\Database\Seeder;

class AreaCitiesSeeder extends Seeder
{
    const INSERT_DATA = [
        'ulyanovsk' => [
            'leninksy',
            'railway',
            'zasviajie',
            'zavoljie'
        ],
        'abakan' => [
            'center',
            'micro4',
            'mps',
            'south_west',
            'south',
            'red_abakan',
            'kosmos'
        ],
        'angarsk' => [
            'old_city',
            'sovremennik',
            'baikalsk',
            'stroitel',
            'south_east'
        ],
        'arzamas' => [
            '2',
            '408',
            'arzamas-1',
            'arzamas-2',
            'high_mountain',
            'dubki',
            'zhiguli',
            'zarechnyj',
            'ivanovskyj',
            'kirillovskyj',
            'forest',
            'pms-73',
            'selhoz',
            'pine',
            'sport'
        ],
        'balakovo' => [
            'island',
            'zakanal',
            'new',
            'raduj',
            '21'
        ],
        'dimitrovgrad' => [
            'social_city',
            'first_may',
            'himmash',
            'old_city'
        ],
        'murom' => [
            'afrika',
            'verb',
            'kazanka',
            'karachorovo',
            'nejilovka',
            'new_sloboda',
            'old_south',
            'arrow',
            'faner',
            'center_murom',
            'center_village',
            'shtap',
            'anniversary',
            'south_murom',
            'stroydetal',
            'sobachevka'
        ],
        'zlatoust' => [
            'seven_section',
            'gorbuha',
            'west',
            'red_hill',
            'matrosov_quarter',
            'mashzavod',
            'nahalovka'
        ],
        'nizhnevartovsk' => [
            'nizhnevartovsk_2',
            'nizhnevartovsk_8a',
            'nizhnevartovsk_5',
            'nizhnevartovsk_9a',
            'nizhnevartovsk_7'
        ],
        'pskov' => [
            'center',
            'zapskovye',
            'zavelichye',
            'zavokzalye'
        ],
        'novocherkassk' => [
            'galinka',
            'donskoy',
            'novoselovka',
            'center',
            'kosmos',
            'field_miracle',
            'cherrytree'
        ],
        'kerch' => [
            'kirov',
            'ordzhonikidze',
            'leninksy'
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all()->pluck('id', 'code');
        $areas = Area::all()->pluck('id', 'code');

        $insertData = [];
        foreach (self::INSERT_DATA as $cityCode => $areaItems) {
            $cityId = $cities[$cityCode];
            foreach ($areaItems as $areaCode) {
                $insertData[] = [
                    'city_id' => $cityId,
                    'area_id' => $areas[$areaCode],
                ];
            }

        }
        AreaCity::insert($insertData);
    }
}
