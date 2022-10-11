<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    // koneksi ke database
    protected $session;
    public function __construct(){
        $this->model = new AuthModel();
        $this->helpers = ['form', 'url'];   
        $this->session = \Config\Services::session();
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
        echo view("layout/header");
        $data = [
            'judul' => 'Data Tabel Konfirmasi pesanan',
            'konfirmasip' => $this->model->statusPemesanan()
        ];
        echo view('admin/tbl_konfirmasip',$data);
        echo view("layout/footer");
    }
    public function statusPemesanan(){
        $model = new AuthModel();
        echo view("layout/header");
        $data = [
            'judul' => 'Data Tabel Konfirmasi pesanan',
            'statusp' => $this->model->statusPemesanan()
        ];
        echo view('admin/tbl_status_pemesanan',$data);
        echo view("layout/footer");
    }
    public function dataKendaraan(){
        $model = new AuthModel();
        echo view("layout/header");
        $data = [
            'judul' => 'Data Tabel Konfirmasi pesanan',
            'kendaraan' => $this->model->dataKendaraan()
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
        echo view("layout/header");
        $data = [
            'judul' => "Lihat Data Pegawai",
            'pegawai' => $this->model->viewPegawai()
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
        echo view("layout/header");
        $data = [
            'judul' => "Lihat Data Pemesanan",
            'pesanan' => $this->model->viewDataPemesanan()
        ];
        echo view('admin/tbl_pemesanan', $data);
        echo view("layout/footer");
    }
    // crud 
    public function konfirmasiPemesanan($id){
        // echo  $this->request->getPost('id_pesanan');
        $data = $this->model->konfirmasiPesanan($id);
        if($data){
            $this->session->setFlash('pesan','Pemesanan disetujui !');
            return redirect()->to(base_url('lihat-konfirmasi-pesanan'));
        }else{
            $this->session->setFlash('pesan','Pemesanan Gagal Disetujui !');
            return redirect()->to(base_url('lihat-konfirmasi-pesanan'));
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
        $user = $this->request->getPost('user');
        $pass = md5($this->request->getPost('pass'));
        $cek = $this->model->cekLogin($user, $pass);
        // $session->set('username', $user);
        if($cek){
            $level = $cek['level'];
            $data_session = array('username' => $user,'password' => $pass, 'level'=> $level);
            $this->session->set($data_session);
            if (($cek['username'] == $user) && ($cek['password'] == $pass)){
                return redirect()->to(base_url('dashboard'));
            }else {
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
        $data = [
			'nama_admin'=> $this->request->getPost('nama'),
			'username'  => $this->request->getPost('user'),
			'password'  => md5($this->request->getPost('pass')),
			'level'     => $this->request->getPost('level'),
			'status'    => 0
		];
        $result = $this->model->simpanDaftar($data);
        echo "sukses simpan daftar";
    }
    public function simpanPegawai(){
        $model = new AuthModel();
		$data = [
			'id_pegawai'		=> 0,
			'nama_pegawai'		=> $this->request->getPost('nama'),
			'jenis_kelamin'		=> $this->request->getPost('jk'),
			'tempat_lahir'		=> $this->request->getPost('tempat'),
			'agama'		        => $this->request->getPost('agama'),
			'alamat'		    => $this->request->getPost('alamat'),
			'telepon'		    => $this->request->getPost('telepon')
		];
		$result = $this->model->simpanPegawai($data);
		if($result) {
			echo "Sukses Disimpan.";
		} else {
			echo "Gagal Disimpan";
		}
    }
    public function simpanKendaraan(){
        $data = [
			'id_nopol_kendaraan' => $this->request->getPost('nopol'),
			'merk'          => $this->request->getPost('merk'),
			'jenis'		    => $this->request->getPost('jenis'),
			'thn_pembuatan'	=> $this->request->getPost('tahun'),
			'bhn_bakar'		=> $this->request->getPost('bahanbakar')
		];
        $result = $this->model->simpanKendaraan($data);
		if($result) {
			echo "sukses data disimpan.";
		} else {
			echo "gagal data disimpan";
		}
    }


}