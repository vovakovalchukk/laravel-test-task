<?php

namespace App\Repositories;

use App\Contracts\Capacities\CapacityRepositoryInterface;
use App\Models\Capacity;

class CapacityRepository implements CapacityRepositoryInterface
{
    public function getAvailableDates($hotelId, $startDate, $endDate, $nights)
    {
        return Capacity::where('hotel_id', $hotelId)
            ->whereBetween('date', [$startDate, $endDate])
            ->where('capacity', '>', 0)
            ->pluck('id')
            ->toArray();
    }

    public function decrementCapacity($capacityIds)
    {
        Capacity::whereIn('id', $capacityIds)->decrement('capacity');
    }
}
