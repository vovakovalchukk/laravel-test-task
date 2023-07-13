<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface HotelRepositoryInterface
{
    public function getHotelsWithSmallestWeekendStays(int $limit): Collection;
    public function getAverageRejectionRatePerHotel(): Collection;
}
