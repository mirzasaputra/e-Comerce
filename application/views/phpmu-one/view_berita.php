<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?=base_url();?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li><a href="<?=base_url();?>berita">Berita</a></li>
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
            <div class="col-lg-8 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="image">
                                <img src="<?=base_url();?>asset/foto_berita/<?=$record['gambar'];?>" alt="#">
                            </div>
                            <div class="blog-detail">
                                <h2 class="blog-title"><?=$record['judul'];?></h2>
                                <div class="blog-meta">
                                    <?php $tanggal = tgl_indo($record['tanggal']);?>
                                    <span class="author"><a href="#"><i class="fa fa-user"></i>By <?=$record['nama_lengkap'];?></a><a href="#"><i class="fa fa-calendar"></i><?=$record['hari'];?>, <?=$tanggal;?>, <?=$record['jam'];?></a></span>
                                </div>
                                <div class="content">
                                   <p><?=$record['isi_berita'];?></p>
                                </div>
                            </div>
                            <div class="share-social">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="content-tags">
                                            <h4>Tags:</h4>
                                            <ul class="tag-inner">
                                                <?php
                                                $tag = explode(',', $record['tag']);
                                                foreach($tag as $row) : 
                                                ?>
                                                <li><a href="<?=base_url();?>berita/tag/<?=$row;?>"><?=$row;?></a></li>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>			
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget search">
                        <form class="form" action="<?=base_url();?>berita/search/">
                            <input type="text" name="search" placeholder="Search Here...">
                            <button type="submit" class="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <h3 class="title">Blog Categories</h3>
                        <ul class="categor-list">
                            <?php foreach($blog_kategori->result_array() as $row) : ?>
                                <li><a href="<?=base_url();?>berita/kategori/<?=$row['kategori_seo'];?>"><?=$row['nama_kategori'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget recent-post">
                        <h3 class="title">Recent post</h3>
                        <?php foreach($infoterbaru->result_array() as $row) : ?>
                        <!-- Single Post -->
                        <div class="single-post">
                            <div class="image">
                                <img src="<?=base_url();?>asset/foto_berita/<?=$row['gambar'];?>" alt="<?=$row['judul'];?>">
                            </div>
                            <div class="content">
                                <h5><a href="<?=base_url();?>berita/detail/<?=$row['judul_seo'];?>"><?=$row['judul'];?></a></h5>
                                <ul class="comment">
                                    <?php $tanggal = tgl_indo($row['tanggal']);?>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?=$row['hari'];?>, <?=$tanggal;?></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Post -->
                        <?php endforeach;?>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget side-tags">
                        <h3 class="title">Tags</h3>
                        <ul class="tag">
                            <?php foreach($tags->result_array() as $row) : ?>
                                <li><a href="<?=base_url();?>berita/tag/<?=$row['tag_seo'];?>"><?=$row['nama_tag'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Blog Single -->