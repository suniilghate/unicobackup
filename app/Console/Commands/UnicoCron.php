<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UnicoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unico:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database Backup cron';

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
        $command = "backup:run --only-db --disable-notifications";
        $returnVar = NULL;
        $output  = NULL;
        //Log ::info("Cron is working fine!");
        exec($command, $output, $returnVar);
    }
}
