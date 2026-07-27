<?php

namespace App\Controllers\Alumni;

use App\Controllers\BaseController;
use App\Services\AlumniService;

class Dashboard extends BaseController
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
            'title'      => 'Dashboard Alumni - JALA Alumni BLK Pasuruan',
            'alumniData' => $alumniData
        ];

        return view('alumni/dashboard', $data);
    }
}
