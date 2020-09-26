<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?=base_url();?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li><a href="<?=base_url();?>berita">Produk Detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
			
<!-- Start Blog Single -->
<section class="blog-single section">
    <div class="container">
        <div class="row">
        <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <h3 class="title">Categories</h3>
                        <ul class="categor-list">
                            <?php foreach($kategori->result_array() as $row) : ?>
                                <li><a href="#"><?=$row['nama_kategori'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget recent-post">
                        <h3 class="title">Recent post</h3>
                        <?php foreach($recent_post->result_array() as $row) : ?>
                        <!-- Single Post -->
                        <div class="single-post">
                            <div class="image">
                                <img src="<?=base_url();?>asset/foto_berita/<?=$row['gambar'];?>" alt="<?=$row['judul'];?>">
                            </div>
                            <div class="content">
                                <h5><a href="#"><?=$row['nama_produk'];?></a></h5>
                                <?php 
                                    if($this->session->level == 'Reseller'){
                                        $harga = $row['harga_reseller'];
                                    } else {
                                        $harga = $row['harga_konsumen'];
                                    }
                                ?>
                                <p>Rp. <?=number_format($harga, 0, ',', '.');?></p>
                            </div>
                        </div>
                        <!-- End Single Post -->
                        <?php endforeach;?>
                    </div>
                    <!--/ End Single Widget -->
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="carousel slide" id="exampleCarousel" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?=base_url();?>asset/foto_produk/<?=$record['gambar'];?>" class="w-100" alt="">
                                    </div>
                                    <?php foreach($images->result_array() as $row) : ?>
                                    <div class="carousel-item">
                                        <img src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" class="w-100" alt="">
                                    </div>
                                    <?php endforeach;?>
                                </div>

                                <?php if($images->num_rows > 0) : ?>
                                <a href="#exampleCarousel" class="carousel-control-prev produk-detail" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#exampleCarousel" class="carousel-control-next produk-detail" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <?php endif;?>
                            </div>
                            <div class="blog-detail">
                                <div class="quickview-content p-0">
                                    <h2 class="blog-title"><?=$record['nama_produk'];?></h2>
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
                                        <p><?=$record['keterangan'];?></p>
                                    </div>
                                    <div class="size">
                                        <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select id="size">
                                            <option selected="selected">s</option>
                                            <option>m</option>
                                            <option>l</option>
                                            <option>xl</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Color</h5>
                                            <select id="color">
                                            <option selected="selected">orange</option>
                                            <option>purple</option>
                                            <option>black</option>
                                            <option>pink</option>
                                            </select>
                                        </div>
                                        </div>
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
                                </div>
                            </div>
                        </div>			
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Blog Single -->