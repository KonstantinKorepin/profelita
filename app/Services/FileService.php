<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class FileService
{
    /**
     * @param UploadedFile $file
     * @param string $diskDriver
     * @param string $directory
     * @param int $entityId
     * @return File
     * @throws FileNotFoundException
     */
    public function uploadFile(UploadedFile $file, string $diskDriver, string $directory, int $entityId): File
    {
        $filePath = $file->store($directory. DIRECTORY_SEPARATOR . $entityId, $diskDriver);

        if (is_string($filePath)) {
            $newFile = new File();
            $newFile->name = $file->getClientOriginalName();
            $newFile->file_name = pathinfo($filePath, PATHINFO_BASENAME);
            $newFile->mime_type = $file->getClientMimeType();
            $newFile->path = $filePath;
            $newFile->size = Storage::size($filePath);
            $newFile->directory = $directory;
            $newFile->save();

            return $newFile;
        } else {
            throw new FileNotFoundException('Ошибка сохранения файла');
        }
    }

    /**
     * удаляем файл
     * @param int $fileId
     */
    public function deleteFile(int $fileId): void
    {
        $file = File::whereId($fileId)->get()->first();
        if (!$file) return;

        if (file_exists(storage_path('app/public') . DIRECTORY_SEPARATOR . $file->path)) {
            unlink(storage_path('app/public') . DIRECTORY_SEPARATOR . $file->path);
        }
        $file->delete();
        return;
    }

}
