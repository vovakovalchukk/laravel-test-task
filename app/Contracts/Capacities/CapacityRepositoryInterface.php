<?php

namespace App\Contracts\Capacities;

interface CapacityRepositoryInterface
{
    public function getAvailableDates($hotelId, $startDate, $endDate, $nights);
    public function decrementCapacity($capacityIds);
}
