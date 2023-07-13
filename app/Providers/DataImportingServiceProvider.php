<?php

namespace App\Providers;

use App\Services\BookingImportingFromCsv;
use App\Services\CapacityImportingFromCsv;
use Illuminate\Support\ServiceProvider;

class DataImportingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(\App\Contracts\BookingImportingFromCsv::class, BookingImportingFromCsv::class);
        $this->app->bind(\App\Contracts\CapacityImportingFromCsv::class, CapacityImportingFromCsv::class);
    }
}
