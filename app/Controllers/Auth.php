<?php

namespace App\Controllers;

use App\Services\AuthService;

class Auth extends BaseController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        if (session()->get('is_logged_in')) {
            return $this->redirectBasedOnRole(session()->get('role'));
        }

        if ($this->request->getMethod() === 'POST') {
            $nikOrEmail = $this->request->getPost('nik_or_email');
            $password = $this->request->getPost('password');

            $result = $this->authService->login($nikOrEmail, $password);
            if ($result['status']) {
                return $this->redirectBasedOnRole(session()->get('role'));
            }

            return redirect()->back()->withInput()->with('error', $result['message']);
        }

        $data = ['title' => 'Login - JALA Alumni BLK Pasuruan'];
        return view('auth/login', $data);
    }

    public function register()
    {
        if (session()->get('is_logged_in')) {
            return $this->redirectBasedOnRole(session()->get('role'));
        }

        $data = ['title' => 'Registrasi Alumni - JALA Alumni BLK Pasuruan'];
        return view('auth/register', $data);
    }

    public function checkNik()
    {
        $nik = $this->request->getPost('nik');
        $result = $this->authService->verifyNikForRegistration($nik);

        return $this->response->setJSON($result);
    }

    public function processRegister()
    {
        $input = [
            'nik'      => $this->request->getPost('nik'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        $result = $this->authService->register($input);
        if ($result['status']) {
            return redirect()->to('/alumni/dashboard')->with('success', $result['message']);
        }

        return redirect()->back()->withInput()->with('error', $result['message']);
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil keluar.');
    }

    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'superadmin':
                return redirect()->to('/superadmin/dashboard');
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'alumni':
            default:
                return redirect()->to('/alumni/dashboard');
        }
    }
}
