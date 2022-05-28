<?php

namespace App\Controllers;

use App\Models\Latihan08Model;

class Latihan08 extends BaseController
{
    protected $objSoalModel;

    public function __construct()
    {
        $this->objSoalModel = new Latihan08Model();
    }

    public function index()
    {
        $data['soal'] = $this->objSoalModel->getAllSoal();

        echo view('soal/index', $data);
    }

    public function create()
    {
        return view('soal/create');
    }

    public function save()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'soal' => 'required|max_length[100]',
            'pilihan1' => 'required',
            'pilihan2' => 'required',
            'pilihan3' => 'required',
            'jawaban' => 'required'
        ])) {
            $this->objSoalModel->save([
                'soal' => $this->request->getVar('soal'),
                'pilihan1' => $this->request->getVar('pilihan1'),
                'pilihan2' => $this->request->getVar('pilihan2'),
                'pilihan3' => $this->request->getVar('pilihan3'),
                'jawaban' => $this->request->getVar('jawaban'),
            ]);

            return redirect()->to('/soal');
        } else return view('soal/create');
    }

    public function delete($id)
    {
        $this->objSoalModel->delete($id);
        return redirect()->to('/soal');
    }

    public function edit($id)
    {
        $data['soal'] = $this->objSoalModel->getSiswaById($id);
        return view('soal/edit', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'soal' => 'required|max_length[100]',
            'pilihan1' => 'required',
            'pilihan2' => 'required',
            'pilihan3' => 'required',
            'jawaban' => 'required'
        ])) {
            $this->objSoalModel->save([
                'id' => $id,
                'soal' => $this->request->getVar('soal'),
                'pilihan1' => $this->request->getVar('pilihan1'),
                'pilihan2' => $this->request->getVar('pilihan2'),
                'pilihan3' => $this->request->getVar('pilihan3'),
                'jawaban' => $this->request->getVar('jawaban'),
            ]);

            // Ini pergi ke controller Soal::index
            return redirect()->to('/soal');
        } else return redirect()->to('/soal/edit/' . $id);
    }
}
