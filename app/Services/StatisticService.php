<?php

namespace App\Services;

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
        $generator = $this->generate();

        $data = [];

        foreach ($generator as $key => $result) {
            $data[$key] = $result;
        }

        return $data;
    }

    private function generate(): \Generator
    {
        yield 'task1' => iterator_to_array($this->task1->handle());
        yield 'task2' => iterator_to_array($this->task2->handle());
        yield 'task3' => iterator_to_array($this->task3->handle());
    }
}
