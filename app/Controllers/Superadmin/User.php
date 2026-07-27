<?php

namespace App\Controllers\Superadmin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Services\AuditService;

class User extends BaseController
{
    protected $userModel;
    protected $profileModel;
    protected $auditService;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->profileModel = new UserProfileModel();
        $this->auditService = new AuditService();
    }

    public function index()
    {
        $users = $this->userModel->select('users.*, user_profile.nama_lengkap, user_profile.hp')
            ->join('user_profile', 'user_profile.user_id = users.id', 'left')
            ->orderBy('users.id', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Manajemen User & Hak Akses - Super Admin',
            'users' => $users
        ];

        return view('superadmin/users/index', $data);
    }

    public function create()
    {
        $nik = trim($this->request->getPost('nik'));
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role') ?? 'admin';
        $namaLengkap = trim($this->request->getPost('nama_lengkap'));

        if ($this->userModel->where('nik', $nik)->first()) {
            return redirect()->back()->with('error', 'NIK tersebut sudah terdaftar.');
        }

        $userId = $this->userModel->insert([
            'nik'      => $nik,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role'     => $role,
            'status'   => 'aktif'
        ]);

        $this->profileModel->insert([
            'user_id'      => $userId,
            'nik'          => $nik,
            'nama_lengkap' => $namaLengkap,
            'hp'           => $this->request->getPost('hp')
        ]);

        $this->auditService->logAction('Super Admin Create User', null, ['user_id' => $userId, 'role' => $role]);

        return redirect()->to('/superadmin/users')->with('success', 'Akun pengelola baru berhasil dibuat.');
    }

    public function updateRole($id)
    {
        $role = $this->request->getPost('role');
        $status = $this->request->getPost('status');

        $old = $this->userModel->find($id);
        if ($old) {
            $this->userModel->update($id, ['role' => $role, 'status' => $status]);
            $this->auditService->logAction('Super Admin Update Role & Status User', $old, ['role' => $role, 'status' => $status]);
        }

        return redirect()->to('/superadmin/users')->with('success', 'Role/Status akun berhasil diperbarui.');
    }
}
