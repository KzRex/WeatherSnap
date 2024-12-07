<?php

namespace App\Providers;

use App\Contracts\WeatherServiceInterface;
use App\Services\WeatherService;
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
        $this->app->bind(WeatherServiceInterface::class, WeatherService::class);
    }
}
