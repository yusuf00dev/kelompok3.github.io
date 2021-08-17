<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesPeminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey ='idpeminjaman';
    protected $useTimestamps = true;
    protected $allowedFields = ['idpeminjaman', 'idbuku', 'idanggota', 'tglPeminjaman', 'tglPengembalian'];
    public function getPeminjaman($slug = false)
    {
        if ($slug == false) {
            return $this->join('buku','buku.id=peminjaman.idbuku')->join('anggota', 'anggota.idAnggota=peminjaman.idanggota')->findAll();
        }
        return $this->join('buku','buku.id=peminjaman.idbuku')->join('anggota', 'anggota.idAnggota=peminjaman.idanggota')->where(['idpeminjaman' => $slug])->getResultArray();
    }

}
