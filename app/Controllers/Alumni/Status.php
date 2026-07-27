<?php

namespace App\Controllers\Alumni;

use App\Controllers\BaseController;
use App\Services\AlumniService;

class Status extends BaseController
{
    protected $alumniService;

    public function __construct()
    {
        $this->alumniService = new AlumniService();
    }

    public function index()
    {
        $nik = session()->get('nik');
        $alumniData = $this->alumniService->getFullAlumniDataByNik($nik);

        $data = [
            'title'      => 'Update Status Pekerjaan - JALA Alumni BLK Pasuruan',
            'alumniData' => $alumniData
        ];

        return view('alumni/status', $data);
    }

    public function update()
    {
        $nik = session()->get('nik');
        $input = [
            'status'            => $this->request->getPost('status'),
            'nama_perusahaan'   => $this->request->getPost('nama_perusahaan'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'alamat_perusahaan' => $this->request->getPost('alamat_perusahaan'),
            'awal_bekerja'      => $this->request->getPost('awal_bekerja')
        ];

        $result = $this->alumniService->updateStatusPekerjaan($nik, $input);
        if ($result['status']) {
            return redirect()->to('/alumni/dashboard')->with('success', $result['message']);
        }

        return redirect()->back()->withInput()->with('error', $result['message']);
    }
}
