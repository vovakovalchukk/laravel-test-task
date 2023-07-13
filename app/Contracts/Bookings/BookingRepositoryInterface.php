<?php

namespace App\Contracts\Bookings;

use Illuminate\Support\Collection;

interface BookingRepositoryInterface
{
    public function getWithNullStatus($callback);

    public function updateStatuses($bookingIds, $status);
    public function getMostUnluckyCustomers(): Collection;
}
