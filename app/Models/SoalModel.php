<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $allowedFields = [
        'soal', 'nama_latihan', 'pilihan1',
        'pilihan2', 'pilihan3', 'jawaban', 'pembahasan'
    ];

    public function getAllSoal()
    {
        return $this->findAll();
    }

    public function getSoalById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getSoalByLatihan($latihan)
    {
        return $this->where(['nama_latihan' => $latihan])->findAll();
    }
}
