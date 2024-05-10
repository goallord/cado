<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('hasActiveTask', function () {
            return Task::where('user_id', auth()->user()->id)->where('status', 'active')->exists();
        });
    }
}
