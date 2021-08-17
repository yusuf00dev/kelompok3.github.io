<?php

namespace App\Controllers;
use App\Models\BukuModel;
use CodeIgniter\HTTP\Request;
class Buku extends BaseController
{
    protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }
    public function index(){
        $data = [
            'tittle' => 'Judul Komik',
            'buku'=> $this->BukuModel->getBuku(),
        ];
        return view('buku/index',$data);
    }
    public function TambahBuku(){
        $data = [
            'tittle' => 'Form tambah Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('buku/tambahbuku', $data);
    }
    public function save(){
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} Judul harus diisi.',
                    'is_unique' => '{field} Judul tidak boleh sama'
                ]
            ]
        ])) {
            // $validasi = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validasi);
            return redirect()->to('/tambah-buku')->withInput();
        }
        $this->BukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'penerbit' => $this->request->getVar('penerbit'),
            'pengarang' => $this->request->getVar('pengarang'),
            'tahun' => $this->request->getVar('tahun'),
            'stok' => $this->request->getVar('stok'),
        ]);

        return redirect()->to('/list-buku');
    }

    public function editBuku($id)
	{
        $data = [
            'tittle' => 'Form tambah Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->BukuModel->getBuku($id),
        ];
		return view('buku/editbuku',$data);
	}

    public function update($id){
        // cek judul
        $judulBuku = $this->BukuModel->getBuku($id);
        if ($judulBuku['judul'] == $this->request->getVar('judul')) {
            $rules_judul = 'required';
        } else {
            $rules_judul = 'required|is_unique[buku.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => '{field} Judul harus diisi.',
                    'is_unique' => '{field} Judul tidak boleh sama'
                ]
            ]
        ])) {
            // $validasi = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validasi);
            return redirect()->to('/Buku/editBuku/'  . $this->request->getVar('id'))->withInput();
        }
        $this->BukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'penerbit' => $this->request->getVar('penerbit'),
            'pengarang' => $this->request->getVar('pengarang'),
            'tahun' => $this->request->getVar('tahun'),
            'stok' => $this->request->getVar('stok')
        ]);
         
        return redirect()->to('/list-buku');
    }

    public function delete($id){
        $buku = $this->BukuModel->find($id);
        $this->BukuModel->delete($id);
        return redirect()->to('/list-buku');
    }
}
