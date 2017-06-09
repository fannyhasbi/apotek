<div class="jumbotron text-center">
  <h2><?= $obat->nama ?><small>(<?= $obat->kode_obat;?>)</small></h2>
</div>

<div class="container">
  <h3>Manfaat</h3>
  <p><?= $obat->manfaat;?></p>
  <ul>
    <li>Bentuk obat : <?= $obat->bentuk;?></li>
    <li>Dikonsumsi oleh : <?= $obat->konsumen;?></li>
    <li>Harga satuan : <?= $obat->harga;?></li>
  </ul>

  <br>
  <a href="javascript:history.go(-1)" class="btn btn-warning">Kembali</a>
</div>