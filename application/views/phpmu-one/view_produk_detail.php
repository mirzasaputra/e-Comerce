<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="<?=base_url();?>">Home<i class="ti-arrow-right"></i></a></li>
            <li class="active"><a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>"><?=$judul;?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<section class="single-produk section">
  <div class="row no-gutters">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <!-- Product Slider -->
      <div class="produk-slide">
        <div class="single-slider">
            <img src="<?=base_url();?>asset/foto_produk/<?=$record['gambar'];?>" alt="<?=$record['nama_produk'];?>">
        </div>

        <?php if($images->num_rows() < 0) : ?>
        <div class="single-slider">
          <img src="<?=base_url();?>asset/foto_produk/<?=$record['gambar'];?>" alt="<?=$record['nama_produk'];?>">
        </div>
        <?php endif;?>
        
        <?php foreach($images->row_array() as $row) : ?>
        <div class="single-slider">
          <img src="<?=base_url();?>asset/foto_produk/<?=$record['gambar'];?>" alt="<?=$record['nama_produk'];?>">
        </div>
        <?php endforeach;?>
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
              $stok = $record['stok'] . 'in stok';
            } else {
              $class = "fa fa-times-circle text-danger";
              $stok = 'out of stok';
            }
            ?>
            <span class=""><i class="<?=$class;?>"></i> <?=$stok;?></span>
          </div>
        </div>
        <?php
        if($this->session->level == "konsumen"){
          $harga = $record['harga_konsumen'];
        } else {
          $harga = $record['harga_reseller'];
        }
        ?>
        <h3>Rp. <?=number_format($harga, '0', ',', '.');?></h3>
        <div class="quickview-peragraph">
          <p><?=substr($record['keterangan'], 0, 150);?>... <a href="<?=base_url();?>produk/detail/<?=$record['produk_seo'];?>" class="detail-produk-link">Selengkapnya</a></p>
        </div>
        <div class="size">
          <div class="row">
            <div class="col-lg-6 col-12">
              <h5 class="title">Size</h5>
              <select>
                <option selected="selected">s</option>
                <option>m</option>
                <option>l</option>
                <option>xl</option>
              </select>
            </div>
            <div class="col-lg-6 col-12">
              <h5 class="title">Color</h5>
              <select>
                <option selected="selected">orange</option>
                <option>purple</option>
                <option>black</option>
                <option>pink</option>
              </select>
            </div>
          </div>
        </div>
        <div class="quantity">
          <!-- Input Order -->
          <div class="input-group">
            <div class="button minus">
              <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                <i class="ti-minus"></i>
              </button>
            </div>
            <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
            <div class="button plus">
              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                <i class="ti-plus"></i>
              </button>
            </div>
          </div>
          <!--/ End Input Order -->
        </div>
        <div class="add-to-cart">
          <a href="#" class="btn">Add to cart</a>
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
</section>

<script>
  $('produk-slide').owlCarousel();
</script>