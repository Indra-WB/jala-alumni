<?php

namespace App\Services;

use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Models\PendaftarModel;
use App\Services\AuditService;

class AuthService
{
    protected $userModel;
    protected $profileModel;
    protected $pendaftarModel;
    protected $auditService;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->profileModel = new UserProfileModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->auditService = new AuditService();
    }

    public function verifyNikForRegistration(string $nik)
    {
        $nik = trim($nik);
        if (empty($nik)) {
            return ['status' => false, 'message' => 'NIK tidak boleh kosong.'];
        }

        // Check if user already registered in JALA Alumni database
        $existingUser = $this->userModel->where('nik', $nik)->first();
        if ($existingUser) {
            return ['status' => false, 'message' => 'NIK sudah terdaftar dalam sistem JALA Alumni. Silakan login.'];
        }

        // Search in SINAKER (database lama)
        $pendaftar = $this->pendaftarModel->findByNik($nik);
        if (!$pendaftar) {
            return ['status' => false, 'message' => 'NIK tidak ditemukan dalam data alumni UPT BLK Pasuruan.'];
        }

        return [
            'status' => true,
            'data' => [
                'nik' => $pendaftar['ktp'],
                'nama' => $pendaftar['firstname'],
                'email' => $pendaftar['email'],
                'hp' => $pendaftar['hp'],
                'alamat' => $pendaftar['alamat'],
                'jurusan' => $pendaftar['jurusan']
            ]
        ];
    }

    public function register(array $inputData)
    {
        $nik = trim($inputData['nik'] ?? '');
        $password = $inputData['password'] ?? '';
        $email = trim($inputData['email'] ?? '');

        // Verify NIK in SINAKER
        $pendaftar = $this->pendaftarModel->findByNik($nik);
        if (!$pendaftar) {
            return ['status' => false, 'message' => 'NIK tidak valid atau tidak terdaftar sebagai alumni.'];
        }

        // Check duplicate
        if ($this->userModel->where('nik', $nik)->first()) {
            return ['status' => false, 'message' => 'NIK sudah terdaftar. Silakan login.'];
        }

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $userData = [
            'nik'      => $nik,
            'email'    => !empty($email) ? $email : $pendaftar['email'],
            'password' => $passwordHash,
            'role'     => 'alumni',
            'status'   => 'aktif'
        ];

        $userId = $this->userModel->insert($userData);
        if (!$userId) {
            return ['status' => false, 'message' => 'Gagal membuat akun user.'];
        }

        $profileData = [
            'user_id'      => $userId,
            'nik'          => $nik,
            'nama_lengkap' => $pendaftar['firstname'] ?? 'Alumni BLK',
            'hp'           => $pendaftar['hp'] ?? '',
            'alamat'       => $pendaftar['alamat'] ?? '',
            'bio'          => 'Alumni pelatihan UPT BLK Pasuruan.'
        ];

        $this->profileModel->insert($profileData);

        // Set session
        $session = session();
        $session->set([
            'is_logged_in' => true,
            'user_id'      => $userId,
            'nik'          => $nik,
            'nama_lengkap' => $profileData['nama_lengkap'],
            'email'        => $userData['email'],
            'role'         => 'alumni'
        ]);

        $this->auditService->logAction('Alumni Registration', null, ['user_id' => $userId, 'nik' => $nik]);

        return ['status' => true, 'message' => 'Registrasi berhasil! Selamat datang di JALA Alumni.'];
    }

    public function login(string $nikOrEmail, string $password)
    {
        $identifier = trim($nikOrEmail);
        $user = $this->userModel->where('nik', $identifier)->orWhere('email', $identifier)->first();

        if (!$user) {
            return ['status' => false, 'message' => 'NIK / Email atau Password salah.'];
        }

        if ($user['status'] !== 'aktif') {
            return ['status' => false, 'message' => 'Akun Anda sedang non-aktif. Silakan hubungi admin.'];
        }

        if (!password_verify($password, $user['password'])) {
            return ['status' => false, 'message' => 'NIK / Email atau Password salah.'];
        }

        $profile = $this->profileModel->where('user_id', $user['id'])->first();

        $session = session();
        $session->set([
            'is_logged_in' => true,
            'user_id'      => $user['id'],
            'nik'          => $user['nik'],
            'nama_lengkap' => $profile['nama_lengkap'] ?? $user['nik'],
            'email'        => $user['email'],
            'role'         => $user['role'],
            'foto'         => $profile['foto'] ?? null
        ]);

        $this->auditService->logAction('User Login', null, ['user_id' => $user['id'], 'role' => $user['role']]);

        return ['status' => true, 'user' => $user];
    }

    public function logout()
    {
        $this->auditService->logAction('User Logout');
        $session = session();
        $session->destroy();
    }
}
