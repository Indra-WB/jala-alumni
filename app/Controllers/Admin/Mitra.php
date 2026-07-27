<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MitraModel;
use App\Services\AuditService;

class Mitra extends BaseController
{
    protected $mitraModel;
    protected $auditService;

    public function __construct()
    {
        $this->mitraModel = new MitraModel();
        $this->auditService = new AuditService();
    }

    public function index()
    {
        $mitraList = $this->mitraModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'title'     => 'Kelola Mitra Industri - Admin JALA Alumni',
            'mitraList' => $mitraList
        ];

        return view('admin/mitra/index', $data);
    }

    public function save()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama_mitra'      => trim($this->request->getPost('nama_mitra')),
            'sektor_industri' => trim($this->request->getPost('sektor_industri')),
            'website'         => trim($this->request->getPost('website')),
            'deskripsi'       => trim($this->request->getPost('deskripsi')),
            'status'          => $this->request->getPost('status') ?? 'aktif'
        ];

        if ($id) {
            $old = $this->mitraModel->find($id);
            $this->mitraModel->update($id, $data);
            $this->auditService->logAction('Update Mitra Industri', $old, $data);
            $msg = 'Data mitra industri berhasil diperbarui.';
        } else {
            $this->mitraModel->insert($data);
            $this->auditService->logAction('Tambah Mitra Industri', null, $data);
            $msg = 'Mitra industri baru berhasil ditambahkan.';
        }

        return redirect()->to('/admin/mitra')->with('success', $msg);
    }

    public function delete($id)
    {
        $old = $this->mitraModel->find($id);
        if ($old) {
            $this->mitraModel->delete($id);
            $this->auditService->logAction('Hapus Mitra Industri', $old, null);
        }
        return redirect()->to('/admin/mitra')->with('success', 'Mitra industri berhasil dihapus.');
    }
}
