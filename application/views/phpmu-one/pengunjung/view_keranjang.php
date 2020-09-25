<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
            <li class="active"><a href="blog-single.html">Cart</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Shopping Summery -->
        <table class="table shopping-summery">
          <thead>
            <tr class="main-hading">
              <th>PRODUCT</th>
              <th>NAME</th>
              <th class="text-center">UNIT PRICE</th>
              <th class="text-center">QUANTITY</th>
              <th class="text-center">NETTO</th>
              <th class="text-center">TOTAL</th> 
              <th class="text-center"><i class="ti-trash remove-icon"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php if($record->num_rows() > 0){
            foreach($record->result_array() as $row) : ?>
            <tr>
              <td class="image" data-title="No"><img src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#"></td>
              <td class="product-des" width="35%" data-title="Description">
                <p class="product-name"><a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>"><?=$row['nama_produk'];?></a></p>
                <p class="product-des"><?=substr($row['keterangan'], 0, 100);?>... <a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>" class="detail-produk-link">Selengkapnya.</a></p>
              </td>
              <?php if ($row['diskon']!='0'){ $diskon = "<del style='color:red'>".rupiah($row['harga_jual'])."</del>"; }else{ $diskon = ""; } ?>
              <td class="price" data-title="Price"><span>Rp. <?=number_format($row['harga_jual'] - $row['diskon'], 0, ',', '.');?> <?=$diskon;?></span></td>
              <td class="qty" data-title="Qty">
                <?=$row['jumlah'];?>
              </td>
              <td class="qty" data-title="Berat">
                <?=$row['berat'] * $row['jumlah'];?> Gram
              </td>
              <td class="total-amount" data-title="Total"><span>Rp. <?=number_format($row['subtotal'], 0, ',', '.');?></span></td>
              <td class="action" data-title="Remove"><a href="<?=base_url();?>produk/keranjang_delete/<?=$row['id_penjualan_detail'];?>"><i class="ti-trash remove-icon"></i></a></td>
            </tr>
            <?php endforeach; } else { ?>
              <tr>
                <td colspan="6" class="text-center">
                  <i class="text-danger">Maaf, keranjang belanja saat ini masih kosong.</i><br>
                  <a href="<?=base_url();?>produk" class="btn text-white">Klik Disini Untuk Belanja</a>
                </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <!--/ End Shopping Summery -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <?php if($record->num_rows() > 0) : ?>
        <!-- Total Amount -->
        <div class="total-amount">
          <div class="row">
            <div class="col-lg-4 col-md-7 col-12 ml-auto">
              <div class="right">
                <?php $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `rb_penjualan_temp` a JOIN rb_produk b ON a.id_produk=b.id_produk where a.session='".$this->session->idp."'")->row_array();?>
                <ul>
                  <li>Cart Subtotal<span>Rp. <?=number_format($total['total'], 0, ',', '.');?></span></li>
                </ul>
                <div class="button5">
                  <a href="<?=base_url();?>produk/checkouts" class="btn">Checkout</a>
                  <a href="<?=base_url();?>produk" class="btn">Continue shopping</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ End Total Amount -->
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
<!--/ End Shopping Cart -->