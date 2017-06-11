<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('home_model');
  }

  //cek apakah admin sudah login
  private function cekLogin(){
    if(!$this->session->userdata('login_admin')){
      redirect(site_url('login'));
    }
  }

  public function index(){
    $this->cekLogin();

    $data['view_name'] = 'dashboard';
    $this->load->view('admin/index_view', $data);
  }

  public function login(){
    if($this->session->userdata('login_admin'))
      redirect(site_url('admin'));

    if($this->input->post('login')){
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      //jika admin terdaftar
      if($this->admin_model->checkAdmin($username, $password)->num_rows() > 0){
        $admin = $this->admin_model->getAdmin($username);

        $data_session = array(
          'login_admin' => true,
          'username'    => $admin->username,
          'nama'        => $admin->nama
        );

        $this->session->set_userdata($data_session);
        redirect(site_url('admin'));
      }
      else {
        $message = '<div class="alert alert-danger">Username atau password salah</div>';
        $this->session->set_flashdata('msg', $message);
      }
    }
    else {
      $data['message'] = $this->session->flashdata('msg');
      $this->load->view('admin/login', $data);
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect(site_url('admin'));
  }

  public function transaksi($kode = NULL){
    $this->cekLogin();

    if($kode == NULL){
      $data['transaksi'] = $this->admin_model->getPemesanan();

      $data['view_name'] = 'transaksi';
      $this->load->view('admin/index_view', $data);
    }
    else {
      $data['pemesanan'] = $this->admin_model->getPemesananByKode($kode);
      $data['detail_pemesanan'] = $this->admin_model->getDetailPemesanan($kode);
      $data['pembeli'] = $this->admin_model->getDetailPembeliByPemesanan($kode);

      $data['view_name'] = 'transaksi_detail';
      $this->load->view('admin/index_view', $data);
    }
  }

  public function obat(){
    $this->cekLogin();

    $data['view_name'] = 'obat';
    $this->load->view('admin/index_view', $data);
  }

  public function daftar_obat(){
    $this->cekLogin();

    $data['obat'] = $this->home_model->getObat();

    //didapat dari penghapusan obat
    $data['message'] = $this->session->flashdata('msg');

    $data['view_name'] = 'daftar_obat';
    $this->load->view('admin/index_view', $data);
  }

  public function tambah_obat(){
    $this->cekLogin();

    if($this->input->post('tambah')){
      if($this->admin_model->insertObat())
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Obat '. $this->input->post('nama') .' berhasil dimasukkan kedalam database</div>');
      else
        $this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>Terjadi kesalahan</b>, obat gagal dimasukkan kedalam database</div>');
      redirect(site_url('admin/obat/tambah'));
    }
    else {
      $data['message'] = $this->session->flashdata('msg');

      $data['view_name'] = 'tambah_obat';
      $this->load->view('admin/index_view', $data);
    }
  }

  public function edit_obat($kode){
    $this->cekLogin();

    if($this->input->post('edit')){
      if($this->admin_model->updateObat($kode))
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Obat dengan kode <b>'.$kode .'</b> berhasil diupdate</div>');
      else
        $this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>Terjadi kesalahan</b>, obat '. $kode .' gagal diupdate</div>');
      redirect(site_url('admin/obat/daftar/'.$kode));
    }
    else {
      $data['obat'] = $this->home_model->getObat($kode);
      $data['message'] = $this->session->flashdata('msg');

      $data['view_name'] = 'edit_obat';
      $this->load->view('admin/index_view', $data);
    }
  }

  public function hapus_obat($kode){
    $this->cekLogin();

    if($this->admin_model->deleteObat($kode)){
      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Obat dengan kode <mark>'. $kode ."'</mark> berhasil dihapus</div>");
      redirect(site_url('admin/obat/daftar'));
    }
    else{
      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Obat dengan kode <mark>'. $kode ."</mark> gagal dihapus</div>");
      redirect(site_url('admin/obat/daftar'));
    }
  }

}
