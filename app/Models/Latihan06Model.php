<?php

namespace App\Models;

use CodeIgniter\Model;

class Latihan06Model extends Model
{
    protected $table = 'latihan_06';
    protected $allowedFields = [
        'soal', 'pilihan1',
        'pilihan2', 'pilihan3', 'jawaban'
    ];

    public function getAllSoal()
    {
        return $this->findAll();
    }

    public function getSoalById($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
