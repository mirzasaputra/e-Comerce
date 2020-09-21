  <!-- Start Small Banner  -->
  <section class="small-banner section">
		<div class="container-fluid">
			<div class="row">
        <?php foreach($iklantengah->result_array() as $row) : ?>
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="<?=base_url();?>asset/foto_iklan/<?=$row['gambar'];?>" alt="#">
						<div class="content">
							<h3><?=$row['judul'];?></h3>
							<a href="<?=$row['url'];?>">Discover Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
        <?php endforeach;?>
      </div>
		</div>
	</section>
  <!-- End Small Banner -->
  
  <!-- Start Product Area -->
  <div class="product-area section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h2>Trending Item</h2>
          </div>
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
                    
                    <?php foreach($record->result_array() as $row) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                      <div class="single-product">
                        <div class="product-img">
                          <a href="#">
                            <img class="default-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
                            <img class="hover-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
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
                          <h3><a href="product-details.html"><?=$row['nama_produk'];?></a></h3>
                          <div class="product-price">
                            <?php
                            if($this->session->level == "konsumen"){
                              $harga = $row['harga_konsumen'];
                            } else {
                              $harga = $row['harga_reseller'];
                            }
                            ?>
                            <span>Rp. <?=number_format($harga, '0', ',', '.');;?></span>
                          </div>
                        </div>
                      </div>
                    </div>
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

  <!-- Start Midium Banner  -->
	<section class="midium-banner">
		<div class="container">
			<div class="row">
        <?php
        $iklan = $this->Model_iklan->iklan_sidebar();

        foreach($iklan->result_array() as $row) : ?>
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="<?=base_url();?>asset/foto_iklan/<?=$row['gambar'];?>" alt="<?=$row['judul'];?>">
						<div class="content">
							<h3><?=$row['judul'];?></h3>
							<a href="<?=$row['url'];?>">Discover Now</a>
						</div>
					</div>
				</div>
        <!-- /End Single Banner  -->
        <?php endforeach;?>
			</div>
		</div>
	</section>
  <!-- End Midium Banner -->
  
  <!-- Start Most Popular -->
	<div class="product-area most-popular section">
    <div class="container">
      <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="owl-carousel popular-slider">
            <?php foreach($record->result_array() as $row) : ?>
            <!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="default-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
									<img class="hover-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html"><?=$row['nama_produk'];?></a></h3>
								<div class="product-price">
                  <?php
                  if($this->session->level == "konsumen"){
                    $harga = $row['harga_konsumen'];
                  } else {
                    $harga = $row['harga_reseller'];
                  }
                  ?>
									<span>Rp. <?=number_format($harga, '0', ',', '.');?></span>
								</div>
							</div>
						</div>
            <!-- End Single Product -->
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Most Popular Area -->
  
  <!-- Start Shop Blog  -->
	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>From Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
        <?php foreach($berita->result_array() as $row) : ?>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="<?=base_url();?>asset/foto_berita/<?=$row['gambar'];?>" alt="<?=$row['judul'];?>">
						<div class="content">
              <?php $date = date_create($row['tanggal']);?>
							<p class="date"><?=$row['hari'];?>, <?=date_format($date, 'd M Y');?></p>
							<a href="<?=base_url();?>berita/detail/<?=$row['judul_seo'];?>" class="title"><?=$row['judul'];?></a>
							<a href="<?=base_url();?>berita/detail/<?=$row['judul_seo'];?>" class="more-btn">Continue Reading</a>
						</div>
					</div>
          <!-- End Single Blog  -->
				</div>
        <?php endforeach;?>
			</div>
		</div>
	</section>
  <!-- End Shop Blog  -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
        </div>
        <div class="modal-body" id="viewDetailProduk">
            <!-- Produk detail -->
        </div>
      </div>
    </div>
  </div>
  <!-- Modal end -->

  <script>
    $(document).ready(function(){
      $('.slider1').owlCarousel({
          items: 1,
          slideSpeed: 300,
          nav: false,
          dots: false,
          loop: true,
          autoplay: true,
          stopOnHover: true
      });
      
      $('.detailProduk').click(function(){
          let id = $(this).attr('value');
          $.ajax({
              url: "<?=base_url();?>Produk/detail/ajax",
              method: "post",
              data: {id: id},
              success: function(data){
                $('#viewDetailProduk').html(data);
              }
          })
      })
    })
  </script>