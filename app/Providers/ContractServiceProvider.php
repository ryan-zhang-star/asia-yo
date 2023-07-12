<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ContractServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Contracts\CurrencyService::class, \App\Services\CurrencyService::class);
        $this->app->bind(\App\Contracts\CurrencyRepository::class, \App\Repositories\CurrencyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
