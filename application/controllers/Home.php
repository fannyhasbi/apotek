<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('home_model');
    $this->load->model('keranjang_model');
  }

  private function cekSession(){
    if(!$this->session->userdata('id_session'))
      $this->session->set_userdata(array('id_session' => $this->generateSession()));
  }

  private function generateSession(){
    $h = "";
    $k = "1234567890qwertyuiopasdfghjklzxcvbnm";
    for ($i=1; $i <= 40; $i++) { 
      $h .= $k[rand(0, strlen($k) - 1)];
    }
    return $h;
  }

  public function index(){
    $this->cekSession();
    $data['view_name'] = 'beranda';
    $this->load->view('home/index_view', $data);
  }

  public function obat($kode_obat = NULL){
    $this->cekSession();
    if($kode_obat == NULL){
      $data['view_name'] = 'daftar_obat';
      $data['obat'] = $this->home_model->getObat();

      $this->load->view('home/index_view', $data);
    }
    else {
      $data['view_name'] = 'detail_obat';
      $data['obat'] = $this->home_model->getObat($kode_obat);

      $this->load->view('home/index_view', $data);
    }
  }

  //cek pembelian
  public function cek(){
    if($this->input->post('cek')){
      $kode_pesan = $this->input->post('kode_pesan');
      $cek_kode = $this->home_model->checkKode($kode_pesan);

      if($cek_kode->num_rows() > 0){
        //menampilkan detail
        $this->session->set_flashdata('detail', TRUE);
        echo "hehe";
      }
      else {
        $message = "<script>alert('Maaf, kode pemesanan ". $kode_pesan ." tidak ditemukan');</script>";
        $this->session->set_flashdata('msg', $message);
        redirect(site_url('cek'));
      }
    }
    else {
      $data['view_name'] = 'cek';
      $data['message'] = $this->session->flashdata('msg');
      $data['detail']  = $this->session->flashdata('detail');
      $this->load->view('home/index_view', $data);
    }
  }

  public function konfirmasi(){
    if($this->input->post('konfirmasi')){
      $kode_pesan = $this->input->post('kode_pesan');
      $cek_kode = $this->home_model->checkKode($kode_pesan);

      if($cek_kode->num_rows() > 0){
        $user_info = $this->home_model->getInfoByKodePesan($kode_pesan);
        $message = '<p class="alert alert-success">Pemesanan '. $kode_pesan .' berhasil dikonfirmasi atas nama '. $user_info->pemesan .'</p>';
        $this->session->set_flashdata('msg', $message);
        redirect(site_url('konfirmasi'));

      }
      else {
        $message = '<p class="alert alert-danger">Tidak ditemukan kode pemesanan '. $kode_pesan .'</p>';
        $this->session->set_flashdata('msg', $message);
        redirect(site_url('konfirmasi'));
      }
    }
    else {
      $data['view_name'] = 'konfirmasi';
      $data['message'] = $this->session->flashdata('msg');

      $this->load->view('home/index_view', $data);
    }
  }

  public function tambah_keranjang($kode){
    $this->cekSession();

    $cek_keranjang = $this->keranjang_model->checkKeranjang($kode);
    if($cek_keranjang->num_rows() > 0){
      if(!$this->keranjang_model->updateKeranjang($kode))
        echo "Gagal menambahkan item kedalam keranjang";
    }
    else {
      if(!$this->keranjang_model->insertKeranjang($kode))
        echo "Gagal menambahkan item kedalam keranjang";
    }

    redirect(site_url('beli'));
  }

  public function beli(){
    $this->cekSession();
    
    $data['view_name'] = 'beli';
    $data['keranjang'] = $this->keranjang_model->getKeranjang();
    $data['keranjang_info'] = $this->keranjang_model->getKeranjangInfo();

    $this->load->view('home/index_view', $data);
  }
}
