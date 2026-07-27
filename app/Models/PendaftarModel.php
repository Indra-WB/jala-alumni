<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $DBGroup          = 'training';
    protected $table            = 'pendaftar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'ktp',
        'firstname',
        'email',
        'hp',
        'alamat',
        'pendidikan',
        'jurusan',
        'asalsekolah',
        'foto',
        'idGelombang',
        'idPelatihan',
        'status',
        'StatusPelatihan',
        'noSertifikat'
    ];

    public function findByNik($nik)
    {
        return $this->where('ktp', $nik)->first();
    }
}
