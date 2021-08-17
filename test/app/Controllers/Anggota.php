<?php

namespace App\Controllers;
use App\Models\AnggotaModel;
use CodeIgniter\HTTP\Request;
class Anggota extends BaseController
{
	protected $AnggotaModel;
    public function __construct()
    {
        $this->AnggotaModel = new AnggotaModel();
    }
	public function index()
	{
		$data = [
            'tittle' => 'Judul Komik',
            'anggota'=> $this->AnggotaModel->getIdAnggota(),
        ];
		return view('anggota/index',$data);
	}
	
	public function daftarAnggota()
	{
		$data = [
            'tittle' => 'Form tambah Buku',
            'validation' => \Config\Services::validation()
        ];
		return view('anggota/daftaranggota',$data);
	}

	public function save(){
		if (!$this->validate([
            'nim' => [
                'rules' => 'required|is_unique[anggota.nim]',
                'errors' => [
                    'required' => '{field} nim harus diisi.',
                    'is_unique' => '{field} nim tidak boleh sama'
                ]
            ]
        ])) {
            // $validasi = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validasi);
            return redirect()->to('/daftar-anggota')->withInput();
        }
		$this->AnggotaModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'nim' => $this->request->getVar('nim'),
            'fakultas' => $this->request->getVar('fakultas'),
            'noTelp' => $this->request->getVar('noTelp'),
        ]);

        return redirect()->to('/list-angota');
	}

	public function editAnggota($id){
		$data = [
            'tittle' => 'Form tambah Buku',
            'validation' => \Config\Services::validation(),
			'anggota' => $this->AnggotaModel->getIdAnggota($id),
        ];
		return view('anggota/editanggota',$data);
	}
	public function update($id){
		$namaanggota = $this->AnggotaModel->getIdAnggota($id);
        if ($namaanggota['nim'] == $this->request->getVar('nim')) {
            $rules_judul = 'required';
        } else {
            $rules_judul = 'required|is_unique[buku.judul]';
        }
		if (!$this->validate([
            'nim' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => '{field} nim harus diisi.',
                    'is_unique' => '{field} nim tidak boleh sama'
                ]
            ]
        ])) {
            // $validasi = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validasi);
            return redirect()->to('/Anggota/editAnggota/'  . $this->request->getVar('idAnggota'))->withInput();
        }
		$this->AnggotaModel->save([
			'idAnggota' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'nim' => $this->request->getVar('nim'),
            'fakultas' => $this->request->getVar('fakultas'),
            'noTelp' => $this->request->getVar('noTelp'),
        ]);

        return redirect()->to('/list-angota');
	}
	public function delete($id){
        $buku = $this->AnggotaModel->find($id);
        $this->AnggotaModel->delete($id);
        return redirect()->to('/list-angota');
    }
}
