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
<section class="shop-blog section <?php if(isset($kategori) || isset($tag) || isset($search) || $berita->num_rows() <= 0) echo 'p-0 pt-3';?>">
    <div class="container">
        <?php if(isset($kategori)) : ?>
            <p>
                <big>Menampilkan data dengan kategori : <b><?=$kategori;?></b><br></big>
                Ditemukan : <?=$berita->num_rows();?> Blog.
            </p>
            <br>
        <?php endif;?>
        <?php if(isset($tag)) : ?>
            <p>
                <big>Menelusuri <b>#<?=$tag;?></b><br></big>
                Ditemukan : <?=$berita->num_rows();?> Blog.
            </p>
            <br>
        <?php endif;?>
        <?php if(isset($search)) : ?>
            <p>
                <big>Hasil Pencarian <b><?=$search;?><br></big>
                Ditemukan : <?=$berita->num_rows();?> Blog.
            </p>
            <br>
        <?php endif;?>
        <?php if($berita->num_rows() <= 0) : ?>
            <div class="mx-auto text-center my-5">
                <h5 class="text-muted">Item tidak ditemukan</h5>
            </div>
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