
<div class="jumbotron text-center">
  <h2>RIWAYAT TRANSAKSI PENJUALAN</h2>
</div>

<div class="container">
  <table class="table">
    <tr>
      <th>Kode Pemesanan</th>
      <th>Tanggal Pemesanan</th>
      <th>Total Harga</th>
      <th>Status</th>
    </tr>
    <?php foreach($transaksi as $item): ?>
    <tr>
      <td><?= $item->kode_pesan; ?></td>
      <td><?= $item->tanggal; ?></td>
      <td><?= 'Rp '. number_format($item->harga, 0, ',', '.'); ?></td>
      <td><?= $item->status == 'B' ? 'Belum konfirmasi' : 'Lunas' ;?></td>
      <td><span class="glyphicon glyphicon-search"></span> <a href="<?= site_url('admin/transaksi/'.$item->kode_pesan);?>">Detail</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
