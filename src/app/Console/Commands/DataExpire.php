<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Data;
use Carbon\Carbon;

class DataExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes data that has expired';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Expiring data');
        $rows = Data::where('expires_at', '<=', Carbon::now())->delete();
        $this->info("Deleted {$rows} rows");
    }
    
    public function info($message, $verbosity = null) {
        $time = Carbon::now()->toDateTimeString();
        parent::info("[{$time}] {$message}", $verbosity);
    }
}
