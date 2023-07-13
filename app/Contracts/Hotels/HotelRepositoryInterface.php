<?php

namespace App\Contracts\Hotels;

use Illuminate\Support\Collection;

interface HotelRepositoryInterface
{
    public function getHotelsWithSmallestWeekendStays(int $limit): Collection;
    public function getAverageRejectionRatePerHotel(): Collection;
}
