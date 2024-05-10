<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear cache, view, route, config and run migrations';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Clear cache
        Artisan::call('cache:clear');

        // Clear view cache
        Artisan::call('view:clear');

        // Clear route cache
        Artisan::call('route:clear');

        // Clear config cache
        Artisan::call('config:clear');
        Artisan::call('optimize');
        // Run migrations
        Artisan::call('migrate', ['--force' => true]);


        $this->info('All caches cleared, and migrations run successfully.');

        return 0;
    }
}
