<?php

namespace App\Services;

use App\Models\Master;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MasterService
{
    const NUMBER_PER_PAGE = 10;

    const DIRECTOTY = 'avatars';

    private $fields = [
        'last_name',
        'first_name',
        'middle_name',
    ];

    private $avatars = [
        'profile_file',
        'list_file',
    ];

    public function __construct(
        private readonly MasterRepositoryInterface $repository
    ){}

    /**
     * Отзывы на странице города.
     * @return Collection
     */
    public function getFrontMasters(): Collection
    {
        return $this->repository->getFrontAll();
    }

    /** Все отзывы с пагинацией.
     * @return LengthAwarePaginator
     */
    public function getAllMastersPaginate(): LengthAwarePaginator
    {
        return $this->repository->getAllPaginate(self::NUMBER_PER_PAGE);
    }

    /**
     * Мастер
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
        $master = Master::whereId($masterId)->get()->first();
        foreach ($this->fields as $field) {
            $master->$field = $data[$field];
        }
        $master->save();

        $this->updateAvatars($data, $master);
    }

    /**
     * обновить аватарки
     * @param array $data
     * @param Master $master
     */
    private function updateAvatars(array $data, Master $master): void
    {
        $fileService = new FileService();
        foreach ($this->avatars as $fieldKey) {
            if (!empty($data[$fieldKey])) {
                // сначала нужно удалить старый файл, если он есть
                switch ($fieldKey) {
                    case 'profile_file':
                        $fileId = $master->profile_file_id;
                    break;
                    case 'list_file':
                        $fileId = $master->list_file_id;
                    break;
                }
                if (!empty($fileId)) {
                    $field = $fieldKey . '_id';
                    $master->$field = null;
                    $master->save();

                    $fileService->deleteFile($fileId);
                }

                // добавляем новый файл
                $file = $data[$fieldKey];
                $file = $fileService->uploadFile($file, env('FILESYSTEM_DISK'), self::DIRECTOTY, $master->id);

                $field = $fieldKey . '_id';
                $master->$field = $file->id;
            }
        }
        $master->save();
    }

}
