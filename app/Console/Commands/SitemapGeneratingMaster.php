<?php

namespace App\Console\Commands;

use App\Services\MasterSitemapGenerator;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class SitemapGeneratingMaster extends Command
{
    protected $signature = 'app:sitemap-generating-master {master_id}';

    protected $description = 'Генерация карты для мастера';

    public function handle(MasterSitemapGenerator $generator): int
    {
        $masterId = filter_var($this->argument('master_id'), FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        if ($masterId === false) {
            $this->error('master_id должен быть положительным целым числом.');

            return self::FAILURE;
        }

        try {
            $filename = $generator->generate($masterId);
        } catch (ModelNotFoundException) {
            $this->error('Мастер не найден.');

            return self::FAILURE;
        } catch (Throwable $exception) {
            report($exception);
            $this->error('Не удалось сгенерировать sitemap: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info('Sitemap создан: '.$filename);

        return self::SUCCESS;
    }
}
