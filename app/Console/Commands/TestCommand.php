<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cronjob Test Command';

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
        \Log::info('Testing Command');
        \Log::channel("log-users")->info("helo users");
        \Log::channel("log-admins")->info("helo admins");

        for($i=0;$i<10;$i++){            
            $job_admins = (new \App\Jobs\TestJob("message job admins ".$i))
                // ->delay(now())
                ->onConnection('job_admins')
                ->onQueue('job_admins');

            dispatch($job_admins);

            $job_users = (new \App\Jobs\TestJob("message job users ".$i))
                // ->delay(now())
                ->onConnection('job_users')
                ->onQueue("job_users");

            dispatch($job_users);
        }
    }
}
