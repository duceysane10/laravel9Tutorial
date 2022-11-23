<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class showDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ShowDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show me Current Database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Current Db:'.DB::connection()->getDatabaseName());
    }
}
