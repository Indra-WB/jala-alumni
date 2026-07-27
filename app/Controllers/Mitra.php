<?php

namespace App\Controllers;

use App\Models\MitraModel;

class Mitra extends BaseController
{
    protected $mitraModel;

    public function __construct()
    {
        $this->mitraModel = new MitraModel();
    }

    public function index()
    {
        $mitraList = $this->mitraModel->where('status', 'aktif')->findAll();

        $data = [
            'title'     => 'Mitra Industri - JALA Alumni BLK Pasuruan',
            'mitraList' => $mitraList
        ];

        return view('public/mitra', $data);
    }
}
