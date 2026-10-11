<?php

namespace App\Services;

use App\Models\Master;
use App\Models\Service;
use App\Models\Url;
use Illuminate\Support\Facades\DB;

class MasterUrlsGenerator
{
    /**
     * Создаёт недостающие URL мастера и его услуг в одной транзакции.
     *
     * Сохраняет самый старый URL мастера и удаляет его дубликаты. Существующие URL
     * услуг сохраняются; для разделов новые адреса не создаются.
     *
     * @param  int  $masterId Идентификатор мастера.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Если мастер не найден.
     * @throws \Illuminate\Database\QueryException Если запись URL не удалась, в том числе из-за занятого адреса услуги.
     */
    public function generate(int $masterId): void
    {
        DB::transaction(function () use ($masterId): void {
            // Используем ту же блокировку мастера, что и при пересоздании его услуг.
            $master = Master::query()->whereKey($masterId)->lockForUpdate()->firstOrFail();
            $masterUrls = Url::query()->where('entity_class', Url::MASTER)
                ->where('entity_id', $master->id)->orderBy('id')->get();

            if ($masterUrls->isEmpty()) {
                $basePath = str_slug($master->getFullName());
                $path = $basePath;
                $suffix = 0;
                while (Url::query()->where('url', $path)->exists()) {
                    $path = $basePath.'_'.++$suffix;
                }

                Url::create([
                    'url' => $path,
                    'entity_id' => $master->id,
                    'master_id' => $master->id,
                    'entity_class' => Url::MASTER,
                ]);
            } else {
                // Сохраняем исходный адрес и удаляем дубликаты от предыдущих запусков.
                $masterUrls->first()->update(['master_id' => $master->id]);
                Url::query()->whereKey($masterUrls->skip(1)->modelKeys())->delete();
            }

            Service::query()->where('master_id', $master->id)->where('section', false)
                ->chunkById(100, function ($services) use ($master): void {
                    foreach ($services as $service) {
                        if (Url::query()->where('entity_class', Url::SERVICE)
                            ->where('entity_id', $service->id)->exists()) {
                            continue;
                        }

                        Url::create([
                            'url' => str_slug($service->name),
                            'entity_id' => $service->id,
                            'master_id' => $master->id,
                            'entity_class' => Url::SERVICE,
                        ]);
                    }
                });
        });
    }
}
