<?php

namespace App\Services;

use App\Models\Master;
use App\Models\Service;
use App\Models\ServiceTemplate;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class TemplateServicesGenerator
{
    /**
     * Подключает фабрику создания услуг из шаблона.
     *
     * @param  ServiceFromTemplateFactory  $serviceFactory Фабрика заполнения и сохранения услуг.
     */
    public function __construct(private readonly ServiceFromTemplateFactory $serviceFactory)
    {
    }

    /**
     * Добавляет услуги по шаблону актуальным мастерам соответствующей специализации.
     *
     * Существующие услуги пропускаются без изменения. Все добавления выполняются
     * в одной транзакции и откатываются при ошибке у любого мастера. URL не создаются.
     *
     * @param  int  $templateId Идентификатор добавляемого шаблона услуги.
     * @return array{created: int, skipped: int} Количество добавленных и уже существовавших услуг.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Если шаблон не найден.
     * @throws RuntimeException Если родительский шаблон некорректен, город или родительская услуга отсутствуют.
     * @throws \Illuminate\Database\QueryException Если сохранение услуг не удалось.
     */
    public function generate(int $templateId): array
    {
        return DB::transaction(function () use ($templateId): array {
            $template = ServiceTemplate::query()->whereKey($templateId)->lockForUpdate()->firstOrFail();
            if ($template->parent_id !== null) {
                $parentTemplate = ServiceTemplate::query()->find($template->parent_id);
                if ($parentTemplate === null || $parentTemplate->id === $template->id
                    || $parentTemplate->specialization_id !== $template->specialization_id) {
                    throw new RuntimeException('Некорректный родительский шаблон услуги.');
                }
            }

            $created = 0;
            $skipped = 0;
            $masters = Master::query()->where('actual', true)
                ->where('specialization_id', $template->specialization_id)
                ->with('city')->lockForUpdate()->lazyById(100);

            foreach ($masters as $master) {
                if (Service::query()->where('master_id', $master->id)
                    ->where('service_templates_id', $template->id)->exists()) {
                    $skipped++;

                    continue;
                }

                $city = $master->city;
                if ($city === null) {
                    throw new RuntimeException("Город мастера {$master->id} не найден.");
                }

                $parentId = null;
                if ($template->parent_id !== null) {
                    $parentId = Service::query()->where('master_id', $master->id)
                        ->where('service_templates_id', $template->parent_id)->orderBy('id')->value('id');
                    if ($parentId === null) {
                        throw new RuntimeException("У мастера {$master->id} отсутствует родительская услуга по шаблону {$template->parent_id}.");
                    }
                }

                $this->serviceFactory->create($master, $city, $template, $parentId);
                $created++;
            }

            return ['created' => $created, 'skipped' => $skipped];
        });
    }
}
