<?php

namespace App\Services;

use App\Models\Master;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MasterService
{
    public const NUMBER_PER_PAGE = 10;

    private const DIRECTORY = 'avatars';

    private array $fields = [
        'last_name',
        'first_name',
        'middle_name',
    ];

    private array $avatars = [
        'profile_file',
        'list_file',
    ];

    public function __construct(
        private readonly MasterRepositoryInterface $repository,
        private readonly FileService $fileService,
    ){}

    /**
     * Список мастеров на фронт
     * @return Collection
     */
    public function getFrontMasters(): Collection
    {
        return $this->repository->getFrontAll();
    }

    /**
     * Все мастера с пагинацией
     * @return LengthAwarePaginator
     */
    public function getAllMastersPaginate(): LengthAwarePaginator
    {
        return $this->repository->getAllPaginate(self::NUMBER_PER_PAGE);
    }

    /**
     * Мастер по ID
     * @param int $masterId
     * @return Master
     */
    public function getOne(int $masterId): Master
    {
        return $this->repository->getOne($masterId);
    }

    /**
     * Обновляет данные мастера из формы
     * @param array $data
     * @param int $masterId
     */
    public function updateData(array $data, int $masterId): void
    {
        $master = $this->getOne($masterId);
        $master->fill(collect($data)->only($this->fields)->toArray());
        $master->save();

        $this->updateAvatars($data, $master);
    }

    /**
     * Удаление мастера
     * @param int $masterId
     */
    public function delete(int $masterId): void
    {
        $this->getOne($masterId)->delete();
    }

    /**
     * Обновление аватарок
     * @param array $data
     * @param Master $master
     */
    private function updateAvatars(array $data, Master $master): void
    {
        foreach ($this->avatars as $fieldKey) {
            if (empty($data[$fieldKey])) {
                continue;
            }

            $fileIdField = $fieldKey . '_id';
            if (!empty($master->$fileIdField)) {
                $this->fileService->deleteFile($master->$fileIdField);
            }

            $file = $this->fileService->uploadFile(
                $data[$fieldKey],
                config('filesystems.default'),
                self::DIRECTORY,
                $master->id
            );

            $master->$fileIdField = $file->id;
        }

        $master->save();
    }
}
