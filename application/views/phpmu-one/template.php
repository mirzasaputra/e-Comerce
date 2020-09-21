<?php
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="phpmu.com">
	<meta name="description" content="<?php echo $iden['meta_deskripsi']; ?>">
	<meta name="keywords" content="<?php echo $iden['meta_keyword']; ?>">
	<meta name="robots" content="all,index,follow">
	<meta http-equiv="Content-Language" content="id-ID">
	<meta NAME="Distribution" CONTENT="Global">
	<meta NAME="Rating" CONTENT="General">
	<link rel="canonical" href="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:description" content="<?php echo $iden['meta_deskripsi']; ?>" />
	<meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
	<meta property="og:site_name" content="<?php echo $iden['nama_website']; ?>" />
	<?php $identitas_web = $this->db->get('identitas')->row_array() ?>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>asset/images/<?php echo $identitas_web['favicon'] ?>" />

	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/magnific-popup.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/themify-icons.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/niceselect.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/animate.css">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/flex-slider.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/owl-carousel.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/slicknav.min.css">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/reset.css">
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/style.css">
	<link rel="stylesheet" href="<?=base_url();?>asset/vendor/css/responsive.css">

	<script src="<?=base_url();?>asset/vendor/js/jquery.min.js"></script>
</head>

<body class="js">
  <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	<?php include "main-menu.php"; ?>

	<?php if($module == "home") : ?>
		<?php include "slide.php";?>
	<?php endif;?>

	<div class="container container-content">
		<?=$contents;?>
	</div> <!-- /container -->

	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
  <!-- End Shop Newsletter -->
  
  <!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="<?=base_url();?>"><img src="<?=base_url();?>asset/images/<?=$identitas_web['favicon'];?>" alt="#"></a>
							</div>
							<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789"><?=$iden['no_telp'];?></a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li><?=$iden['alamat'];?></li>
									<li><?=$iden['email'];?></li>
									<li><?=$iden['no_telp'];?></li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->

  <div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h5 class="modal-title" id="myModalLabel">Ganti Foto Profile anda?</h5>
        </div>
        <center>
          <div class="modal-body">
            <?php
            $attributes = array('class' => 'form-horizontal', 'role' => 'form');
            echo form_open_multipart('members/foto', $attributes); ?>

            <div class="form-group">
              <center style='color:#8a8a8a'>Recomended (200 Kb atau 600 x 600) </center><br>
              <label for="inputEmail3" class="col-sm-3 control-label">Pilih Foto</label>
              <div style='background:#fff;' class="input-group col-sm-7">
                <span class="input-group-addon"><i class='fa fa-image fa-fw'></i></span>
                <input style='text-transform:lowercase;' type="file" class="form-control" name="userfile">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-1">
                <button type="submit" name='submit' class="btn btn-primary">Update Foto</button>
              </div>
            </div>

            </form>
            <div style='clear:both'></div>
          </div>
        </center>
      </div>
    </div>
  </div>

  <?php $this->Model_main->kunjungan(); ?>

  	<!-- Jquery -->
	<script src="<?=base_url();?>asset/vendor/js/jquery.min.js"></script>
    <script src="<?=base_url();?>asset/vendor/js/jquery-migrate-3.0.0.js"></script>
	<script src="<?=base_url();?>asset/vendor/js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="<?=base_url();?>asset/vendor/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?=base_url();?>asset/vendor/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="<?=base_url();?>asset/vendor/js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="<?=base_url();?>asset/vendor/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="<?=base_url();?>asset/vendor/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="<?=base_url();?>asset/vendor/js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="<?=base_url();?>asset/vendor/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="<?=base_url();?>asset/vendor/js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?=base_url();?>asset/vendor/js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="<?=base_url();?>asset/vendor/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="<?=base_url();?>asset/vendor/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="<?=base_url();?>asset/vendor/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="<?=base_url();?>asset/vendor/js/easing.js"></script>
	<!-- Active JS -->
  	<script src="<?=base_url();?>asset/vendor/js/active.js"></script>

  <?php include "modal.php"; ?>
</body>

</html>