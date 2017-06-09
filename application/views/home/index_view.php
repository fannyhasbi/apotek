<!DOCTYPE html>
<html>
<head>
  <title>Apotek Berkah</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/main.css">
  <script type="text/javascript" src="<?= base_url();?>assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target="#navigasi">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url();?>">APOTEK</a>
    </div>
    <div class="collapse navbar-collapse" id="navigasi">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= site_url('konfirmasi');?>">KONFIRMASI PEMBELIAN</a></li>
        <li><a href="<?= site_url('cek');?>">CEK PEMBELIAN</a></li>
        <li><a href="<?= site_url('obat');?>">DAFTAR OBAT</a></li>
        <li><a href="<?= site_url('beli');?>">BELI <span class="glyphicon glyphicon-shopping-cart"></a></li>
        <li></li>
      </ul>
    </div>
  </div>
</nav>

<?php $this->load->view('home/'. $view_name); ?>

</body>
</html>