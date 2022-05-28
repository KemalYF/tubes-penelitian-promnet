<?php

namespace App\Models;

use CodeIgniter\Model;

class Latihan11Model extends Model
{
    protected $table = 'latihan_11';
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
