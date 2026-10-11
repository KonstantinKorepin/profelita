<?php

namespace App\Console\Commands;

use App\Services\CitySitemapGenerator;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class SitemapGeneratingCity extends Command
{
    protected $signature = 'app:sitemap-generating-city {city_id}';

    protected $description = 'Генерация карты для города';

    public function handle(CitySitemapGenerator $generator): int
    {
        $cityId = filter_var($this->argument('city_id'), FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        if ($cityId === false) {
            $this->error('city_id должен быть положительным целым числом.');

            return self::FAILURE;
        }

        try {
            $filename = $generator->generate($cityId);
        } catch (ModelNotFoundException) {
            $this->error('Город не найден.');

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
