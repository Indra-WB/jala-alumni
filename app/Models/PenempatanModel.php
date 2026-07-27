<?php

namespace App\Models;

use CodeIgniter\Model;

class PenempatanModel extends Model
{
    protected $DBGroup          = 'training';
    protected $table            = 'penempatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'idLembaga',
        'ktp',
        'idPendaftar',
        'idGelombang',
        'idPelatihan',
        'status',
        'nama_perusahaan',
        'alamat_perusahaan',
        'jabatan',
        'awal_bekerja',
        'created_at'
    ];

    public function findByNik($nik)
    {
        return $this->where('ktp', $nik)->where('idLembaga', 4)->orderBy('id', 'DESC')->first();
    }
}
