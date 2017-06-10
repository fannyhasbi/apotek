
<div class="jumbotron text-center">
  <h2>TAMBAH OBAT</h2>
</div>

<div class="container" style="margin-bottom: 50px">
  <div class="col-md-offset-3 col-md-6">
    <form action="" method="post">
      <?= $message; ?>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="kode_obat">Kode Obat</label>
            <input type="text" class="form-control" name="kode_obat" required autofocus>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="nama">Nama Obat</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="bentuk">Bentuk</label>
            <input type="text" class="form-control" name="bentuk" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" name="harga" min="1" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="konsumen">Konsumen</label>
        <input type="text" class="form-control" name="konsumen" required>
      </div>
      <div class="form-group">
        <label for="manfaat">Manfaat</label>
        <textarea name="manfaat" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="tombol tombol-success" name="tambah" value="TAMBAH">
      </div>
    </form>

</div>
