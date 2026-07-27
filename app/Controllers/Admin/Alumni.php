<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\AlumniService;

class Alumni extends BaseController
{
    protected $alumniService;
    protected $dbTraining;

    public function __construct()
    {
        $this->alumniService = new AlumniService();
        $this->dbTraining = \Config\Database::connect('training');
    }

    public function index()
    {
        $search = $this->request->getGet('q');

        $builder = $this->dbTraining->table('pendaftar p')
            ->select('p.id, p.ktp, p.firstname as nama, p.hp, p.email, pen.status, pen.nama_perusahaan, pen.jabatan, prg.program as kejuruan')
            ->join('penempatan pen', 'pen.idPendaftar = p.id AND pen.idLembaga = 4', 'left')
            ->join('pelatihan pel', 'pel.idPelatihan = p.idPelatihan', 'left')
            ->join('program prg', 'prg.idProgram = pel.idProgram', 'left')
            ->where('p.idLembaga', 4);

        if (!empty($search)) {
            $builder->groupStart()
                ->like('p.firstname', $search)
                ->orLike('p.ktp', $search)
                ->orLike('prg.program', $search)
                ->groupEnd();
        }

        $alumniList = $builder->orderBy('p.id', 'DESC')->limit(50)->get()->getResultArray();

        $data = [
            'title'      => 'Kelola Alumni - Admin JALA Alumni',
            'alumniList' => $alumniList,
            'search'     => $search
        ];

        return view('admin/alumni/index', $data);
    }

    public function detail($nik)
    {
        $alumniData = $this->alumniService->getFullAlumniDataByNik($nik);

        $data = [
            'title'      => 'Detail Alumni - ' . $nik,
            'alumniData' => $alumniData
        ];

        return view('admin/alumni/detail', $data);
    }
}
