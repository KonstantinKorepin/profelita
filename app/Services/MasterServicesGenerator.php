<?php

namespace App\Services;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\Url;
use App\Repositories\Interfaces\ServiceTemplateRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class MasterServicesGenerator
{
    /**
     * Подключает репозиторий шаблонов и фабрику услуг.
     *
     * @param  ServiceTemplateRepositoryInterface  $serviceTemplateRepository Репозиторий шаблонов специализации.
     * @param  ServiceFromTemplateFactory  $serviceFactory Фабрика заполнения и сохранения услуг.
     */
    public function __construct(
        private readonly ServiceTemplateRepositoryInterface $serviceTemplateRepository,
        private readonly ServiceFromTemplateFactory $serviceFactory
    ) {
    }

    /**
     * Пересоздаёт услуги мастера и их URL в одной транзакции.
     *
     * Цены и SEO-поля берутся из шаблонов. Прежние адреса сохраняются для тех же
     * шаблонов, недостающие создаются. Мастер и его город помечаются активными.
     *
     * @param  Master  $master Мастер, услуги которого нужно пересоздать.
     * @param  City  $city Город мастера для подстановки SEO-тегов.
     * @return int Количество созданных услуг.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Если мастер больше не существует.
     * @throws RuntimeException Если шаблоны некорректны или есть ссылки от услуг других владельцев.
     * @throws \Illuminate\Database\QueryException Если запись данных или URL не удалась.
     */
    public function generate(Master $master, City $city): int
    {
        return DB::transaction(function () use ($master, $city): int {
            // Блокировка обеспечивает последовательное выполнение запусков для одного мастера.
            $master = Master::query()->whereKey($master->id)->lockForUpdate()->firstOrFail();
            $templates = $this->serviceTemplateRepository
                ->getBySpecializationId($master->specialization_id);
            $this->validateTemplates($templates);

            $oldServices = Service::query()->where('master_id', $master->id)->get();
            $oldIds = $oldServices->modelKeys();

            if (Service::query()->whereIn('parent_id', $oldIds)
                ->where(function ($query) use ($master) {
                    $query->whereNull('master_id')->orWhere('master_id', '<>', $master->id);
                })->exists()) {
                throw new RuntimeException('На услуги мастера ссылаются услуги другого владельца.');
            }

            $urls = Url::query()->where('entity_class', Url::SERVICE)
                ->where(function ($query) use ($master, $oldIds) {
                    $query->where('master_id', $master->id)->orWhereIn('entity_id', $oldIds);
                })->get();
            $oldServicesById = $oldServices->keyBy('id');
            $urlsByTemplate = $urls->filter(fn (Url $url) => $oldServicesById->has($url->entity_id))
                ->groupBy(fn (Url $url) => $oldServicesById->get($url->entity_id)->service_templates_id);

            Url::query()->whereKey($urls->modelKeys())->delete();
            Service::query()->where('master_id', $master->id)->update(['parent_id' => null]);
            Service::query()->where('master_id', $master->id)->delete();

            $servicesByTemplate = [];
            foreach ($templates as $template) {
                $service = $this->serviceFactory->create($master, $city, $template);
                $servicesByTemplate[$template->id] = $service;

                if (! $template->section) {
                    $oldUrls = $urlsByTemplate->get($template->id, collect());
                    $paths = $oldUrls->isEmpty() ? [str_slug($service->name)] : $oldUrls->pluck('url');
                    foreach ($paths as $path) {
                        Url::create([
                            'url' => $path,
                            'entity_class' => Url::SERVICE,
                            'entity_id' => $service->id,
                            'master_id' => $master->id,
                        ]);
                    }
                }
            }

            foreach ($templates as $template) {
                if ($template->parent_id !== null) {
                    $servicesByTemplate[$template->id]->update([
                        'parent_id' => $servicesByTemplate[$template->parent_id]->id,
                    ]);
                }
            }

            $master->update(['actual' => true]);
            $city->update(['active' => true]);

            return count($servicesByTemplate);
        });
    }

    /**
     * Проверяет наличие шаблонов, их родителей и отсутствие циклических связей.
     *
     * @param  Collection<int, \App\Models\ServiceTemplate>  $templates Шаблоны одной специализации.
     *
     * @throws RuntimeException Если набор пуст, родитель отсутствует или обнаружен цикл.
     */
    private function validateTemplates(Collection $templates): void
    {
        if ($templates->isEmpty()) {
            throw new RuntimeException('Для специализации мастера нет шаблонов услуг.');
        }

        $templatesById = $templates->keyBy('id');
        foreach ($templates as $template) {
            $visited = [];
            $current = $template;
            while ($current !== null) {
                if (isset($visited[$current->id])) {
                    throw new RuntimeException("Циклическая связь в шаблоне {$template->id}.");
                }
                $visited[$current->id] = true;
                if ($current->parent_id === null) {
                    break;
                }
                $parentId = $current->parent_id;
                $current = $templatesById->get($parentId);
                if ($current === null) {
                    throw new RuntimeException("Родительский шаблон {$parentId} отсутствует в специализации мастера.");
                }
            }
        }
    }
}
