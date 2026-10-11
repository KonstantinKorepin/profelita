<?php

namespace App\Console\Commands;

use App\Services\TemplateServicesGenerator;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class FillServicesNewTemplate extends Command
{
    protected $signature = 'app:fill-services-template {service_template_id}';

    protected $description = 'Добавление недостающих услуг по шаблону актуальным мастерам';

    public function handle(TemplateServicesGenerator $generator): int
    {
        $templateId = filter_var($this->argument('service_template_id'), FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        if ($templateId === false) {
            $this->error('service_template_id должен быть положительным целым числом.');

            return self::FAILURE;
        }

        try {
            $result = $generator->generate($templateId);
        } catch (ModelNotFoundException) {
            $this->error('Шаблон услуги не найден.');

            return self::FAILURE;
        } catch (Throwable $exception) {
            report($exception);
            $this->error('Не удалось добавить услуги: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info("Добавлено услуг: {$result['created']}. Уже существовали: {$result['skipped']}.");

        return self::SUCCESS;
    }
}
