<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $DBGroup          = 'training';
    protected $table            = 'program';
    protected $primaryKey       = 'idProgram';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'program',
        'kode',
        'jp'
    ];
}
