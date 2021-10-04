<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class counter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'counter:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset redis visits counter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Redis::set('visits', 0);
        echo "Visits counter reset successfuly.\n";
        return 0;
    }
}
