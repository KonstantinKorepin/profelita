<?php

namespace App\Console\Commands;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Command
{
    protected $signature = 'app:user-create {name} {email} {is_admin} {password}';

    protected $description = 'Создание пользователя';

    public function __construct(
        private readonly UserRepositoryInterface $repository,
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $email = $this->argument('email');
        if ($this->repository->findByEmail($email)) {
            $this->error("Пользователь с email {$email} уже существует");
            return self::FAILURE;
        }

        $this->repository->create([
            'name' => $this->argument('name'),
            'email' => $email,
            'is_admin' => (int) $this->argument('is_admin'),
            'password' => Hash::make($this->argument('password')),
        ]);

        $this->info('Пользователь добавлен!');
        return self::SUCCESS;
    }
}
