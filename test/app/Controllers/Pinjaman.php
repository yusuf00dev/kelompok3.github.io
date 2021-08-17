<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\AnggotaModel;
use App\Models\ProsesPeminjaman;
use CodeIgniter\HTTP\Request;
use Config\Database;

class Pinjaman extends BaseController
{
	protected $BukuModel;
	protected $AnggotaModel;
	protected $ProsesPeminjaman;

    public function __construct()
    {
        $this->BukuModel = new BukuModel();
		$this->AnggotaModel = new AnggotaModel();
		$this->ProsesPeminjaman = new ProsesPeminjaman();
    }
	public function index()
	{
		return view('pinjaman/index');
	}
	public function prosespinjam($id){
		$data = [
            'tittle' => 'Form tambah Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->BukuModel->getBuku($id),
			'anggota'=> $this->AnggotaModel->getIdAnggota(),
        ];
		return view('pinjaman/prosespinjam',$data);
	}

	public function simpanPeminjam(){
		if (!$this->validate([
            'nim' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} nim harus diisi.'
					]
				],
			'tahun' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tahun harus diisi.'
					]
				]
        ])) {
            // $validasi = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validasi);
            return redirect()->to('/Pinjaman/prosespinjam/'  . $this->request->getVar('idpeminjaman'))->withInput();
        }

		// update Stok buku
		$stokSk = $this->BukuModel->getBuku($this->request->getVar('idbuku'));
		$stokFs= $stokSk['stok'] - 1;
        $this->BukuModel->save([
            'id' => $this->request->getVar('idbuku'),
            'stok' => $stokFs,
        ]);

		$tahunpinjam = $this->request->getVar('tahun');
		$tglKembali = date('Y-m-d', strtotime('+7 days', strtotime($tahunpinjam)));
		$this->ProsesPeminjaman->save([
            'idbuku' => $this->request->getVar('idbuku'),
            'idanggota' => $this->request->getVar('nim'),
            'tglPeminjaman' => $this->request->getVar('tahun'),
            'tglPengembalian' => $tglKembali,
        ]);
         
        return redirect()->to('/pinjaman/pengembalian');
	}

	public function pengembalian(){
		date_default_timezone_set("Asia/Jakarta");
		// dd(date("Y-m-d"));
		$data = [
            'tittle' => 'Pengembalian',
            'prosespinjam'=> $this->ProsesPeminjaman->getPeminjaman(),
			'hariIni' => date("Y-m-d"),
        ];
		return view('pinjaman/pengembalian',$data);
	}
	public function hapus($id){
		$this->BukuModel->delete($id);
        return redirect()->to('/pinjaman/pengembalian');
	}
}
