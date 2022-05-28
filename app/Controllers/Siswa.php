<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $objSiswaModel;

    public function __construct()
    {
        $this->objSiswaModel = new SiswaModel();
    }

    public function index()
    {
        $data['siswa'] = $this->objSiswaModel->getAllSiswa();

        echo view('akun/siswa/index', $data);
    }

    public function create()
    {
        return view('akun/siswa/create');
    }

    public function save()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'nama' => 'required|max_length[100]',
            'username' => 'required|max_length[100]',
            'password' => 'required|max_length[100]'
        ])) {
            $this->objSiswaModel->save([
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password')
            ]);

            return redirect()->to('/siswa');
        } else return view('akun/siswa/create');
    }

    public function delete($id)
    {
        $this->objSiswaModel->delete($id);
        return redirect()->to('/siswa');
    }

    public function edit($id)
    {
        $data['siswa'] = $this->objSiswaModel->getSiswaById($id);
        return view('akun/siswa/edit', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'nama' => 'required|max_length[100]',
            'username' => 'required|max_length[100]',
            'password' => 'required|max_length[100]'
        ])) {
            $this->objSiswaModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password')
            ]);

            // Ini pergi ke controller Siswa::index
            return redirect()->to('/siswa');
        } else return redirect()->to('/siswa/edit/' . $id);
    }
}
