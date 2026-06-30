<?php

namespace App\Services;

use App\Models\File;
use App\Repositories\Interfaces\FileRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function __construct(
        private readonly FileRepositoryInterface $repository,
    ){}

    public function uploadFile(UploadedFile $file, string $disk, string $directory, int $entityId): File
    {
        $path = $file->store($directory . '/' . $entityId, $disk);

        if (!is_string($path)) {
            abort(500, 'Ошибка сохранения файла');
        }

        return File::create([
            'name' => $file->getClientOriginalName(),
            'file_name' => pathinfo($path, PATHINFO_BASENAME),
            'mime_type' => $file->getClientMimeType(),
            'path' => $path,
            'disk' => $disk,
            'size' => Storage::disk($disk)->size($path),
            'directory' => $directory,
        ]);
    }

    public function deleteFile(int $fileId): void
    {
        $file = $this->repository->find($fileId);
        if (!$file) {
            return;
        }

        Storage::disk($file->disk)->delete($file->path);
        $file->delete();
    }
}
