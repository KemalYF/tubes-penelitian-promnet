<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai_siswa';
    protected $allowedFields = [
        'username', 'nilai_satu', 'nilai_dua', 'nilai_tiga',
        'nilai_empat', 'nilai_lima', 'nilai_enam', 'nilai_tujuh'
    ];

    public function getAllNilai()
    {
        return $this->findAll();
    }

    public function getNilaiByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
