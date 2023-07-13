<?php

namespace App\Services\Statistic;

use App\Actions\Statistic\Task1Action;
use App\Actions\Statistic\Task2Action;
use App\Actions\Statistic\Task3Action;

class StatisticService
{
    public function __construct(
        private readonly Task1Action $task1,
        private readonly Task2Action $task2,
        private readonly Task3Action $task3,
    ) {}

    public function calculate(): array
    {
        return [
            "{$this->task1->getName()}" => $this->task1->handle()->toArray(),
            "{$this->task2->getName()}" => $this->task2->handle()->toArray(),
            "{$this->task3->getName()}" => $this->task3->handle()->toArray(),
        ];
    }
}
