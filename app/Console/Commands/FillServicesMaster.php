<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Service;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use App\Repositories\Interfaces\ServiceTemplateRepositoryInterface;
use App\Services\StringHelper;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class FillServicesMaster extends Command
{
    protected $signature = 'app:fill-services-master {master_id}';

    protected $description = 'Заполнение данных по услугам по определённому мастеру';

    public function __construct(
        private readonly MasterRepositoryInterface $masterRepository,
        private readonly CityRepositoryInterface $cityRepository,
        private readonly ServiceTemplateRepositoryInterface $serviceTemplateRepository
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        try {
            $master = $this->masterRepository->getOne((int) $this->argument('master_id'));
        } catch (ModelNotFoundException) {
            $this->error('Мастер не найден.');
            return;
        }

        try {
            $city = $this->cityRepository->getOne($master->city_id);
        } catch (ModelNotFoundException) {
            $this->error('Город мастера не найден.');
            return;
        }

        $master->update(['actual' => true]);
        $city->update(['active' => true]);

        $serviceTemplates = $this->serviceTemplateRepository->getBySpecializationId($master->specialization_id);
        $serviceIdsByTemplateId = [];
        $templateParentMap = [];

        DB::transaction(function () use (
            $serviceTemplates,
            $master,
            $city,
            &$serviceIdsByTemplateId,
            &$templateParentMap
        ) {
            foreach ($serviceTemplates as $template) {
                $service = Service::create([
                    'master_id' => $master->id,
                    'service_templates_id' => $template->id,
                    'parent_id' => null,
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

                $serviceIdsByTemplateId[$template->id] = $service->id;
                if ($template->parent_id) {
                    $templateParentMap[$template->id] = (int) $template->parent_id;
                }
            }

            $upsertData = [];
            foreach ($templateParentMap as $templateId => $parentTemplateId) {
                $parentServiceId = $serviceIdsByTemplateId[$parentTemplateId] ?? null;
                if ($parentServiceId === null) {
                    continue;
                }

                $upsertData[] = [
                    'id' => $serviceIdsByTemplateId[$templateId],
                    'parent_id' => $parentServiceId,
                ];
            }

            if ($upsertData !== []) {
                Service::upsert($upsertData, ['id'], ['parent_id']);
            }
        });

        $this->info('Услуги мастера успешно добавлены!');
    }

    /**
     * Заменяет тэги
     * @param string|null $value
     * @param City $city
     * @return string
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
