<?php

namespace App\Services;

use App\Models\Url;
use App\Repositories\Interfaces\CityRepositoryInterface;
use RuntimeException;

class CitySitemapGenerator
{
    /**
     * Подключает репозиторий городов и общий сервис записи sitemap.
     *
     * @param  CityRepositoryInterface  $cityRepository Репозиторий для поиска города.
     * @param  SitemapWriter  $writer Сервис безопасной записи XML.
     */
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository,
        private readonly SitemapWriter $writer
    ) {
    }

    /**
     * Создаёт sitemap города с текущей датой и приоритетом 0.1.
     *
     * @param  int  $cityId Идентификатор города.
     * @param  string|null  $directory Каталог назначения; null означает корень проекта.
     * @return string Путь к созданному файлу sitemap_city_{city_id}.xml.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Если город не найден.
     * @throws RuntimeException Если URL отсутствует или запись sitemap не удалась.
     */
    public function generate(int $cityId, ?string $directory = null): string
    {
        $city = $this->cityRepository->getOne($cityId);
        $url = Url::query()->where('entity_class', Url::CITY)
            ->where('entity_id', $city->id)->orderBy('id')->first();

        if ($url === null) {
            throw new RuntimeException('У города нет URL. Сначала выполните app:url-generating-city.');
        }

        $directory = $directory ?? base_path();

        return $this->writer->write(
            [$url],
            $directory.DIRECTORY_SEPARATOR."sitemap_city_{$city->id}.xml",
            '0.1',
            now()->format('Y-m-d')
        );
    }
}
