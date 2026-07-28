<?php

namespace App\Repositories;

use App\Models\File;
use App\Repositories\Interfaces\FileRepositoryInterface;

class FileRepository implements FileRepositoryInterface
{
    /**
     * Возвращает файл по $id
     * @param int $id
     * @return File|null
     */
    public function find(int $id): ?File
    {
        return File::find($id);
    }
}
