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
    </div>
  </form>
</div>

<?= $message ?>

<?php if($detail != NULL): ?>
<div class="container">
  <table class="table table-bordered table-striped">
    <tr>
      <th>Kode Obat</th>
      <th>Harga</th>
    </tr>
  </table>
</div>
<?php endif; ?>