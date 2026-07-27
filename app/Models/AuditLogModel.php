<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditLogModel extends Model
{
    protected $table            = 'audit_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id',
        'username',
        'role',
        'ip_address',
        'user_agent',
        'action',
        'url',
        'old_values',
        'new_values',
        'created_at'
    ];

    protected $useTimestamps = false;
}
