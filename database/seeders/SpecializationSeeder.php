<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialization::insert([
            [
                'name' => 'Сантехник',
                'catalog_name' => 'Услуги сантехника',
                'catalog_caption_list' => 'Услуги по сантехнике',
                'code' => Specialization::PLUMBER,
                'active' => true,
                'sort' => 1
            ],
            [
                'name' => 'Электрик',
                'catalog_name' => 'Услуги электрика',
                'catalog_caption_list' => 'Услуги по электрике',
                'code' => 'electrician',
                'active' => true,
                'sort' => 2
            ],
            [
                'name' => 'Плотник',
                'catalog_name' => 'Услуги плотника',
                'catalog_caption_list' => 'Услуги по плотницкому делу',
                'code' => 'carpenter',
                'active' => false,
                'sort' => 3
            ]
        ]);
    }
}
