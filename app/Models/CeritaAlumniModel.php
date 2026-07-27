<?php

namespace App\Models;

use CodeIgniter\Model;

class CeritaAlumniModel extends Model
{
    protected $table            = 'cerita_alumni';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id',
        'nama_alumni',
        'foto',
        'judul',
        'isi_cerita',
        'pekerjaan_saat_ini',
        'nama_perusahaan',
        'kejuruan',
        'tahun_pelatihan',
        'status_publish',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
