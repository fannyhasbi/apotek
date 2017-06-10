
<div class="jumbotron text-center">
  <h2>TAMBAH OBAT</h2>
</div>

<div class="container" style="margin-bottom: 50px">
  <div class="col-md-offset-3 col-md-6">
    <form action="<?= site_url('admin/obat/daftar/'.$obat->kode_obat);?>" method="post">
      <?= $message; ?>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="kode_obat">Kode Obat</label>
            <input type="text" class="form-control" name="kode_obat" value="<?= $obat->kode_obat; ?>" required autofocus>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="nama">Nama Obat</label>
            <input type="text" class="form-control" name="nama" value="<?= $obat->nama; ?>" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="bentuk">Bentuk</label>
            <input type="text" class="form-control" name="bentuk" value="<?= $obat->bentuk; ?>" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" name="harga" min="1" value="<?= $obat->harga; ?>" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="konsumen">Konsumen</label>
        <input type="text" class="form-control" name="konsumen" value="<?= $obat->konsumen; ?>" required>
      </div>
      <div class="form-group">
        <label for="manfaat">Manfaat</label>
        <textarea name="manfaat" class="form-control" required><?= $obat->manfaat; ?></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="tombol tombol-success" name="edit" value="EDIT">
      </div>
    </form>

</div>
