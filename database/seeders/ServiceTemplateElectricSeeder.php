<?php

namespace Database\Seeders;

use App\Models\ServiceTemplate;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTemplateElectricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializationId = Specialization::whereCode(Specialization::ELECTRICIAN)->get()->first()->id;
        $parentId = null;

        // основные направления по сантехнике
        ServiceTemplate::insert([
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Услуги электрика в {:prepositional}',
                'catalog_name' => 'Услуги электрика',
                'code' => str_slug('Услуги электрика'),
                'h1' => 'Услуги электрика в {:prepositional}',
                'title' => 'Услуги Электрика в {:prepositional}',
                'description' => 'Услуги электрика в {:prepositional} - Доступные цены! Приезд электрика через 45
                                  минут после обращения. Звоните и узнайте стоимость',
                'keywords' => 'услуги электрика, электрик на дом, вызов электрика, электрик, профессиональные
                               электрики, {:name}',
                'default_template' => 'templates.services.electrician.electrician_services',
                'main_service' => true,
                'on_city_list' => false,
                'section' => false,
                'default_price' => '700',
                'sort' => 1
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка электрики в {:prepositional}',
                'catalog_name' => 'Установка электрики',
                'code' => str_slug('Установка электрики'),
                'h1' => 'Установка электрики в {:prepositional}',
                'title' => 'Установка электрики в {:prepositional}',
                'description' => 'Установка электрики в {:prepositional}',
                'keywords' => 'электрика, установка, {:name}',
                'default_template' => 'templates.services.electrician.ustanovka_electrici',
                'main_service' => false,
                'on_city_list' => true,
                'section' => true,
                'default_price' => '700',
                'sort' => 2
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Электротехнические работы в {:prepositional}',
                'catalog_name' => 'Электротехнические работы',
                'code' => str_slug('Электротехнические работы'),
                'h1' => 'Электротехнические работы в {:prepositional}',
                'title' => 'Электротехнические работы в {:prepositional}',
                'description' => 'Электротехнические работы в {:prepositional}',
                'keywords' => 'Электротехнические работы, {:name}',
                'default_template' => 'templates.services.electrician.zamena_electrici',
                'main_service' => false,
                'on_city_list' => true,
                'section' => true,
                'default_price' => '700',
                'sort' => 3
            ],
        ]);

        $parentId = ServiceTemplate::whereCode(str_slug('Установка электрики'))->get()->first()->id;

        ServiceTemplate::insert([
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка выключателей в {:prepositional}',
                'catalog_name' => 'Установка выключателей',
                'code' => str_slug('Установка выключателей'),
                'h1' => 'Установка выключателей в {:prepositional}',
                'title' => 'Установка выключателей в {:prepositional}',
                'description' => 'Установка выключателей в {:prepositional}',
                'keywords' => 'электрика, установка, выключатели, {:name}',
                'default_template' => 'templates.services.electrician.installation.1-switches_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 4
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка розеток в {:prepositional}',
                'catalog_name' => 'Установка розеток',
                'code' => str_slug('Установка розеток'),
                'h1' => 'Установка розеток в {:prepositional}',
                'title' => 'Установка розеток в {:prepositional}',
                'description' => 'Установка розеток в {:prepositional}',
                'keywords' => 'электрика, установка, розетка, {:name}',
                'default_template' => 'templates.services.electrician.installation.2-sockets_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 5
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка люстры в {:prepositional}',
                'catalog_name' => 'Установка люстры',
                'code' => str_slug('Установка люстры'),
                'h1' => 'Установка люстры в {:prepositional}',
                'title' => 'Установка люстры в {:prepositional}',
                'description' => 'Установка люстры в {:prepositional}',
                'keywords' => 'электрика, установка, люстра, {:name}',
                'default_template' => 'templates.services.electrician.installation.3-chandelier_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 6
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка светильников в {:prepositional}',
                'catalog_name' => 'Установка светильников',
                'code' => str_slug('Установка светильников'),
                'h1' => 'Установка светильников в {:prepositional}',
                'title' => 'Установка светильников в {:prepositional}',
                'description' => 'Установка светильников в {:prepositional}',
                'keywords' => 'электрика, установка, светильник, {:name}',
                'default_template' => 'templates.services.electrician.installation.4-lamps_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 7
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка бра в {:prepositional}',
                'catalog_name' => 'Установка бра',
                'code' => str_slug('Установка бра'),
                'h1' => 'Установка бра в {:prepositional}',
                'title' => 'Установка бра в {:prepositional}',
                'description' => 'Установка бра в {:prepositional}',
                'keywords' => 'электрика, установка, бра, {:name}',
                'default_template' => 'templates.services.electrician.installation.5-bra_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 8
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка бытовой техники в {:prepositional}',
                'catalog_name' => 'Установка бытовой техники',
                'code' => str_slug('Установка бытовой техники'),
                'h1' => 'Установка бытовой техники в {:prepositional}',
                'title' => 'Установка бытовой техники в {:prepositional}',
                'description' => 'Установка бытовой техники в {:prepositional}',
                'keywords' => 'электрика, установка, бытовая техника, {:name}',
                'default_template' => 'templates.services.electrician.installation.6-household_appliances_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 9
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка дверного звонка в {:prepositional}',
                'catalog_name' => 'Установка дверного звонка',
                'code' => str_slug('Установка дверного звонка'),
                'h1' => 'Установка дверного звонка в {:prepositional}',
                'title' => 'Установка дверного звонка в {:prepositional}',
                'description' => 'Установка дверного звонка в {:prepositional}',
                'keywords' => 'электрика, установка, дверной звонок, {:name}',
                'default_template' => 'templates.services.electrician.installation.7-doorbell_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 10
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка дифференицального автомата в {:prepositional}',
                'catalog_name' => 'Установка дифференицального автомата',
                'code' => str_slug('Установка дифференицального автомата'),
                'h1' => 'Установка дифференицального автомата в {:prepositional}',
                'title' => 'Установка дифференицального автомата в {:prepositional}',
                'description' => 'Установка дифференицального автомата в {:prepositional}',
                'keywords' => 'электрика, установка, дифференицальный автомат, {:name}',
                'default_template' => 'templates.services.electrician.installation.8-difavtomat_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 11
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Установка УЗО в {:prepositional}',
                'catalog_name' => 'Установка УЗО',
                'code' => str_slug('Установка узо'),
                'h1' => 'Установка УЗО в {:prepositional}',
                'title' => 'Установка УЗО в {:prepositional}',
                'description' => 'Установка УЗО в {:prepositional}',
                'keywords' => 'электрика, установка, УЗО, {:name}',
                'default_template' => 'templates.services.electrician.installation.9-uzo_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 12
            ]
        ]);

        $parentId = ServiceTemplate::whereCode(str_slug('Электротехнические работы'))->get()->first()->id;

        ServiceTemplate::insert([
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Монтаж тёплого пола в {:prepositional}',
                'catalog_name' => 'Монтаж тёплого пола',
                'code' => str_slug('Монтаж тёплого пола'),
                'h1' => 'Монтаж тёплого пола в {:prepositional}',
                'title' => 'Монтаж тёплого пола в {:prepositional}',
                'description' => 'Монтаж тёплого пола в {:prepositional}',
                'keywords' => 'электрика, монтаж, тёплый пол, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.1-heated_floors_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 13
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Замена ламп накаливания в {:prepositional}',
                'catalog_name' => 'Замена ламп накаливания',
                'code' => str_slug('Замена ламп накаливания'),
                'h1' => 'Замена ламп накаливания в {:prepositional}',
                'title' => 'Замена ламп накаливания в {:prepositional}',
                'description' => 'Замена ламп накаливания в {:prepositional}',
                'keywords' => 'электрика, монтаж, лампа накаливания, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.2-replacing_incandescent_lamps',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 14
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Замена люминесцентных ламп на светодиодные в {:prepositional}',
                'catalog_name' => 'Замена люминесцентных ламп на светодиодные',
                'code' => str_slug('Замена люминесцентных ламп на светодиодные'),
                'h1' => 'Замена люминесцентных ламп на светодиодные в {:prepositional}',
                'title' => 'Замена люминесцентных ламп на светодиодные в {:prepositional}',
                'description' => 'Замена люминесцентных ламп на светодиодные в {:prepositional}',
                'keywords' => 'электрика, замена, люминесцентная лампа, светодиодная лампа, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.3-replacing_fluorescent_led_lamps',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 15
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Замена проводки в квартире в {:prepositional}',
                'catalog_name' => 'Замена проводки в квартире',
                'code' => str_slug('Замена проводки в квартире'),
                'h1' => 'Замена проводки в квартире в {:prepositional}',
                'title' => 'Замена проводки в квартире в {:prepositional}',
                'description' => 'Замена проводки в квартире в {:prepositional}',
                'keywords' => 'электрика, замена, проводка в квартире, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.4-replacing_wiring_apartment',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 16
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Монтаж электропроводки в {:prepositional}',
                'catalog_name' => 'Монтаж электропроводки',
                'code' => str_slug('Монтаж электропроводки'),
                'h1' => 'Монтаж электропроводки в {:prepositional}',
                'title' => 'Монтаж электропроводки в {:prepositional}',
                'description' => 'Монтаж электропроводки в {:prepositional}',
                'keywords' => 'электрика, замена, электропроводка, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.5-electrical_wiring_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 17
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Монтаж светодиодной ленты в {:prepositional}',
                'catalog_name' => 'Монтаж светодиодной ленты',
                'code' => str_slug('Монтаж светодиодной ленты'),
                'h1' => 'Монтаж светодиодной ленты в {:prepositional}',
                'title' => 'Монтаж светодиодной ленты в {:prepositional}',
                'description' => 'Монтаж светодиодной ленты в {:prepositional}',
                'keywords' => 'электрика, монтаж, светодиодная лента, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.6-led_strip_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 18
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Монтаж щитка в {:prepositional}',
                'catalog_name' => 'Монтаж щитка',
                'code' => str_slug('Монтаж щитка'),
                'h1' => 'Монтаж щитка в {:prepositional}',
                'title' => 'Монтаж щитка в {:prepositional}',
                'description' => 'Монтаж щитка в {:prepositional}',
                'keywords' => 'электрика, монтаж, щиток, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.7-shield_installation',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 19
            ],
            [
                'specialization_id' => $specializationId,
                'parent_id' => $parentId,
                'name' => 'Разводка электрики в {:prepositional}',
                'catalog_name' => 'Разводка электрики',
                'code' => str_slug('Разводка электрики'),
                'h1' => 'Разводка электрики в {:prepositional}',
                'title' => 'Разводка электрики в {:prepositional}',
                'description' => 'Разводка электрики в {:prepositional}',
                'keywords' => 'электрика, монтаж, разводка, {:name}',
                'default_template' => 'templates.services.electrician.electrical_work.8-electrical_wiring',
                'main_service' => false,
                'on_city_list' => true,
                'section' => false,
                'default_price' => '700',
                'sort' => 20
            ]
        ]);
    }
}
