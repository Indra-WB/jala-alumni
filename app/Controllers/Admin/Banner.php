<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Services\AuditService;

class Banner extends BaseController
{
    protected $bannerModel;
    protected $auditService;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
        $this->auditService = new AuditService();
    }

    public function index()
    {
        $banners = $this->bannerModel->orderBy('urutan', 'ASC')->findAll();

        $data = [
            'title'   => 'Kelola Banner Hero - Admin JALA Alumni',
            'banners' => $banners
        ];

        return view('admin/banner/index', $data);
    }

    public function save()
    {
        $id = $this->request->getPost('id');
        $data = [
            'judul'    => trim($this->request->getPost('judul')),
            'subjudul' => trim($this->request->getPost('subjudul')),
            'gambar'   => trim($this->request->getPost('gambar') ?? 'hero-banner.png'),
            'link'     => trim($this->request->getPost('link')),
            'urutan'   => (int) $this->request->getPost('urutan'),
            'status'   => $this->request->getPost('status') ?? 'aktif'
        ];

        if ($id) {
            $old = $this->bannerModel->find($id);
            $this->bannerModel->update($id, $data);
            $this->auditService->logAction('Update Banner Hero', $old, $data);
            $msg = 'Banner hero berhasil diperbarui.';
        } else {
            $this->bannerModel->insert($data);
            $this->auditService->logAction('Tambah Banner Hero', null, $data);
            $msg = 'Banner hero baru berhasil ditambahkan.';
        }

        return redirect()->to('/admin/banner')->with('success', $msg);
    }

    public function delete($id)
    {
        $old = $this->bannerModel->find($id);
        if ($old) {
            $this->bannerModel->delete($id);
            $this->auditService->logAction('Hapus Banner Hero', $old, null);
        }
        return redirect()->to('/admin/banner')->with('success', 'Banner hero berhasil dihapus.');
    }
}
