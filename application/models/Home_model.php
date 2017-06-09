<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

  public function getObat($kode_obat = FALSE){
    if($kode_obat == FALSE){
      $query = $this->db->query('SELECT * FROM obat');
      return $query->result();
    }
    
    $query = $this->db->query("SELECT * FROM obat WHERE kode_obat = '". $kode_obat ."'");
    return $query->row();
  }

  public function checkKode($kode){
    $query = "SELECT * FROM pemesanan WHERE kode_pesan = '". $kode ."'";
    return $this->db->query($query);
  }

  public function getInfoByKodePesan($kode){
    $query = "SELECT * FROM pemesanan WHERE kode_pesan = '". $kode ."'";
    return $query->row();
  }

}
