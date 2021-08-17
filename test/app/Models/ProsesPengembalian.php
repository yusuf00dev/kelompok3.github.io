<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesPengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $primaryKey ='idpengembalian';
    protected $useTimestamps = true;
    protected $allowedFields = ['judulbuku', 'namapeminjam', 'tglPeminjaman', 'tglExpPengembalian', 'tglPengembalian'];
    public function getPeminjaman($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['idpengembalian' => $slug])->first();
    }
    
}
