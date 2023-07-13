<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getMostUnluckyCustomers(int $limit = 5): Collection;
}
