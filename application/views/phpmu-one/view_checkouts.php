<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="checkout-form">
                    <div class="alert alert-danger">
                        <b>PENTING!</b> - Pastikan data anda sudah benar sebelum melakukan orderan ini.
                    </div>
                    <br><br>
                    <table class="table">
                        <tr>
                            <th width="25%">No. Invoice</th>
                            <td><?=$this->session->idp;?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><?=$rows['nama_lengkap'];?></td>
                        </tr>
                        <tr>
                            <th>No. Telp/Hp</th>
                            <td><?=$rows['no_hp'];?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?=$rows['email'];?></td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td><?=$rows['nama_kota'];?></td>
                        </tr>
                        <tr>
                            <th>Alamat Lengkap</th>
                            <td><?=$rows['alamat_lengkap'];?></td>
                        </tr>
                    </table>
                    
                    <br><br>

                    <div class="shopping-cart m-0 p-0">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery border">
                            <thead>
                                <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($record->num_rows() > 0) {
                                $diskon_total = 0;foreach ($record->result_array() as $row) : ?>
                                    <tr>
                                    <td class="image" data-title="No"><img src="<?= base_url(); ?>asset/foto_produk/<?= $row['gambar']; ?>" alt="#"></td>
                                    <td class="product-des" width="35%" data-title="Description">
                                        <p class="product-name"><a href="<?= base_url(); ?>produk/detail/<?= $row['produk_seo']; ?>"><?= $row['nama_produk']; ?></a></p>
                                    </td>
                                    <?php
                                    if ($row['diskon'] != '0') {
                                        $diskon = "<del style='color:red'>" . rupiah($row['harga_jual']) . "</del>";
                                    } else {
                                        $diskon = "";
                                    }
                                    $diskon_total = $diskon_total + $row['diskon'] * $row['jumlah']; 
                                    ?>
                                    <td class="price" data-title="Price"><span>Rp. <?= number_format($row['harga_jual'] - $row['diskon'], 0, ',', '.'); ?> <?= $diskon; ?></span></td>
                                    <td class="qty" data-title="Qty">
                                        <?= $row['jumlah']; ?>
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>Rp. <?= number_format($row['subtotal'], 0, ',', '.'); ?></span></td>
                                    <td class="action" data-title="Remove"><a href="<?= base_url(); ?>produk/keranjang_delete/<?= $row['id_penjualan_detail']; ?>"><i class="ti-trash remove-icon"></i></a></td>
                                    </tr>
                                <?php endforeach;
                                } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                    <i class="text-danger">Maaf, keranjang belanja saat ini masih kosong.</i><br>
                                    <a href="<?= base_url(); ?>produk" class="btn text-white">Klik Disini Untuk Belanja</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>CART TOTALS</h2>
                        <div class="content">
                            <ul>
                                <?php $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `rb_penjualan_temp` a JOIN rb_produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array();?>
                                <input type="hidden" id="total" value="<?php echo $total['total']; ?>">
                                <input type="hidden" id="ongkir" value="0">
                                <input type="hidden" name="berat" value="<?php echo $total['total_berat']; ?>" />
                                <input type="hidden" name="diskonnilai" id="diskonnilai" value="<?php echo $diskon_total; ?>" />

                                <li>Sub Total<span>Rp. <?=number_format($total['total'], 0, ',', '.');?></span></li>
                                <li>Ongkir<span id="totalongkir"></span></li>
                                <li class="last">Total<span id="totalbayar"></span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Shipping</h2>
                        <div class="content">
<<<<<<< HEAD
                            <div class="checkbox">
                                <?php $no = 1;
                                $kurir = ['jne', 'pos', 'tiki', 'cod(cash on delivery)'];
                                foreach ($kurir as $rkurir) : ?>
                                    <div class="checkbox-inline"><input name="kurir" class="kurir" type="radio" value="<?= $rkurir; ?>"> <?= strtoupper($rkurir); ?></div>
                                <?php $no++;
                                endforeach; ?>
=======
                            <div class="m-3">
                                <?php
                                $kurir = array('jne', 'pos', 'tiki', 'COD (Cash On Delivery)');
                                foreach ($kurir as $rkurir) :
                                ?>
                                <div class="checkbox-inline mb-1">
                                    <label><input name="kurir" class="kurir" value="<?=$rkurir;?>" type="radio"> <?php echo strtoupper($rkurir); ?></label>
                                </div>
                                <?php endforeach;?>
>>>>>>> ea7f0b0c23219943668c9be3eec5a5aadb82f772
                            </div>
                            <div class="alert alert-light text-center d-none" id="loading-kurirdata"><i class="fa fa-spinner fa-spin"></i> Loading...</div>
                            <div id="kuririnfo" class="d-none">
                                    <div class="form-group">
                                    <div class="col-md-12">
<<<<<<< HEAD
                                        <div class='alert alert-info' style='padding:5px; border-radius:0px; margin-bottom:0px'>Service</div>
                                        <!-- <p class="form-control-static" id="kurirserviceinfo"></p> -->
=======
                                        <div class='alert alert-dark my-3' style='padding:5px; border-radius:0px; margin-bottom:0px'>Service</div>
                                        <p class="form-control-static" id="kurirserviceinfo"></p>
>>>>>>> ea7f0b0c23219943668c9be3eec5a5aadb82f772
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Button Widget -->
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">
                                <a href="#" id="oksimpan" class="btn disabled">proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Checkout -->
<<<<<<< HEAD



<?php
$total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `rb_penjualan_temp` a JOIN rb_produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array();
echo "<p class='sidebar-title'> Checkout Belanja - " . $this->session->idp . "</p>
<div class='alert alert-danger'><b>PENTING!</b> - Pastikan data anda sudah benar sebelum menyelesaikan orderan ini.</div>
<form action='' method='POST'>
    <div class='col-md-8'>
        <dl class='dl-horizontal'>
            <dt>Nama</dt>       <dd>$rows[nama_lengkap]</dd>
            <dt>No Telpon/Hp</dt>       <dd>$rows[no_hp]</dd>
            <dt>Email</dt>       <dd>$rows[email]</dd>
            <dt>Kota</dt>               <dd>$rows[nama_kota]</dd>
            <dt>Alamat Lengkap</dt>     <dd>$rows[alamat_lengkap]</dd>
        </dl>
    </div>

    <div class='col-md-4'>
        <center>Total Bayar <br><h4 id='totalbayar'></h4>   
        <button type='submit' name='submit' id='oksimpan' class='btn btn-success btn-flat btn-sm' style='display:none'>Lakukan Pembayaran</button>
        </center>
    </div>

      <table class='table table-striped table-condensed'>
          <thead>
            <tr bgcolor='#e3e3e3'>
              <th width='47%'>Nama Produk</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Berat</th>
              <th>Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>";

$no = 1;
$diskon_total = 0;
foreach ($record->result_array() as $row) {
    $sub_total = (($row['harga_jual'] - $row['diskon']) * $row['jumlah']);
    if ($row['diskon'] != '0') {
        $diskon = "<del style='color:red'>" . rupiah($row['harga_jual']) . "</del>";
    } else {
        $diskon = "";
    }
    if (trim($row['gambar']) == '') {
        $foto_produk = 'no-image.png';
    } else {
        $foto_produk = $row['gambar'];
    }
    $diskon_total = $diskon_total + $row['diskon'] * $row['jumlah'];
    echo "<tr>
                    <td class='valign'><a href='" . base_url() . "produk/detail/$row[produk_seo]'>$row[nama_produk]</a><br>
                        <small>Note : $row[keterangan_order]</small></td>
                    <td class='valign'>" . rupiah($row['harga_jual'] - $row['diskon']) . " $diskon</td>
                    <td class='valign'>$row[jumlah]</td>
                    <td class='valign'>" . ($row['berat'] * $row['jumlah']) . " Gram</td>
                    <td class='valign'>Rp " . rupiah($sub_total) . "</td>
                    <td class='valign' width='30px'><a class='btn btn-danger btn-xs' title='Delete' href='" . base_url() . "produk/keranjang_delete/$row[id_penjualan_detail]'><span class='glyphicon glyphicon-remove'></span></a></td>
                </tr>";
    $no++;
}

echo "<tr class='success'>
                  <td colspan='4'><b>Subtotal </b> <i class='pull-right'>(" . terbilang($total['total']) . " Rupiah)</i></td>
                  <td><b>Rp " . rupiah($total['total']) . "</b></td>
                  <td></td>
                </tr>

                <tr class='success'>
                  <td colspan='4'><b>Berat</b> <i class='pull-right'>(" . terbilang($total['total_berat']) . " Gram)</i></td>
                  <td><b>$total[total_berat] Gram</b></td>
                  <td></td>
                </tr>

        </tbody>
      </table>";
$kode_unik = substr($this->session->idp, -3);
?>
<input type="hidden" name="total" id="total" value="<?php echo $total['total'] + $kode_unik; ?>" />
<input type="hidden" name="ongkir" id="ongkir" value="0" />
<input type="hidden" name="berat" value="<?php echo $total['total_berat']; ?>" />
<input type="hidden" name="diskonnilai" id="diskonnilai" value="<?php echo $diskon_total; ?>" />
<div class="form-group">
    <label class="col-sm-2 control-label" for="">Pilih Kurir</label>
    <div class="col-md-10">
        <?php
        $kurir = array('jne', 'pos', 'tiki');
        foreach ($kurir as $rkurir) {
        ?>
            <label class="radio-inline">
                <input type="radio" name="kurir" class="kurir" value="<?php echo $rkurir; ?>" /> <?php echo strtoupper($rkurir); ?>
            </label>
        <?php
        }
        ?>
        <label class="radio-inline"><input type="radio" name="kurir" class="kurir" value="cod" /> COD (Cash on delivery)</label>
    </div>
</div>
<div id="kuririnfo">
    <div class="form-group">
        <div class="col-md-12">
            <div class='alert alert-info' style='padding:5px; border-radius:0px; margin-bottom:0px'>Service</div>
            <div class="form-control-static" id="kurirserviceinfo"></div>
        </div>
    </div>
</div>

=======
>>>>>>> ea7f0b0c23219943668c9be3eec5a5aadb82f772

<script>
    $(document).ready(function() {

        let ongkirVal = $('#ongkir').val();
        let totalVal = $('#total').val();

        $('#totalongkir').html(toDuit(ongkirVal));
        $('#totalbayar').html(toDuit(totalVal));

        $(".kurir").each(function(o_index, o_val) {
            $(this).on("change", function() {
                $("#kuririnfo").hide();
                $('#loading-kurirdata').removeClass('d-none');
                
                var did = $(this).val();
                var berat = "<?php echo $total['total_berat']; ?>";
                var kota = "<?php echo $rows['kota_id']; ?>";
                $.ajax({
                        method: "get",
                        dataType: "html",
                        url: "<?php echo base_url(); ?>produk/kurirdata",
                        data: "kurir=" + did + "&berat=" + berat + "&kota=" + kota,
                        beforeSend: function() {
                            $("#oksimpan").hide();
                        }
                    })
                    .done(function(x) {
<<<<<<< HEAD
                        // console.log(x);
=======
                        $('#loading-kurirdata').addClass('d-none');
                        $('#kuririnfo').removeClass('d-none');
>>>>>>> ea7f0b0c23219943668c9be3eec5a5aadb82f772
                        $("#kurirserviceinfo").html(x);
                        $("#kuririnfo").show();
                    })
                    .fail(function() {
                        $("#kurirserviceinfo").html("");
                        $("#kuririnfo").hide();
                    });
            });
        });
        $("#diskon").html(toDuit(0));
        hitung();
    });

<<<<<<< HEAD
=======
    function simpan(service, kurir){
        $('#oksimpan').click(function(e){
            e.preventDefault()

            var diskon = $('#diskonnilai').val();
            var ongkir = $("#ongkir").val();

            $.ajax({
                url: '<?=base_url();?>produk/checkouts',
                method: 'post',
                data: {diskonnilai: diskon, kurir: kurir, service: service, ongkir: ongkir, submit: ''},
                dataType: 'json',
                success: function(data){
                    if(data.hasil == true){
                        swal.fire({
                            title: 'Berhasil', 
                            icon: 'success',
                            text: data.pesan
                        }).then(function(){
                            window.location.assign('<?=base_url();?>konfirmasi');
                        });
                    } else {
                        swal.fire({
                            title: 'Failed',
                            icon: 'error',
                            text: data.pesan
                        });
                    }
                }
            })
        })
    }

>>>>>>> ea7f0b0c23219943668c9be3eec5a5aadb82f772

    function hitung() {
        var diskon = $('#diskonnilai').val();
        var total = $('#total').val();
        var ongkir = $("#ongkir").val();
        var bayar = (parseFloat(total) + parseFloat(ongkir));
        if (parseFloat(ongkir) > 0) {
            $('#oksimpan').removeClass('disabled');
            $("#oksimpan").show();
        } else {
            $("#oksimpan").hide();
        }
        $("#totalbayar").html(toDuit(bayar));
        $("#totalongkir").html(toDuit(ongkir));
    }
</script>

<!-- Breadcrumbs -->