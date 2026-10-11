<?php

namespace App\Console\Commands;

use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use App\Services\MasterServicesGenerator;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class FillServicesMaster extends Command
{
    protected $signature = 'app:fill-services-master {master_id}';

    protected $description = 'Заполнение данных по услугам по определённому мастеру';

    public function __construct(
        private readonly MasterRepositoryInterface $masterRepository,
        private readonly CityRepositoryInterface $cityRepository,
        private readonly MasterServicesGenerator $generator
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $masterId = filter_var($this->argument('master_id'), FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        if ($masterId === false) {
            $this->error('master_id должен быть положительным целым числом.');

            return self::FAILURE;
        }

        try {
            $master = $this->masterRepository->getOne($masterId);
        } catch (ModelNotFoundException) {
            $this->error('Мастер не найден.');

            return self::FAILURE;
        }

        try {
            $city = $this->cityRepository->getOne($master->city_id);
        } catch (ModelNotFoundException) {
            $this->error('Город мастера не найден.');

            return self::FAILURE;
        }

        try {
            $count = $this->generator->generate($master, $city);
        } catch (Throwable $exception) {
            report($exception);
            $this->error('Не удалось пересоздать услуги: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info("Услуги мастера успешно пересозданы: {$count}.");

        return self::SUCCESS;
    }
}
