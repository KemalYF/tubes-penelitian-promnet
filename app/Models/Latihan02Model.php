<?php

namespace App\Models;

use CodeIgniter\Model;

class Latihan02Model extends Model
{
    protected $table = 'latihan_02';
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
