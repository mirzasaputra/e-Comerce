<?php if($num_rows > 0){ ?>
<?php $no = 1;foreach($record as $row) : ?>
<div class="col-lg-4 col-md-6 col-12">
    <div class="single-product">
        <div class="product-img">
            <a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>">
                <img class="default-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
                <img class="hover-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
                <?php if($row['stok'] <= 0) : ?>
                    <span class="out-of-stok">Out Of Stok</span>
                <?php endif;?>
                <?php if($row['diskon'] > 0) : ?>
                    <span class="price-dec"><?=ceil($row['diskon'] * 100 / $row['harga_konsumen']);?>% Off</span>
                <?php endif;?>
            </a>
            <div class="button-head">
                <div class="product-action">
                    <a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>" data-toggle="modal" class="detailProduk" data-target="#exampleModal" value="<?=$row['id_produk'];?>" title="Quick View"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                </div>
                <div class="product-action-2">
                    <a title="Add to cart" href="#exampleModal" data-toggle="modal" value="<?=$row['id_produk'];?>" class="detailProduk">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>"><?=$row['nama_produk'];?></a></h3>
            <div class="product-price">
                <?php
                if($this->session->level == "reseller"){
                    $harga = $row['harga_reseller'];
                } else {
                    $harga = $row['harga_konsumen'];
                }
                ?>
                <span>Rp. <?=number_format($harga, '0', ',', '.');;?></span>
            </div>
        </div>
    </div>
</div>
<?php if($no % 9 == 0) : ?>
<div class="col-12 my-3">
    <!-- Start Midium Banner  -->
	<section class="midium-banner">
		<div class="container">
			<div class="row">
                <?php foreach($iklan->result_array() as $row) : ?>
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="<?=base_url();?>asset/foto_iklan/<?=$row['gambar'];?>" alt="<?=$row['judul'];?>">
					</div>
				</div>
                <!-- /End Single Banner  -->
                <?php endforeach;?>
			</div>
		</div>
	</section>
  <!-- End Midium Banner -->
</div>
<?php endif;$no++;?>
<?php endforeach;?>
<?php } else { ?>
    <div class="d-block w-100 text-center text-muted">
    <br><br><br><br>
        <h5>Tidak ditemukan item yang sesuai dengan kategori ini.</h5>
    </div>
<?php } ?>