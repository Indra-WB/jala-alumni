<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\DashboardService;
use App\Models\AuditLogModel;

class Dashboard extends BaseController
{
    protected $dashboardService;
    protected $auditModel;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
        $this->auditModel = new AuditLogModel();
    }

    public function index()
    {
        $stats = $this->dashboardService->getSummaryStats();
        $recentLogs = $this->auditModel->orderBy('id', 'DESC')->findAll(10);

        $data = [
            'title'      => 'Admin Dashboard - JALA Alumni BLK Pasuruan',
            'stats'      => $stats,
            'recentLogs' => $recentLogs
        ];

        return view('admin/dashboard', $data);
    }
}
