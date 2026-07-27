<?php

namespace App\Controllers;

use App\Services\DashboardService;

class Statistik extends BaseController
{
    protected $dashboardService;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
    }

    public function index()
    {
        $stats = $this->dashboardService->getSummaryStats();
        $kejuruanStats = $this->dashboardService->getKejuruanStats();
        $regionalData = $this->dashboardService->getRegionalDistribution();

        $data = [
            'title'         => 'Statistik Penempatan - JALA Alumni BLK Pasuruan',
            'stats'         => $stats,
            'kejuruanStats' => $kejuruanStats,
            'regionalData'  => $regionalData
        ];

        return view('public/statistik', $data);
    }
}
