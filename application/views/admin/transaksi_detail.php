
<div class="jumbotron text-center">
  <h2>RIWAYAT TRANSAKSI PENJUALAN</h2>
</div>

<div class="container" style="padding-bottom: 50px">
  <table class="table table-bordered table-striped">
    <tr>
      <th>Nama Obat</th>
      <th>Jumlah</th>
      <th>Harga<small>/pcs</small></th>
      <th>Subtotal</th>
    </tr>
    <?php foreach($detail_pemesanan as $item): ?>
      <tr>
        <td><?= $item->nama; ?></td>
        <td><?= $item->jumlah; ?></td>
        <td><?= number_format($item->harga, 0, ',', '.'); ?></td>
        <td><?= number_format($item->subtotal, 0, ',', '.'); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <div class="col-md-offset-6 col-md-6">
    <h4 class="lead">Ringkasan Pembelian <small>(<?= $pemesanan->kode_pesan; ?>)</small></h4>
    <table class="table">
      <tr>
        <th>Nama Pemesan:</th>
        <td><?= $pembeli->nama; ?></td>
      </tr>
      <tr>
        <th>Tanggal:</th>
        <td><?= $pemesanan->tanggal; ?></td>
      </tr>
      <tr>
        <th>Total:</th>
        <td><?= 'Rp '. number_format($pemesanan->harga, 0, ',', '.'); ?></td>
      </tr>
      <tr class="alert <?= $pemesanan->status == 'B' ? 'alert-danger' : 'alert-success' ?>">
        <th>Status:</th>
        <td><?= $pemesanan->status == 'B' ? 'Belum dibayar' : 'Lunas dibayar' ?></td>
      </tr>
    </table>
  </div>
</div>
