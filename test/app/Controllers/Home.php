<?php

namespace App\Controllers;
use App\Models\BukuModel;
use CodeIgniter\HTTP\Request;
class Home extends BaseController
{
	protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }
	public function index()
	{
		$data = [
            'tittle' => 'Judul Komik',
            'buku'=> $this->BukuModel->getBuku(),
        ];
		return view('beranda',$data);
	}
}
