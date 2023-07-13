<?php

namespace App\Actions\Statistic;

use App\Contracts\Actions\ActionInterface;
use App\Contracts\Hotels\HotelRepositoryInterface;
use App\Contracts\Tasks\TaskInterface;
use Illuminate\Support\Collection;

class Task1Action implements ActionInterface, TaskInterface
{
    public function __construct(
        private readonly HotelRepositoryInterface $hotelRepository,
    ) {}

    public function handle(): Collection
    {
        return $this->hotelRepository->getHotelsWithSmallestWeekendStays();
    }

    public function getName(): string {
        return 'task1';
    }
}
