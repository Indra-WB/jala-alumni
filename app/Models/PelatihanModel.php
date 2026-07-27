<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $DBGroup          = 'training';
    protected $table            = 'pelatihan';
    protected $primaryKey       = 'idPelatihan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'idLembaga',
        'idProgram',
        'group',
        'quota'
    ];
}
