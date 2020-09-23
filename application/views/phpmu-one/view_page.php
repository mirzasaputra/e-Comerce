<?php
if($record['judul'] == 'Cara Belanja'){
    $class = 'col-lg-12 col-12';
    $contact = 'd-none';
} else {
    $class = 'col-lg-8 col-12';
    $contact = 'col-lg-4 col-12';
}
?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?=base_url();?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="<?=base_url();?>page/detail/tentang-kami"><?=$record['judul'];?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="row">
                <div class="<?=$class;?>">
                    <div class="form-main">
                        <h3><?=$record['judul'];?></h3>
                        <hr>
                        <b><span>Oleh : Administrator, <?=$record['dibaca'];?> Views.</span></b>
                        <p>
                            <?=$record['isi_halaman'];?>
                        </p>
                    </div>
                </div>
                <?php
                    $iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
                ?>
                <div class="<?=$contact;?>">
                    <div class="single-head">
                        <div class="single-info">
                            <i class="fa fa-phone"></i>
                            <h4 class="title">Call us Now:</h4>
                            <ul>
                                <li><?=$iden['no_telp'];?></li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-envelope-open"></i>
                            <h4 class="title">Email:</h4>
                            <ul>
                                <li><a href="mailto:<?=$iden['email'];?>"><?=$iden['email'];?></a></li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-location-arrow"></i>
                            <h4 class="title">Our Address:</h4>
                            <ul>
                                <li><?=$iden['alamat'];?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact -->

<?php if($record['judul'] == 'Tentang Kami') : ?>
<div class="container">
    <embed src="<?=$iden['maps'];?>" width="100%" style="height: 60vh">
</div>
<?php endif;?>