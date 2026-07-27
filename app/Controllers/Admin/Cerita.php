<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CeritaAlumniModel;
use App\Services\AuditService;

class Cerita extends BaseController
{
    protected $ceritaModel;
    protected $auditService;

    public function __construct()
    {
        $this->ceritaModel = new CeritaAlumniModel();
        $this->auditService = new AuditService();
    }

    public function index()
    {
        $ceritaList = $this->ceritaModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'title'      => 'Kelola Cerita Alumni - Admin JALA Alumni',
            'ceritaList' => $ceritaList
        ];

        return view('admin/cerita/index', $data);
    }

    public function save()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama_alumni'        => trim($this->request->getPost('nama_alumni')),
            'judul'              => trim($this->request->getPost('judul')),
            'isi_cerita'         => trim($this->request->getPost('isi_cerita')),
            'pekerjaan_saat_ini' => trim($this->request->getPost('pekerjaan_saat_ini')),
            'nama_perusahaan'    => trim($this->request->getPost('nama_perusahaan')),
            'kejuruan'           => trim($this->request->getPost('kejuruan')),
            'tahun_pelatihan'    => $this->request->getPost('tahun_pelatihan'),
            'status_publish'     => $this->request->getPost('status_publish') ?? 'published'
        ];

        if ($id) {
            $old = $this->ceritaModel->find($id);
            $this->ceritaModel->update($id, $data);
            $this->auditService->logAction('Update Cerita Alumni', $old, $data);
            $msg = 'Cerita alumni berhasil diperbarui.';
        } else {
            $this->ceritaModel->insert($data);
            $this->auditService->logAction('Tambah Cerita Alumni', null, $data);
            $msg = 'Cerita alumni baru berhasil ditambahkan.';
        }

        return redirect()->to('/admin/cerita')->with('success', $msg);
    }

    public function delete($id)
    {
        $old = $this->ceritaModel->find($id);
        if ($old) {
            $this->ceritaModel->delete($id);
            $this->auditService->logAction('Hapus Cerita Alumni', $old, null);
        }
        return redirect()->to('/admin/cerita')->with('success', 'Cerita alumni berhasil dihapus.');
    }
}
