<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AuditLogModel;

class AuditLog extends BaseController
{
    protected $auditModel;

    public function __construct()
    {
        $this->auditModel = new AuditLogModel();
    }

    public function index()
    {
        $logs = $this->auditModel->orderBy('id', 'DESC')->limit(100)->findAll();

        $data = [
            'title' => 'Audit Log Sistem - Admin JALA Alumni',
            'logs'  => $logs
        ];

        return view('admin/auditlog/index', $data);
    }
}
