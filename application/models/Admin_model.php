<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
  
  public function checkAdmin($username, $pass){
    $query = "SELECT * FROM admin WHERE username = '". $username ."' AND password = '". $pass ."'";
    return $this->db->query($query);
  }

  public function getAdmin($username){
    $q = "SELECT * FROM admin WHERE username = '". $username ."'";
    $query = $this->db->query($q);

    return $query->row();
  }

  public function getPemesanan(){
    $q = "SELECT * FROM pemesanan ORDER BY tanggal DESC, status ASC";
    $query = $this->db->query($q);

    return $query->result();
  }

  public function getPemesananByKode($kode){
    $q = "SELECT * FROM pemesanan WHERE kode_pesan = '". $kode ."'";
    $query = $this->db->query($q);
    return $query->row();
  }

  public function getDetailPemesanan($kode){
    // SELECT o.nama, d.jumlah, (d.jumlah * o.harga) AS subtotal
    // FROM detail_pemesanan d, obat o
    // WHERE d.kode_obat = o.kode_obat;

    $q = "SELECT o.nama, d.jumlah, o.harga, (d.jumlah * o.harga) AS subtotal
          FROM detail_pemesanan d, obat o
          WHERE d.kode_obat = o.kode_obat
            AND d.kode_pesan = '". $kode ."'";

    $query = $this->db->query($q);
    return $query->result();
  }

  public function getDetailPembeliByPemesanan($kode){
    // SELECT p.nama FROM pembeli WHERE id = (
    //   SELECT id_pemesan FROM pemesanan WHERE id_pemesan = '$kode'
    // );

    $q = "SELECT nama FROM pembeli WHERE id = (
            SELECT id_pemesan FROM pemesanan WHERE kode_pesan = '$kode'
          )";
    $query = $this->db->query($q);
    return $query->row();
  }

  public function insertObat(){
    $kode = $this->input->post('kode_obat');
    $nama = $this->input->post('nama');
    $bentuk = $this->input->post('bentuk');
    $harga  = $this->input->post('harga');
    $konsum = $this->input->post('konsumen');
    $manfaat= $this->input->post('manfaat');

    $q = "INSERT INTO obat VALUES
          ('$kode', '$nama', '$bentuk', '$konsum', '$manfaat', '$harga')";

    if($this->db->query($q))
      return true;
    else
      return false;
  }

  public function updateObat($kode){
    $kode = $this->input->post('kode_obat');
    $nama = $this->input->post('nama');
    $bentuk = $this->input->post('bentuk');
    $harga  = $this->input->post('harga');
    $konsum = $this->input->post('konsumen');
    $manfaat= $this->input->post('manfaat');

    $q = "UPDATE obat SET kode_obat = '$kode', nama = '$nama', bentuk = '$bentuk',
          harga = $harga, konsumen = '$konsum', manfaat = '$manfaat'
          WHERE kode_obat = '$kode'";

    if($this->db->query($q))
      return true;
    else
      return false;
  }

  public function deleteObat($kode){
    $q = "DELETE FROM obat WHERE kode_obat = '$kode'";
    if($this->db->query($q))
      return true;
    else
      return false;
  }

}
