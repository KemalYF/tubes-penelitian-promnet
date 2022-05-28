<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'akun_siswa';
    protected $allowedFields = ['nama', 'username', 'password'];

    public function getAllSiswa()
    {
        return $this->findAll();
    }

    public function getSiswaById($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
