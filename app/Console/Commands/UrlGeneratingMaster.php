<?php

namespace App\Console\Commands;

use App\Services\MasterUrlsGenerator;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class UrlGeneratingMaster extends Command
{
    protected $signature = 'app:url-generating-master {master_id}';

    protected $description = 'Генерация недостающих URL мастера и его услуг';

    public function handle(MasterUrlsGenerator $generator): int
    {
        $masterId = filter_var($this->argument('master_id'), FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        if ($masterId === false) {
            $this->error('master_id должен быть положительным целым числом.');

            return self::FAILURE;
        }

        try {
            $generator->generate($masterId);
        } catch (ModelNotFoundException) {
            $this->error('Мастер не найден.');

            return self::FAILURE;
        } catch (Throwable $exception) {
            report($exception);
            $this->error('Не удалось сгенерировать URL: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info('URL мастера и услуг обновлены.');

        return self::SUCCESS;
    }
}
