
<div class="jumbotron text-center">
  <h1>Daftar Obat</h1>
</div>

<div class="container" style="margin-bottom: 50px;">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Bentuk</th>
        <th>Dikonsumsi Oleh</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($obat as $item): ?>
      <tr>
        <td><?= $item->nama;?></td>
        <td><?= $item->bentuk;?></td>
        <td><?= $item->konsumen;?></td>
        <td><?= number_format($item->harga, 0, ',', '.');?></td>
        <td>
          <a href="<?= site_url('obat/'.$item->kode_obat);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"> Detail</span></a>
          <a href="<?= site_url('beli/'.$item->kode_obat);?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-shopping-cart"> Beli</span></a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
