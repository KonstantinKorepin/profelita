<?php

namespace App\Console\Commands;

use App\Services\CityUrlGenerator;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class UrlGeneratingCity extends Command
{
    protected $signature = 'app:url-generating-city {city_id}';

    protected $description = 'Генерация недостающего URL города';

    public function handle(CityUrlGenerator $generator): int
    {
        $cityId = filter_var($this->argument('city_id'), FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        if ($cityId === false) {
            $this->error('city_id должен быть положительным целым числом.');

            return self::FAILURE;
        }

        try {
            $url = $generator->generate($cityId);
        } catch (ModelNotFoundException) {
            $this->error('Город не найден.');

            return self::FAILURE;
        } catch (Throwable $exception) {
            report($exception);
            $this->error('Не удалось сгенерировать URL города: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info('URL города: '.$url->url);

        return self::SUCCESS;
    }
}
