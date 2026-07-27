<?php

namespace App\Services;

use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Models\PendaftarModel;
use App\Models\PenempatanModel;
use App\Models\PelatihanModel;
use App\Models\ProgramModel;
use App\Models\GelombangModel;
use App\Services\AuditService;

class AlumniService
{
    protected $userModel;
    protected $profileModel;
    protected $pendaftarModel;
    protected $penempatanModel;
    protected $pelatihanModel;
    protected $programModel;
    protected $gelombangModel;
    protected $auditService;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->profileModel = new UserProfileModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->penempatanModel = new PenempatanModel();
        $this->pelatihanModel = new PelatihanModel();
        $this->programModel = new ProgramModel();
        $this->gelombangModel = new GelombangModel();
        $this->auditService = new AuditService();
    }

    public function getFullAlumniDataByNik(string $nik)
    {
        $user = $this->userModel->where('nik', $nik)->first();
        $profile = $user ? $this->profileModel->where('user_id', $user['id'])->first() : null;
        $pendaftar = $this->pendaftarModel->findByNik($nik);
        $penempatan = $this->penempatanModel->findByNik($nik);

        $pelatihanData = null;
        $programData = null;
        $gelombangData = null;

        if ($pendaftar && !empty($pendaftar['idPelatihan'])) {
            $pelatihanData = $this->pelatihanModel->find($pendaftar['idPelatihan']);
            if ($pelatihanData && !empty($pelatihanData['idProgram'])) {
                $programData = $this->programModel->find($pelatihanData['idProgram']);
            }
        }

        if ($pendaftar && !empty($pendaftar['idGelombang'])) {
            $gelombangData = $this->gelombangModel->find($pendaftar['idGelombang']);
        }

        return [
            'user' => $user,
            'profile' => $profile,
            'pendaftar' => $pendaftar,
            'penempatan' => $penempatan,
            'pelatihan' => $pelatihanData,
            'program' => $programData,
            'gelombang' => $gelombangData
        ];
    }

    public function updateStatusPekerjaan(string $nik, array $data)
    {
        $existingPenempatan = $this->penempatanModel->findByNik($nik);
        $pendaftar = $this->pendaftarModel->findByNik($nik);

        $oldValues = $existingPenempatan;

        $statusStr = strtolower($data['status'] ?? 'belum_bekerja');
        if (in_array($statusStr, ['bekerja', 'wirausaha', 'belum_bekerja'])) {
            // keep as is
        } elseif ($statusStr == '1' || $statusStr == 'karyawan') {
            $statusStr = 'bekerja';
        } else {
            $statusStr = 'belum_bekerja';
        }

        $penempatanData = [
            'ktp'               => $nik,
            'idPendaftar'       => $pendaftar['id'] ?? null,
            'idGelombang'       => $pendaftar['idGelombang'] ?? null,
            'idPelatihan'       => $pendaftar['idPelatihan'] ?? null,
            'status'            => $statusStr,
            'nama_perusahaan'   => trim($data['nama_perusahaan'] ?? ''),
            'alamat_perusahaan' => trim($data['alamat_perusahaan'] ?? ''),
            'jabatan'           => trim($data['jabatan'] ?? ''),
            'awal_bekerja'      => !empty($data['awal_bekerja']) ? $data['awal_bekerja'] : date('Y-m-d'),
            'created_at'        => date('Y-m-d H:i:s')
        ];

        if ($existingPenempatan) {
            $this->penempatanModel->update($existingPenempatan['id'], $penempatanData);
            $newPenempatanId = $existingPenempatan['id'];
        } else {
            $newPenempatanId = $this->penempatanModel->insert($penempatanData);
        }

        $this->auditService->logAction('Update Status Pekerjaan Alumni', $oldValues, $penempatanData);

        return ['status' => true, 'message' => 'Status pekerjaan alumni berhasil diperbarui.'];
    }

    public function updateProfile(int $userId, array $data)
    {
        $profile = $this->profileModel->where('user_id', $userId)->first();
        if (!$profile) {
            return ['status' => false, 'message' => 'Profil alumni tidak ditemukan.'];
        }

        $oldValues = $profile;
        $updateData = [
            'nama_lengkap' => trim($data['nama_lengkap'] ?? $profile['nama_lengkap']),
            'hp'           => trim($data['hp'] ?? $profile['hp']),
            'alamat'       => trim($data['alamat'] ?? $profile['alamat']),
            'bio'          => trim($data['bio'] ?? $profile['bio'])
        ];

        if (isset($data['foto']) && !empty($data['foto'])) {
            $updateData['foto'] = $data['foto'];
        }

        $this->profileModel->update($profile['id'], $updateData);
        $this->auditService->logAction('Update Profile Alumni', $oldValues, $updateData);

        return ['status' => true, 'message' => 'Profil berhasil diperbarui.'];
    }

    public function changePassword(int $userId, string $oldPassword, string $newPassword)
    {
        $user = $this->userModel->find($userId);
        if (!$user) {
            return ['status' => false, 'message' => 'User tidak ditemukan.'];
        }

        if (!password_verify($oldPassword, $user['password'])) {
            return ['status' => false, 'message' => 'Password lama salah.'];
        }

        $newHash = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->userModel->update($userId, ['password' => $newHash]);

        $this->auditService->logAction('Change Password User', null, ['user_id' => $userId]);

        return ['status' => true, 'message' => 'Password berhasil diubah.'];
    }
}
