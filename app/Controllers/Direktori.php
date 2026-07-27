<?php

namespace App\Controllers;

use App\Models\PendaftarModel;

class Direktori extends BaseController
{
    protected $dbTraining;

    public function __construct()
    {
        $this->dbTraining = \Config\Database::connect('training');
    }

    public function index()
    {
        $status = $this->request->getGet('status');
        $kejuruan = $this->request->getGet('kejuruan');
        $search = $this->request->getGet('q');

        $builder = $this->dbTraining->table('penempatan pen')
            ->select('p.ktp, p.firstname as nama, p.foto, pen.status, pen.nama_perusahaan, pen.jabatan, prg.program as kejuruan, g.tahun')
            ->join('pendaftar p', 'p.id = pen.idPendaftar', 'inner')
            ->join('pelatihan pel', 'pel.idPelatihan = p.idPelatihan', 'left')
            ->join('program prg', 'prg.idProgram = pel.idProgram', 'left')
            ->join('gelombang g', 'g.idGelombang = p.idGelombang', 'left')
            ->where('pen.idLembaga', 4);

        if (!empty($status)) {
            $builder->where('pen.status', $status);
        } else {
            $builder->where('pen.status IS NOT NULL')->where('pen.status !=', '');
        }

        if (!empty($search)) {
            $builder->groupStart()
                ->like('p.firstname', $search)
                ->orLike('prg.program', $search)
                ->orLike('pen.nama_perusahaan', $search)
                ->groupEnd();
        }

        $alumniList = $builder->orderBy('pen.id', 'DESC')->limit(24)->get()->getResultArray();

        $data = [
            'title'       => 'Direktori Alumni - JALA Alumni BLK Pasuruan',
            'alumniList'  => $alumniList,
            'search'      => $search,
            'status'      => $status,
            'kejuruan'    => $kejuruan
        ];

        return view('public/direktori', $data);
    }
}
