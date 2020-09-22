<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?=base_url();?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="<?=base_url();?>berita">Berita</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <?php if(isset($kategori)) : ?>
        <h5>Menampilkan data dengan kategori : <?=$kategori;?></h5><br>
        <?php endif;?>
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