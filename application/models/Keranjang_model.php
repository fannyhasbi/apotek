<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

  public function checkKeranjang($kode){
    $query = "SELECT * FROM keranjang WHERE kode_obat = '". $kode ."' AND id_session = '". $this->session->userdata('id_session') ."'";
    return $this->db->query($query);
  }

  public function getKeranjang(){
    $q = "SELECT k.kode_obat, k.jumlah, o.harga, o.nama, (k.jumlah * o.harga) AS subtotal
          FROM keranjang k
          INNER JOIN obat o
            ON k.kode_obat = o.kode_obat
          WHERE k.id_session = '". $this->session->userdata('id_session') ."'";

    $query = $this->db->query($q);

    return $query->result();
  }

  public function getKeranjangInfo(){
    $q = "SELECT SUM(k.jumlah * o.harga) AS total
          FROM keranjang k
          INNER JOIN obat o
            ON k.kode_obat = o.kode_obat
          WHERE id_session = '". $this->session->userdata('id_session') ."'";
    $query = $this->db->query($q);

    return $query->row();
  }

  public function updateKeranjang($kode){
    $query = "UPDATE keranjang SET jumlah = jumlah + 1 WHERE kode_obat = '". $kode ."' AND id_session = '". $this->session->userdata('id_session') ."'";
    if($this->db->query($query))
      return true;
    else
      return false;
  }

  public function insertKeranjang($kode){
    // kolomnya -> (kode_obat, jumlah, id_session)
    $query = "INSERT INTO keranjang VALUES ('". $kode ."', 1, '". $this->session->userdata('id_session') ."')";
    if($this->db->query($query))
      return true;
    else
      return false;
  }
}
