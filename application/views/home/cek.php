<div class="jumbotron text-center">
  <h2>Cek Pembelian</h2>
  <form action="" method="post">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="input-group">
        <input type="text" class="form-control" name="kode_pesan" placeholder="Kode Pesan" size="10" required autofocus>
        <div class="input-group-btn">
          <input type="submit" class="btn btn-success" name="cek" value="Cek">
        </div>
      </div>
      <?= $message ?>
    </div>
  </form>
</div>

<?php if($detail != NULL): ?>
<div class="container" style="padding-bottom: 50px">
  <table class="table table-bordered table-striped">
    <tr>
      <th>Nama Obat</th>
      <th>Jumlah</th>
      <th>Harga<small>/pcs</small></th>
      <th>Subtotal</th>
    </tr>
    <?php foreach($items as $item): ?>
      <tr>
        <td><?= $item->nama; ?></td>
        <td><?= $item->jumlah; ?></td>
        <td><?= number_format($item->harga, 0, ',', '.'); ?></td>
        <td><?= number_format($item->subtotal, 0, ',', '.') ; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <div class="col-md-offset-6 col-md-6">
    <h4 class="lead">Ringkasan Pembelian <small>(<?= $kode_pesan; ?>)</small></h4>
    <table class="table">
      <tr>
        <th>Nama Pemesan:</th>
        <td><?= $nama; ?></td>
      </tr>
      <tr>
        <th>Tanggal:</th>
        <td><?= $tanggal; ?></td>
      </tr>
      <tr>
        <th>Total:</th>
        <td><?= $harga; ?></td>
      </tr>
      <tr class="alert <?= $status == 'B' ? 'alert-danger' : 'alert-success' ?>">
        <th>Status:</th>
        <td><?= $status == 'B' ? 'Belum dibayar' : 'Lunas dibayar' ?></td>
      </tr>
      <tr>
        <?php if($status == 'B'): ?>
          <td colspan="2">
            <a href="konfirmasi" class="btn btn-success btn-block">KONFIRMASI DISINI</a>
          </td>
        <?php endif; ?>
      </tr>
    </table>
  </div>

</div>
<?php endif; ?>