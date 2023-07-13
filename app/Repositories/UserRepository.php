<?php

namespace App\Repositories;

use App\Contracts\Users\UserRepositoryInterface;
use App\Models\User;
use App\Services\Bookings\BookingService;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private readonly BookingService $bookingService
    ) {}

    public function getMostUnluckyCustomers(int $limit = 5): Collection
    {
        $usersWithRejections = collect();

        User::query()->withCount('bookings')
            ->each(function ($user) use ($usersWithRejections) {
                    $rejectionCount = $user->bookings->reject(function ($booking) {
                        return $this->bookingService->isBookingAccepted($booking);
                    })->count();

                    $usersWithRejections->push([
                        'user_name' => $user->name,
                        'rejection_count' => $rejectionCount,
                    ]);
                }, 20);

        return $usersWithRejections
            ->sortByDesc('rejection_count')
            ->take($limit);
    }
}
