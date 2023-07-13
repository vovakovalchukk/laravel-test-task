<?php

namespace App\Actions\Statistic;

use App\Contracts\Actions\ActionInterface;
use App\Contracts\BookingRepositoryInterface;
use Illuminate\Support\Collection;

class Task3Action implements ActionInterface
{
    public function __construct(
        private readonly BookingRepositoryInterface $bookingRepository,
    ) {}

    public function handle(): Collection
    {
        return $this->bookingRepository->getMostUnluckyCustomers();
    }
}
