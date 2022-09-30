<?php 
namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model {
	
	public function __construct(){
        $this->db = db_connect();
        
    }
    public function simpanPegawai($data){
        return $this->db->table('tbl_pegawai')
                    ->insert($data);
    }
    public function simpanKendaraan($data){
        return $this->db->table('tbl_kendaraan')
                    ->insert($data);
    }
    public function simpanDaftar($data){
        return $this->db->table('tbl_admin')
                    ->insert($data);
    }
    public function simpanPemesanan($data){
        return $this->db->table('tbl_pemesanan')
                    ->insert($data);
    }
    public function cekLogin($user, $pass){
      return    $this->db->table('tbl_admin')
                     ->where(array('username' => $user, 'password' => $pass))
                     ->get()->getRowArray();
	}
    public function statusPemesanan() {
        return $this->db->table('tbl_pemesanan')
                    ->join('tbl_pegawai','tbl_pegawai.id_pegawai=tbl_pemesanan.id_pegawai')
                    ->join('tbl_kendaraan','tbl_kendaraan.id_nopol_kendaraan=tbl_pemesanan.id_nopol_kendaraan')
                    ->get()->getResultArray();
    }
    public function setStatusKendaraan($id){
        return $this->db->table('tbl_kendaraan')
                    // ->join('tbl_pemesanan', 'tbl_pemesanan.id_nopol_kendaraan=tbl_kendaraan.id_nopol_kendaraan')
                    ->set('status', 1)
                    ->where('id_nopol_kendaraan', $id)
                    ->get()->getResultArray();

    }
    public function viewPegawai(){
        return $this->db->table('tbl_pegawai')
                    ->get()->getResultArray();
    }
    public function dataKendaraan(){
        return $this->db->table('tbl_kendaraan')
                    ->get()->getResultArray();
    }
    public function viewDataPemesanan(){
        return $this->db->table('tbl_pemesanan')
                    ->join('tbl_pegawai','tbl_pegawai.id_pegawai=tbl_pemesanan.id_pegawai')
                    ->join('tbl_kendaraan','tbl_kendaraan.id_nopol_kendaraan=tbl_pemesanan.id_nopol_kendaraan')
                    ->where('tbl_pemesanan.statusp',1)
                    ->get()->getResultArray();
    }
    public function konfirmasiPesanan($id) {
        return $this->db->table('tbl_pemesanan')
                    ->set('status', 1)
                    ->where('id_pemesanan', $id)
                    ->update();
    }
    public function jumlahKendaraan(){
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM tbl_kendaraan');
        return  $query->getFieldCount();
    }
    
}