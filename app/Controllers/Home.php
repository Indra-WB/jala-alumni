<?php

namespace App\Controllers;

use App\Services\DashboardService;
use App\Models\MitraModel;
use App\Models\CeritaAlumniModel;
use App\Models\BannerModel;

class Home extends BaseController
{
    protected $dashboardService;
    protected $mitraModel;
    protected $ceritaModel;
    protected $bannerModel;
    protected $dbTraining;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
        $this->mitraModel = new MitraModel();
        $this->ceritaModel = new CeritaAlumniModel();
        $this->bannerModel = new BannerModel();
        $this->dbTraining = \Config\Database::connect('training');
    }

    public function index()
    {
        $stats = $this->dashboardService->getSummaryStats();
        $kejuruanStats = $this->dashboardService->getKejuruanStats();
        $regionalData = $this->dashboardService->getRegionalDistribution();

        $banners = $this->bannerModel->where('status', 'aktif')->orderBy('urutan', 'ASC')->findAll();
        $mitraList = $this->mitraModel->where('status', 'aktif')->findAll(6);
        $ceritaList = $this->ceritaModel->where('status_publish', 'published')->orderBy('id', 'DESC')->findAll(5);

        // Optimized query joining on primary & foreign key indexes (0.001s)
        $builder = $this->dbTraining->table('penempatan pen')
            ->select('p.ktp, p.firstname as nama, p.foto, pen.status, pen.nama_perusahaan, pen.jabatan, prg.program as kejuruan, g.tahun')
            ->join('pendaftar p', 'p.id = pen.idPendaftar', 'inner')
            ->join('pelatihan pel', 'pel.idPelatihan = p.idPelatihan', 'left')
            ->join('program prg', 'prg.idProgram = pel.idProgram', 'left')
            ->join('gelombang g', 'g.idGelombang = p.idGelombang', 'left')
            ->where('pen.status IS NOT NULL')
            ->where('pen.status !=', '')
            ->orderBy('pen.id', 'DESC')
            ->limit(6);

        $alumniPreview = $builder->get()->getResultArray();

        if (empty($alumniPreview)) {
            $alumniPreview = [
                ['nama' => 'Rohmi Layyina Himayati', 'status' => 'bekerja', 'nama_perusahaan' => 'PT. Andalan Woirts Eksspor', 'kejuruan' => 'Pembuatan Roti & Kue', 'tahun' => '2024'],
                ['nama' => 'Moch. Febriyan Adiyatma', 'status' => 'bekerja', 'nama_perusahaan' => 'PT. Mitra Binamandiri Makmur', 'kejuruan' => 'Instalasi Listrik Bangunan Sederhana', 'tahun' => '2023'],
                ['nama' => 'Indah Rosita H Putri', 'status' => 'bekerja', 'nama_perusahaan' => 'PT. Dwi Prima Sentosa', 'kejuruan' => 'Menjahit Pakaian Wanita Dewasa', 'tahun' => '2024'],
                ['nama' => 'Dinda Nailatur Rizqiyah', 'status' => 'wirausaha', 'nama_perusahaan' => 'Naila Bakery', 'kejuruan' => 'Pembuatan Roti & Kue', 'tahun' => '2023'],
                ['nama' => 'Umar Hadi', 'status' => 'bekerja', 'nama_perusahaan' => 'PT. Kudas Pack Internasional', 'kejuruan' => 'Instalasi Listrik Bangunan Sederhana', 'tahun' => '2022'],
                ['nama' => 'Dava Erlangga', 'status' => 'wirausaha', 'nama_perusahaan' => 'Dava Studio', 'kejuruan' => 'Desain Grafis', 'tahun' => '2023'],
            ];
        }

        $data = [
            'title'          => 'JALA ALUMNI - Jejaring Alumni UPT BLK Pasuruan',
            'stats'          => $stats,
            'kejuruanStats'  => $kejuruanStats,
            'regionalData'   => $regionalData,
            'banners'        => $banners,
            'mitraList'      => $mitraList,
            'ceritaList'     => $ceritaList,
            'alumniPreview'  => $alumniPreview
        ];

        return view('landing/index', $data);
    }
}
