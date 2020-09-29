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
                            <td><?= $this->session->idp; ?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><?= $rows['nama_lengkap']; ?></td>
                        </tr>
                        <tr>
                            <th>No. Telp/Hp</th>
                            <td><?= $rows['no_hp']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $rows['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td><?= $rows['nama_kota']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Lengkap</th>
                            <td><?= $rows['alamat_lengkap']; ?></td>
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
                                    $diskon_total = 0;
                                    foreach ($record->result_array() as $row) : ?>
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
                                <?php $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `rb_penjualan_temp` a JOIN rb_produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array(); ?>
                                <input type="hidden" id="total" value="<?php echo $total['total']; ?>">
                                <input type="hidden" id="ongkir" value="0">
                                <input type="hidden" name="berat" value="<?php echo $total['total_berat']; ?>" />
                                <input type="hidden" name="diskonnilai" id="diskonnilai" value="<?php echo $diskon_total; ?>" />

                                <li>Sub Total<span>Rp. <?= number_format($total['total'], 0, ',', '.'); ?></span></li>
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

                            <div class="m-3">
                                <?php
                                $kurir = array('jne', 'pos', 'tiki', 'COD (Cash On Delivery)');
                                foreach ($kurir as $rkurir) :
                                ?>
                                    <div class="checkbox-inline mb-1">
                                        <label><input name="kurir" class="kurir" value="<?= $rkurir; ?>" type="radio"> <?php echo strtoupper($rkurir); ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="alert alert-light text-center d-none" id="loading-kurirdata"><i class="fa fa-spinner fa-spin"></i> Loading...</div>
                            <div id="kuririnfo" class="d-none">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class='alert alert-dark my-3' style='padding:5px; border-radius:0px; margin-bottom:0px'>Service</div>
                                        <p class="form-control-static" id="kurirserviceinfo"></p>

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

                        $('#loading-kurirdata').addClass('d-none');
                        $('#kuririnfo').removeClass('d-none');
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


    function simpan(service, kurir) {
        $('#oksimpan').click(function(e) {
            e.preventDefault()

            var diskon = $('#diskonnilai').val();
            var ongkir = $("#ongkir").val();

            $.ajax({
                url: '<?= base_url(); ?>produk/checkouts',
                method: 'post',
                data: {
                    diskonnilai: diskon,
                    kurir: kurir,
                    service: service,
                    ongkir: ongkir,
                    submit: ''
                },
                dataType: 'json',
                success: function(data) {
                    if (data.hasil == true) {
                        swal.fire({
                            title: 'Berhasil',
                            icon: 'success',
                            text: data.pesan
                        }).then(function() {
                            window.location.assign('<?= base_url(); ?>konfirmasi');
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