<?php

namespace App\Models;

use CodeIgniter\Model;

class GelombangModel extends Model
{
    protected $DBGroup          = 'training';
    protected $table            = 'gelombang';
    protected $primaryKey       = 'idGelombang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'idLembaga',
        'tahun',
        'periode_awal',
        'periode_akhir',
        'tahap',
        'status'
    ];
}
