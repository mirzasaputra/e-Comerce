 <div class="container container-content"> 
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
                              <a title="Add to cart" href="#exampleModal" data-toggle="modal" class="detailProduk" value="<?=$row['id_produk'];?>">Add to cart</a>
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
            <?php foreach($hotItem->result_array() as $row) : ?>
            <!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>">
									<img class="default-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
									<img class="hover-img" src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="#">
									<?php if($row['stok'] <= 0) : ?>
                    <span class="out-of-stok">Out Of Stok</span>
                  <?php endif;?>
                  <span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" class="detailProduk" title="Quick View" value="<?=$row['id_produk'];?>" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#exampleModal" data-toggle="modal" class="detailProduk" value="<?=$row['id_produk'];?>">Add to cart</a>
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
</div>
  
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

    loadData_all();

    function loadData_all(){
      var order_by = $('#shortBy').val();
      var ajax = '<?=$module;?>';
      var kategori = '<?=$this->uri->segment(3);?>';
      $.ajax({
          url: '<?=base_url();?>produk/all_ajax',
          method: 'GET',
          data: {order_by: order_by, ajax: ajax, kategori: kategori},
          success: function(data){
            $('#viewData').html(data);

            $('.detailProduk').click(function(){
            $('.modal-backdrop').remove();
            let id = $(this).attr('value');
            $.ajax({
              url: "<?=base_url();?>Produk/detail/ajax",
              method: "post",
              data: {id: id},
              success: function(data){
                $('#viewDetailProduk').html(data);
                
                $('.add').click(function(e){
                  e.preventDefault();
                  var id_konsumen = '<?=$this->session->id_konsumen;?>';

                  if(id_konsumen !== ''){
                    var id_produk = $('#id_produk').val();
                    var jumlah = $('#qty').val();
                    var keterangan = 'Size: '+$('#size').val()+', Color: '+$('#color').val();
                    var diskonnilai = $('#diskon').val();

                    $.ajax({
                      url: '<?=base_url();?>produk/keranjang',
                      method: 'post',
                      data: {id_produk: id_produk, jumlah: jumlah, keterangan: keterangan, diskonnilai: diskonnilai},
                      dataType: 'json',
                      success: function(data){
                        if(data.hasil == true){
                        $('#exampleModal').modal('hide');
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        $('body').attr('style', '');
                        swal.fire({
                          title: 'Success',
                          icon: 'success',
                          text: data.pesan
                        });
                        loadData_all();
                        loadData();
                        } else {
                        swal.fire({
                          title: 'Warning',
                          icon: 'question',
                          text: data.pesan
                        });
                        }
                      }
                    })
                  } else {
                    window.location.assign('<?=base_url();?>auth/login');
                  }
                })
              }
            })
          })
        }
      })
    }
  })
</script>