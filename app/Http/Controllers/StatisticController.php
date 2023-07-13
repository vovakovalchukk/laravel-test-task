<?php

namespace App\Http\Controllers;

use App\Services\Statistic\StatisticService;

class StatisticController extends Controller
{
    public function index(StatisticService $statisticService)
    {
        $data = $statisticService->calculate();

        return view('statistic.dashboard', compact('data'));
    }
}
