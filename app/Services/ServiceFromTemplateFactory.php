<?php

namespace App\Services;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\ServiceTemplate;

class ServiceFromTemplateFactory
{
    /**
     * Создаёт и сохраняет услугу из шаблона с подстановкой SEO-тегов города.
     *
     * @param  Master  $master Владелец услуги.
     * @param  City  $city Город для подстановки названия и предложного падежа.
     * @param  ServiceTemplate  $template Источник полей, цены и настроек услуги.
     * @param  int|null  $parentId Идентификатор родительской услуги; null для корневой услуги.
     * @return Service Сохранённая услуга.
     *
     * @throws \Illuminate\Database\QueryException Если сохранение услуги не удалось.
     */
    public function create(Master $master, City $city, ServiceTemplate $template, ?int $parentId = null): Service
    {
        return Service::create([
            'master_id' => $master->id,
            'service_templates_id' => $template->id,
            'parent_id' => $parentId,
            'name' => $this->replaceSeoTags($template->name, $city),
            'h1' => $this->replaceSeoTags($template->h1, $city),
            'title' => $this->replaceSeoTags($template->title, $city),
            'description' => $this->replaceSeoTags($template->description, $city),
            'keywords' => $this->replaceSeoTags($template->keywords, $city),
            'template' => $template->default_template,
            'main_service' => $template->main_service,
            'on_city_list' => $template->on_city_list,
            'section' => $template->section,
            'price' => $template->default_price,
            'sort' => $template->sort,
        ]);
    }

    /**
     * Очищает текст и заменяет {:prepositional} и {:name} данными города.
     *
     * @param  string|null  $value Текст шаблона; null и пустая строка дают пустой результат.
     * @param  City  $city Город для подстановки SEO-тегов.
     * @return string Обработанный текст.
     */
    private function replaceSeoTags(?string $value, City $city): string
    {
        if ($value === null || $value === '') {
            return '';
        }

        return str_replace(
            ['{:prepositional}', '{:name}'],
            [$city->prepositional, $city->name],
            StringHelper::getSeoTagString($value)
        );
    }
}
