<?php

namespace App\Contracts;

use App\Models\Booking;

interface CapacityRepositoryInterface
{
    public function getAvailableDates($hotelId, $startDate, $endDate, $nights);
    public function decrementCapacity($capacityIds);
}
