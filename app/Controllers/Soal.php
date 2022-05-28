<?php

namespace App\Controllers;

use App\Models\SoalModel;

class Soal extends BaseController
{
    protected $objSoalModel;

    public function __construct()
    {
        $this->objSoalModel = new SoalModel();
    }

    public function index()
    {
        $data['soal'] = $this->objSoalModel->getAllSoal();

        echo view('soal/index', $data);
    }

    public function resultDisplay()
    {
        $this->data['cek'] = array(
            'soal1' => $this->request->getPost('soal1'),
            'soal2' => $this->request->getPost('soal2')

            // Ini untuk CI 3
            // 'soal2' => $this->input->post('soal1')
        );

        // $objSoalModel = new SoalModel();
        $this->data['hasil'] = $this->objSoalModel->getAllSoal();
        echo view('soal/hasil', $this->data);
        // $this->data['hasil'] = $this->objSoalModel->getAllSoal();
        // $this->load->view('soal/hasil', $this->data);

        // Ini untuk CI 3
        // $this->load->model('SoalModel');
        // $this->data['hasil'] = $this->objSoalModel->getAllSoal();
        // $this->load->view('soal/hasil', $this->data);

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
        $data['soal'] = $this->objSoalModel->getSoalById($id);
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
