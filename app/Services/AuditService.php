<?php

namespace App\Services;

use App\Models\AuditLogModel;

class AuditService
{
    protected $auditModel;

    public function __construct()
    {
        $this->auditModel = new AuditLogModel();
    }

    public function logAction(string $action, ?array $oldValues = null, ?array $newValues = null)
    {
        $session = session();
        $userId = $session->get('user_id');
        $username = $session->get('nama_lengkap') ?? $session->get('nik');
        $role = $session->get('role') ?? 'guest';

        $request = \Config\Services::request();

        $data = [
            'user_id'    => $userId,
            'username'   => $username,
            'role'       => $role,
            'ip_address' => $request->getIPAddress(),
            'user_agent' => substr((string) $request->getUserAgent(), 0, 255),
            'action'     => $action,
            'url'        => substr((string) $request->getUri(), 0, 255),
            'old_values' => $oldValues ? json_encode($oldValues, JSON_UNESCAPED_UNICODE) : null,
            'new_values' => $newValues ? json_encode($newValues, JSON_UNESCAPED_UNICODE) : null,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->auditModel->insert($data);
    }
}
