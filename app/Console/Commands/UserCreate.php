<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-create {name} {email} {is_admin} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание пользователя';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User();
        $user->name = $this->argument('name');
        $user->email = $this->argument('email');
        $user->is_admin = (int) $this->argument('is_admin');
        $user->password = Hash::make($this->argument('password'));
        $user->save();

        $this->info('Готово!');
    }
}
