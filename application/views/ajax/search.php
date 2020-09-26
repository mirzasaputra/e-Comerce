<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?=base_url();?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li><a href="<?=base_url();?>berita">Searching</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Product Area -->
<div class="product-area section pt-2">
    <div class="container">
      <div class="row">
        <div class="col-12">
          Hasil Pencarian dari : <b><?=$search;?></b><br>
          Jumlah : <?=$jumlah;?> items
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="product-info">
            <div class="tab-content" id="myTabContent">
              <!-- Start Single Tab -->
              <div class="tab-pane fade show active" id="man" role="tabpanel">
                <div class="tab-single">
                  <div class="row">
                    
                    <?php $no = 1;foreach($record->result_array() as $row) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
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
                              <a href="#" data-toggle="modal" class="detailProduk" data-target="#exampleModal" value="<?=$row['id_produk'];?>" title="Quick View"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                            </div>
                            <div class="product-action-2">
                              <a title="Add to cart" href="#">Add to cart</a>
                            </div>
                          </div>
                        </div>
                        <div class="product-content">
                          <h3><a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>"><?=$row['nama_produk'];?></a></h3>
                          <div class="product-price">
                            <?php
                            if($this->session->level == "Reseller"){
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
                    <?php if($no % 8 == 0) : ?>
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

                  </div>
                </div>
              </div>
              <!--/ End Single Tab -->
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- End Product Area -->