<div class="jumbotron text-center" style="padding: 100px 25px 50px 25px">
  <?php if($message == null){ ?>
    <h1>Pembelian Obat</h1>
    <h2><a href="<?= site_url('obat');?>" class="btn btn-success btn-lg">Tambah Barang</a></h2>
  <?php } else { ?>
    <?= $message; ?>
  <?php } ?>
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
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($keranjang as $item): ?>
        <tr id="item-<?= $item->kode_obat; ?>">
          <td><?= $item->kode_obat; ?></td>
          <td><?= $item->nama; ?></td>
          <td><input type="number" value="<?= $item->jumlah; ?>" data-item="<?= $item->kode_obat; ?>" class="jumlah" style="width: 50px;" onchange="$(this).updateJumlah()" min="1"></td>
          <td><?= number_format($item->harga, 0, ',', '.'); ?></td>
          <td id="subtotal-<?= $item->kode_obat; ?>"><?= number_format($item->subtotal, 0, ',', '.'); ?></td>
          <td><button class="btn btn-danger btn-xs" data-item="<?= $item->kode_obat; ?>" onclick="$(this).delItem()"><span class="glyphicon glyphicon-remove"></span> Hapus</button></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="col-md-offset-8 col-md-4">
    <h4 class="lead"><?= 'Pemesanan '. date('d/m/Y');?></h4>
    <table class="table">
      <tr>
        <th>Total:</th>
        <td>Rp <span id="total"><?= number_format($keranjang_info->total, 0, ',', '.'); ?></span></td>
      </tr>
    </table>
  </div>

  <div class="col-md-6">
    <h4 class="lead">Lanjutkan Pembelian</h4>
    <form action="" method="post" id="myForm">
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama">
      </div>
      <div class="form-group">
        <label for="identitas">No. Identitas</label>
        <input type="text" class="form-control" name="identitas">
      </div>
      <input type="submit" class="tombol tombol-success" name="proses_beli" id="proses_beli" value="PESAN">
      <!-- <input type="submit" class="tombol tombol-warning" name="batal_beli" value="BATALKAN PEMESANAN"> -->
      <input type="submit" class="tombol tombol-warning" name="batal_beli" id="batal_beli" value="BATALKAN PEMESANAN">
    </form>
  </div>
</div>

<div id="target"></div>

<script>
  $(document).ready(function(){
    $("#proses_beli").click(function(){
      $(".form-control").prop("required", true);
    });
    $("#batal_beli").click(function(){
      $(".form-control").removeAttr("required");
    });

    //AJAX POST
    $.fn.updateJumlah = function(){
      var jum = $(this).val();
      var kod = $(this).attr("data-item");
      var subtotal_index = "subtotal-" + kod;

      $.ajax({
        type: "post",
        url: "<?= site_url('update_jumlah'); ?>",
        dataType: 'json',
        data: {
          "jumlah": jum,
          "kode_obat": kod
        },
        beforeSend: function(){
          $("#"+subtotal_index).html("Loading...");
          $("#total").html("Loading...");
        },
        success: function(res){
          $("#"+subtotal_index).html(res.subtotal);
          $("#total").html(res.total);
        }
      });
    }
    //Akhir AJAX POST

    //AJAX Hapus Item
    $.fn.delItem = function(){
      var kode = $(this).attr("data-item");

      $.ajax({
        type: "post",
        url: "<?= site_url('del_item'); ?>",
        dataType: "json",
        data: {
          "kode_obat": kode
        },
        success: function(res){
          if(res.status == true){
            console.log("Item : "+ kode +" berhasil dihapus");

            //hapus di tampilan
            $("tr#item-"+kode).remove();
            $("#total").html(res.total);
          }
          else{
            console.log("Item : "+ kode +" gagal dihapus");
          }
        }
      });
    }

  });
</script>

<?php endif; ?>