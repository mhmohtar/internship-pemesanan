<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    // koneksi ke database
    public function __construct(){
        $model = new AuthModel();
        $this->helpers = ['form', 'url'];   
    }
    
    public function index(){
        echo view('login');
    }
    public function daftarAdmin(){
        echo view('daftar');
    }
   
    public function dashboard(){
        $model = new AuthModel();
        echo view("layout/header");
        echo view('admin/dashboard');
        echo view("layout/footer");
    }
    public function tabelKonfirmasi(){
        $model = new AuthModel();
        echo view("layout/header");
        $data = [
            'judul' => 'Data Tabel Konfirmasi pesanan',
            'konfirmasip' => $model->statusPemesanan()
        ];
        echo view('admin/tbl_konfirmasip',$data);
        echo view("layout/footer");
    }
    public function dataKendaraan(){
        $model = new AuthModel();
        echo view("layout/header");
        $data = [
            'judul' => 'Data Tabel Konfirmasi pesanan',
            'kendaraan' => $model->dataKendaraan()
        ];
        echo view('admin/tbl_kendaraan',$data);
        echo view("layout/footer");
    }
    public function tambahPemesanan(){
        echo view("layout/header");
        echo view('admin/tmbh_pemesanan');
        echo view("layout/footer");
    }
    public function tambahPegawai(){
        echo view("layout/header");
        echo view('admin/tmbh_pegawai');
        echo view("layout/footer");
    }
    public function viewPegawai(){
        $model = new AuthModel();
        echo view("layout/header");
        $data = [
            'judul' => "Lihat Data Pegawai",
            'pegawai' => $model->viewPegawai()
        ];
        echo view('admin/tbl_pegawai', $data);
        echo view("layout/footer");
    }
    public function tambahKendaraan(){
        echo view("layout/header");
        echo view('admin/tmbh_kendaraan');  
        echo view("layout/footer");
    }
    public function viewDataPemesanan(){
        $model = new AuthModel();
        echo view("layout/header");
        $data = [
            'judul' => "Lihat Data Pemesanan",
            'pesanan' => $model->viewDataPemesanan()
        ];
        echo view('admin/tbl_pemesanan', $data);
        echo view("layout/footer");
    }
    // crud 
    public function konfirmasiPemesanan($id){
        $model = new AuthModel();
        // echo  $this->request->getPost('id_pesanan');
        $data = $model->konfirmasiPesanan($id);
        if($data){
            echo "sukses proses peminjaman";
        }else{
            echo "gagal proses peminjaman";
        }
    }
    // simpan pemesanan
    public function simpanPemesanan(){
        $this->session = \Config\Services::session();
        $model = new AuthModel();
        $data = [
			'id_pegawai'          => $this->request->getPost('idpegawai'),
			'id_nopol_kendaraan'  => $this->request->getPost('nopol'),
			'tgl_pemesanan'       => date('Y-m-d'),
			'statusp'             => 0
		];
        $result = $model->simpanPemesanan($data);
        if($result){
            $id = $this->request->getPost('nopol');
            $model->setStatusKendaraan($id);
            $this->session->setFlashdata('pesan','Pemesanan Selesai Diproses');
            return redirect()->to(base_url('tambah-pemesanan'));
        }else{
            $this->session->setFlashdata('pesan','Pemesanan Selesai Diproses');
            return redirect()->to(base_url('tambah-pemesanan'));
        }
        // print_r($data);
        
    }
    // simpan login
    public function cekLogin(){
        // https://ahmadsufyan.my.id/form-login-ci4/
        $this->session = \Config\Services::session();
        $model = new AuthModel();
        $user = $this->request->getPost('user');
        $pass = md5($this->request->getPost('pass'));
        $cek = $model->cekLogin($user, $pass);
        if($cek){
            // single session
            // $session->set('username', $user);
            // multiple session
            // $session = session();
            $data_session = array('username' => $user,'password' => $pass);
            $this->session->set($data_session);
            if (($cek['username'] == $user) && ($cek['password'] == $pass)){
                return redirect()->to(base_url('dashboard'));
            } else {
                return redirect()->to(base_url('login'));
            }
        }else{
            $this->session->setFlashdata('pesan','Username Atau Password Salah');
            return redirect()->to(base_url('/'));
        }
    }
    public function keluar(){
        $this->session = \Config\Services::session();
        $this->session->destroy();
        return redirect()->to(base_url('/'));
        
    }
    public function simpanDaftar(){
        $model = new AuthModel();
        $nama = $this->request->getPost('nama');
        $user = $this->request->getPost('user');
        $pass = md5($this->request->getPost('pass'));  
        $level = $this->request->getPost('level');  
        $data = [
			'nama_admin'=> $nama,
			'username'  => $user,
			'password'  => $pass,
			'level'     => $level,
			'status'   => 0
		];
        $result = $model->simpanDaftar($data);
        echo "sukses simpan daftar";
    }
    public function simpanPegawai(){
        $model = new AuthModel();
        $nama	= $this->request->getPost('nama');
        $jk	    = $this->request->getPost('jk');
        $tempat	= $this->request->getPost('tempat');
        $agama	= $this->request->getPost('agama');
        $alamat	= $this->request->getPost('alamat');
        $telepon= $this->request->getPost('telepon');
	
		$data = [
			'id_pegawai'		=> 0,
			'nama_pegawai'		=> $nama,
			'jenis_kelamin'		=> $jk,
			'tempat_lahir'		=> $tempat,
			'agama'		        => $agama,
			'alamat'		    => $alamat,
			'telepon'		    => $telepon
		];
		$result = $model->simpanPegawai($data);
		if($result) {
			echo "Sukses Disimpan.";
		} else {
			echo "Gagal Disimpan";
		}
    }
    public function simpanKendaraan(){
        $model = new AuthModel();
        $nopol	= $this->request->getPost('nopol');
        $merk   = $this->request->getPost('merk');
        $jenis	= $this->request->getPost('jenis');
        $tahun	= $this->request->getPost('tahun');
        $bahan	= $this->request->getPost('bahanbakar');
        $data = [
			'id_nopol_kendaraan' => $nopol,
			'merk'          => $merk,
			'jenis'		    => $jenis,
			'thn_pembuatan'	=> $tahun,
			'bhn_bakar'		=> $bahan
		];
        $result = $model->simpanKendaraan($data);
		if($result) {
			echo "sukses data disimpan.";
		} else {
			echo "gagal data disimpan";
		}
    }


}