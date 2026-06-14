<?php

namespace Database\Seeders;

use App\Models\MasterSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterSource::insert([
            [
                'name' => 'Яндекс',
                'code' => 'yandex',
            ],
            [
                'name' => 'Авито',
                'code' => 'avito',
            ],
            [
                'name' => 'Профи',
                'code' => 'profi',
            ]
        ]);
    }
}
