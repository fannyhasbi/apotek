<div class="jumbotron text-center" style="padding: 100px 25px 50px 25px">
  <h1>Pembelian Obat</h1>
  <h2><a href="<?= site_url('obat');?>" class="btn btn-success btn-lg">Tambah Barang</a></h2>
</div>

<?php if(count($keranjang) > 0): //jika sudah memilih barang?>
<div class="container" style="margin-bottom: 50px;">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Kode Obat</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga<small>/pcs</small></th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($keranjang as $item): ?>
        <tr>
          <td><?= $item->kode_obat; ?></td>
          <td><?= $item->nama; ?></td>
          <td><?= $item->jumlah; ?></td>
          <td><?= $item->harga; ?></td>
          <td><?= number_format($item->subtotal, 0, ',', '.'); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="col-md-offset-8 col-md-4">
    <h4 class="lead"><?= 'Pemesanan '. date('d/m/Y');?></h4>
    <table class="table">
      <tr>
        <th>Total:</th>
        <td>Rp <?= number_format($keranjang_info->total, 2, ',', '.'); ?></td>
      </tr>
    </table>
  </div>

  <div class="col-md-6">
    <h4 class="lead">Lanjutkan Proses</h4>
    <form action="" method="post">
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama">
      </div>
      <div class="form-group">
        <label for="identitas">No. Identitas</label>
        <input type="text" class="form-control" name="identitas">
      </div>
      <input type="submit" class="tombol tombol-success" name="proses_beli" value="PESAN">
      <input type="submit" class="tombol tombol-warning" name="batal_beli" value="BATALKAN PEMESANAN">
    </form>
  </div>


</div>
<?php endif; ?>