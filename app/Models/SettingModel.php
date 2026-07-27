<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'key_name',
        'key_value',
        'group_name',
        'description',
        'updated_at'
    ];

    protected $useTimestamps = false;
}
