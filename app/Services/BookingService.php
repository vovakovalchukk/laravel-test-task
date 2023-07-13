<?php

namespace App\Services;

use App\Actions\Bookings\updateStatusesAction;
use Illuminate\Support\Facades\DB;

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
