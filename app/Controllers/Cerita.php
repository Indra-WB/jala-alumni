<?php

namespace App\Controllers;

use App\Models\CeritaAlumniModel;

class Cerita extends BaseController
{
    protected $ceritaModel;

    public function __construct()
    {
        $this->ceritaModel = new CeritaAlumniModel();
    }

    public function index()
    {
        $ceritaList = $this->ceritaModel->where('status_publish', 'published')->orderBy('id', 'DESC')->findAll();

        $data = [
            'title'      => 'Cerita Alumni - JALA Alumni BLK Pasuruan',
            'ceritaList' => $ceritaList
        ];

        return view('public/cerita', $data);
    }
}
