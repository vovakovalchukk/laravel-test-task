<?php

namespace App\Providers;

use App\Contracts\Bookings\BookingRepositoryInterface;
use App\Contracts\Capacities\CapacityRepositoryInterface;
use App\Contracts\Hotels\HotelRepositoryInterface;
use App\Contracts\Users\UserRepositoryInterface;
use App\Repositories\BookingRepository;
use App\Repositories\CapacityRepository;
use App\Repositories\HotelRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(HotelRepositoryInterface::class, HotelRepository::class);
        $this->app->bind(CapacityRepositoryInterface::class, CapacityRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }
}
