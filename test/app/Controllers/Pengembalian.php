<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\AnggotaModel;
use App\Models\ProsesPeminjaman;
use App\Models\ProsesPengembalian;
use CodeIgniter\HTTP\Request;
class Pengembalian extends BaseController
{
	protected $BukuModel;
	protected $AnggotaModel;
	protected $ProsesPeminjaman;
	protected $ProsesPengembalian;

    public function __construct()
    {
        $this->BukuModel = new BukuModel();
		$this->AnggotaModel = new AnggotaModel();
		$this->ProsesPeminjaman = new ProsesPeminjaman();
		$this->ProsesPengembalian = new ProsesPengembalian();
    }
	public function index()
	{
		$data = [
            'tittle' => 'Pengembalian',
            'prosespinjam'=> $this->ProsesPengembalian->getPeminjaman(),
        ];
		return view('pinjaman/index',$data);
	}
    public function save(){
        // d($this->request->getVar('idpeminjaman'));
        // d($this->request->getVar('stok'));
        // d($this->request->getVar('judulbuku'));
        // d($this->request->getVar('namapeminjam'));
        // d($this->request->getVar('tglPeminjaman'));
        // d($this->request->getVar('tglExpPengembalian'));
        // d($this->request->getVar('tglPengembalian'));
        
        $stokSk = $this->BukuModel->getBuku($this->request->getVar('idbuku'));
        $stokFs= $stokSk['stok'] + 1;
        $this->BukuModel->save([
            'id' => $this->request->getVar('idbuku'),
            'stok' => $stokFs,
        ]);
        $this->ProsesPeminjaman->delete($this->request->getVar('idpeminjaman'));

        $this->ProsesPengembalian->save([
            'judulbuku' => $this->request->getVar('judulbuku'),
            'namapeminjam' => $this->request->getVar('namapeminjam'),
            'tglPeminjaman' => $this->request->getVar('tglPeminjaman'),
            'tglExpPengembalian' => $this->request->getVar('tglExpPengembalian'),
            'tglPengembalian' => $this->request->getVar('tglPengembalian'),
        ]);
        return redirect()->to('/pinjaman/pengembalian');
    }
}
