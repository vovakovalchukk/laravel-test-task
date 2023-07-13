<?php

namespace App\Services\Bookings;

use App\Actions\Bookings\updateStatusesAction;

class BookingService
{
    public function __construct(
        private readonly updateStatusesAction $updateStatuses,
    ) {}

    public function updateStatuses(): void
    {
        $this->updateStatuses->handle();
    }
    public function calculate()
    {

    }
}
