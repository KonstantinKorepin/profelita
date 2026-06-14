<?php

namespace App\Console\Commands;

use App\Repositories\CityRepository;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $repository = new CityRepository();
        $data = $repository->getActiveAll();

        $data = 1;



    }
}
