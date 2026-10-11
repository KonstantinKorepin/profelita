<?php

namespace App\Services;

use App\Models\Url;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use RuntimeException;

class MasterSitemapGenerator
{
    /**
     * Подключает репозиторий мастеров и общий сервис записи sitemap.
     *
     * @param  MasterRepositoryInterface  $masterRepository Репозиторий для поиска мастера.
     * @param  SitemapWriter  $writer Сервис безопасной записи XML.
     */
    public function __construct(
        private readonly MasterRepositoryInterface $masterRepository,
        private readonly SitemapWriter $writer
    ) {
    }

    /**
     * Создаёт sitemap из URL мастера и его услуг с приоритетом 0.5.
     *
     * URL читаются порциями по ID; дата lastmod берётся из updated_at каждой записи.
     *
     * @param  int  $masterId Идентификатор мастера.
     * @param  string|null  $directory Каталог назначения; null означает корень проекта.
     * @return string Путь к созданному файлу sitemap_master_{master_id}.xml.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Если мастер не найден.
     * @throws RuntimeException Если URL отсутствуют или запись sitemap не удалась.
     */
    public function generate(int $masterId, ?string $directory = null): string
    {
        $master = $this->masterRepository->getOne($masterId);
        $query = Url::query()->where(function ($query) use ($master) {
            $query->where(function ($query) use ($master) {
                $query->where('entity_class', Url::MASTER)->where('entity_id', $master->id);
            })->orWhere(function ($query) use ($master) {
                $query->where('entity_class', Url::SERVICE)->where('master_id', $master->id);
            });
        });

        if (! $query->exists()) {
            throw new RuntimeException('У мастера нет URL. Сначала выполните app:url-generating-master.');
        }

        $directory = $directory ?? base_path();

        return $this->writer->write(
            $query->lazyById(100),
            $directory.DIRECTORY_SEPARATOR."sitemap_master_{$master->id}.xml"
        );
    }
}
