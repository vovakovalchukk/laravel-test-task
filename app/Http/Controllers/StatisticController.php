<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;

class StatisticController extends Controller
{
    public function index(StatisticService $statisticService)
    {
        // @ todo кэш
        $data = $statisticService->calculate();

        return view('statistic.dashboard', compact('data'));
    }
}
