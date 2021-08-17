<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey ='idAnggota';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat', 'nim', 'fakultas', 'noTelp'];
    public function getIdAnggota($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['idAnggota' => $slug])->first();
    }
}
