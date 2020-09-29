<div class="row no-gutters">
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <!-- Product Slider -->
      <div class="product-gallery">
        <div class="quickview-slider-active">
          <div class="single-slider">
            <img src="<?=base_url();?>asset/foto_produk/<?=$record['gambar'];?>" alt="<?=$record['nama_produk'];?>">
          </div>

          <?php if($images->num_rows() <= 0) : ?>
          <div class="single-slider">
            <img src="<?=base_url();?>asset/foto_produk/<?=$record['gambar'];?>" alt="<?=$record['nama_produk'];?>">
          </div>
          <?php endif;?>
          
          <?php foreach($images->result_array() as $row) : ?>
          <div class="single-slider">
            <img src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="<?=$record['nama_produk'];?>">
          </div>
          <?php endforeach;?>
        </div>
      </div>
    <!-- End Product slider -->
  </div>
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="quickview-content">
      <h2><?=$record['nama_produk'];?></h2>
      <div class="quickview-ratting-review">
        <div class="quickview-stock m-0">
          <?php
          if($record['stok'] > 0){
            $class = "fa fa-check-circle-o";
            $stok = $record['stok'] . ' in stok';
          } else {
            $class = "fa fa-times-circle text-danger";
            $stok = 'out of stok';
          }
          ?>
          <span class=""><i class="<?=$class;?>"></i> <?=$stok;?></span>
        </div>
      </div>
      <?php
      if($this->session->level == "Reseller"){
        $harga = $record['harga_reseller'];
      } else {
        $harga = $record['harga_konsumen'];
      }
      ?>
      <h3>Rp. <?=number_format($harga, '0', ',', '.');?></h3>
      <div class="quickview-peragraph">
        <p><?=substr($record['keterangan'], 0, 150);?>... <a href="<?=base_url();?>produk/detail/<?=$record['produk_seo'];?>" class="detail-produk-link">Selengkapnya</a></p>
      </div>
      <div class="size">
        <textarea id="keterangan" rows="3" placeholder="Keterangan size, color, dll."></textarea>
      </div>
      <input type="hide" class="d-none" id="id_produk" value="<?=$record['id_produk'];?>">
      <input type="hide" class="d-none" id="diskon" value="<?=$record['diskon'];?>">
      <div class="quantity">
        <!-- Input Order -->
        <div class="input-group">
          <div class="button minus">
            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
              <i class="ti-minus"></i>
            </button>
          </div>
          <input type="text" name="quant[1]" id="qty" class="input-number"  data-min="1" data-max="1000" value="1">
          <div class="button plus">
            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
              <i class="ti-plus"></i>
            </button>
          </div>
        </div>
        <!--/ End Input Order -->
      </div>
      <div class="add-to-cart">
        <a href="#" class="btn <?php if($record['stok'] <= 0) echo 'disabled';?> add">Add to cart</a>
      </div>
      <div class="default-social">
        <h4 class="share-now">Share:</h4>
        <ul>
          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
          <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Nice Select JS -->
<script src="<?=base_url();?>asset/vendor/js/nicesellect.js"></script>

<script>
  $('.quickview-slider-active').owlCarousel({
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
    smatrspeed: 400,
    autoplayHovePause: true,
    nav: true,
    loop: true,
    dots: false,
    navText: ['<i class=" ti-arrow-left"></i>', '<i class=" ti-arrow-right"></i>']
  });
  $('select').niceSelect();
</script>