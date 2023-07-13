<?php

namespace App\Actions\Statistic;

use App\Contracts\Actions\ActionInterface;
use App\Contracts\HotelRepositoryInterface;
use Illuminate\Support\Collection;

class Task2Action implements ActionInterface
{
    public function __construct(
        private readonly HotelRepositoryInterface $hotelRepository,
    ) {}

    public function handle(): Collection
    {
        return $this->hotelRepository->getAverageRejectionRatePerHotel();
    }
}
