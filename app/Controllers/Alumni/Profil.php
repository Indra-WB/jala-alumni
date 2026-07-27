<?php

namespace App\Controllers\Alumni;

use App\Controllers\BaseController;
use App\Services\AlumniService;

class Profil extends BaseController
{
    protected $alumniService;

    public function __construct()
    {
        $this->alumniService = new AlumniService();
    }

    public function index()
    {
        $nik = session()->get('nik');
        $alumniData = $this->alumniService->getFullAlumniDataByNik($nik);

        $data = [
            'title'      => 'Profil Alumni - JALA Alumni BLK Pasuruan',
            'alumniData' => $alumniData
        ];

        return view('alumni/profil', $data);
    }

    public function update()
    {
        $userId = session()->get('user_id');
        $input = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'hp'           => $this->request->getPost('hp'),
            'alamat'       => $this->request->getPost('alamat'),
            'bio'          => $this->request->getPost('bio')
        ];

        // Image upload handling
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/profile', $newName);
            $input['foto'] = $newName;
        }

        $result = $this->alumniService->updateProfile($userId, $input);
        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->withInput()->with('error', $result['message']);
    }

    public function updatePassword()
    {
        $userId = session()->get('user_id');
        $oldPass = $this->request->getPost('old_password');
        $newPass = $this->request->getPost('new_password');

        $result = $this->alumniService->changePassword($userId, $oldPass, $newPass);
        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', $result['message']);
    }
}
