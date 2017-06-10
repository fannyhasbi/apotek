
<div class="jumbotron text-center">
  <h2>DAFTAR OBAT</h2>
</div>

<div class="container" style="margin-bottom: 50px;">
  <?= $message; ?>
  <table class="table">
    <tr>
      <th>Kode Obat</th>
      <th>Nama</th>
      <th>Bentuk</th>
      <th>Konsumen</th>
      <th>Harga</th>
      <td></td>
    </tr>
    <?php foreach($obat as $item): ?>
    <tr>
      <td><?= $item->kode_obat; ?></td>
      <td><?= $item->nama; ?></td>
      <td><?= $item->bentuk; ?></td>
      <td><?= $item->konsumen; ?></td>
      <td><?= 'Rp '. number_format($item->harga, 0, ',', '.'); ?></td>
      <td>
        <a href="<?= site_url('admin/obat/daftar/'.$item->kode_obat);?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a> | 
        <a href="<?= site_url('admin/obat/hapus/'.$item->kode_obat);?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
