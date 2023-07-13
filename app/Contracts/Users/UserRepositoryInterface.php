<?php

namespace App\Contracts\Users;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getMostUnluckyCustomers(int $limit = 5): Collection;
}
