<?php

namespace App\Services;

use App\Models\City;
use App\Models\Url;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class CityUrlGenerator
{
    /**
     * Возвращает существующий URL города или создаёт его из code в транзакции.
     *
     * Повторный запуск сохраняет существующий адрес без изменения записи.
     *
     * @param  int  $cityId Идентификатор города.
     * @return Url Существующая или созданная запись URL города.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Если город не найден.
     * @throws RuntimeException Если code пустой или адрес занят другой записью.
     * @throws \Illuminate\Database\QueryException Если операция с БД не удалась.
     */
    public function generate(int $cityId): Url
    {
        return DB::transaction(function () use ($cityId): Url {
            $city = City::query()->whereKey($cityId)->lockForUpdate()->firstOrFail();
            $existingUrl = Url::query()->where('entity_class', Url::CITY)
                ->where('entity_id', $city->id)->orderBy('id')->first();

            if ($existingUrl !== null) {
                return $existingUrl;
            }

            $path = trim((string) $city->code);
            if ($path === '') {
                throw new RuntimeException('У города не задан code для URL.');
            }
            if (Url::query()->where('url', $path)->exists()) {
                throw new RuntimeException("Адрес {$path} уже занят другой записью в urls.");
            }

            return Url::create([
                'url' => $path,
                'entity_id' => $city->id,
                'entity_class' => Url::CITY,
                'master_id' => null,
            ]);
        });
    }
}
