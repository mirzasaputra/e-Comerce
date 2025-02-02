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
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/magnific-popup.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/themify-icons.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/niceselect.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/animate.css">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/flex-slider.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/owl-carousel.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/slicknav.min.css">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/reset.css">
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>asset/vendor/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/admin/plugins/'); ?>sweetalert2/dist/sweetalert2.min.css" />

	<script src="<?= base_url(); ?>asset/vendor/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>asset/vendor/js/nicesellect.js"></script>
	<script src="<?= base_url(); ?>asset/vendor/js/owl-carousel.js"></script>
	<script src="<?php echo base_url('asset/admin/plugins/') ?>sweetalert2/dist/sweetalert2.min.js"></script>

	<script>
		loadData();

		function loadData() {
			$.ajax({
				url: '<?= base_url(); ?>produk/cart/',
				method: 'GET',
				success: function(data) {
					$('#viewCart').html(data);

					$('.remove').click(function(e) {
						e.preventDefault();
						$.ajax({
							url: $(this).attr('href'),
							success: function(data) {
								loadData();
							}
						})
					})
					// 		}
					// 	})

					// }

				}
			})
		}


		function toDuit(number) {
			var number = number.toString(),
				duit = number.split('.')[0],
				duit = duit.split('').reverse().join('')
				.replace(/(\d{3}(?!$))/g, '$1.')
				.split('').reverse().join('');
			return 'Rp. ' + duit;
		}
	</script>
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

	<?php if ($module !== 'login') include "main-menu.php"; ?>

	<div id="contentFirst">
		<?php if ($module == "home") : ?>
			<?php include "slide.php"; ?>
		<?php endif; ?>

		<?= $contents; ?>
	</div>

	<div id="contentSearch"></div>
	<?php
	$wa = $this->db->get_where('settings', ['name' => 'wa'])->row_array();
	?>
	<!--Icon Whatsapp-->
	<a href="https://api.whatsapp.com/send?phone=<?php echo $wa['key'] ?>&text=<?php echo pesan_wa($wa['value']) ?>" target="_blank" class="whatsapp-icon">
		<i class="fa fa-whatsapp"></i>
	</a>

	<div id="loading" class="loading-search alert bg-light mx-auto my-3 d-none text-center">
		<h4><i class="fa fa-spinner fa-spin"></i></h4>
		<p>Loading...</p>
	</div>

	<?php if ($module !== 'login') : ?>
		<?php if ($module == "home") : ?>
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
		<?php endif; ?>

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
									<a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>asset/images/<?= $identitas_web['favicon']; ?>" alt="#"></a>
								</div>
								<p class="text"><?php echo $iden['meta_deskripsi'] ?></p>
								<p class="call">Ada Pertanyaan ? Silakan hubungi kontak dibawah<span><a href="tel:123456789"><?= $iden['no_telp']; ?></a></span></p>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Information</h4>
								<ul>
									<?php
									// $row = $this->db->get_where('menu', array('nama_menu' => 'Informasi'))->row_array();
									// $dropmenu = $this->Model_menu->dropdown_menu($row['id_menu']);
									// foreach ($dropmenu->result_array() as $row) {
									// 	echo "<li><a href='" . base_url() . "$row[link]'>$row[nama_menu]</a></li>";
									// }
									?>
									<li><a href="<?php echo base_url('berita') ?>">Blog</a></li>
									<li><a href="<?php echo base_url('page/detail/cara-belanja') ?>">Cara Belanja</a></li>
									<li><a href="<?php echo base_url('page/detail/tentang-kami') ?>">Tentang Kami</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer social">
								<h4>Get In Tuch</h4>
								<iframe src="<?= $iden['maps']; ?>" frameborder="0"></iframe>
								<!-- Single Widget -->
								<div class="contact">
									<ul>
										<li><?= $iden['alamat']; ?></li>
										<li><?= $iden['email']; ?></li>
										<li><?= $iden['no_telp']; ?></li>
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
									<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a> - All Rights Reserved.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /End Footer Area -->

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

		<?php $this->Model_main->kunjungan(); ?>

	<?php endif; ?>

	<!-- Jquery -->
	<script src="<?= base_url(); ?>asset/vendor/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>asset/vendor/js/jquery-migrate-3.0.0.js"></script>
	<script src="<?= base_url(); ?>asset/vendor/js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/easing.js"></script>
	<!-- Active JS -->
	<script src="<?= base_url(); ?>asset/vendor/js/active.js"></script>

	<script>
		// $(document).ready(function() {
		// 	$('#search').keyup(function() {

		$(document).ready(function() {
			$('.search-input').keyup(function() {

				$('#contentFirst').hide();
				$('#category').hide()
				$('#contentSearch').hide();
				$('#loading').removeClass('d-none');


				// if ($('#search').val() == '') {

				if ($('.search-input').val() == '') {

					$('#loading').addClass('d-none');
					$('#contentFirst').show();
					$('#contentSearch').hide();
					$('#category').show();
				} else {
					var search = $(this).val();

					$.ajax({
						url: '<?= base_url(); ?>produk/searching/',
						method: 'post',
						data: {
							search: search
						},
						success: function(data) {
							$('#contentSearch').show();
							$('#loading').addClass('d-none');
							$('#contentFirst').hide();
							$('#contentSearch').html(data);

							$('.detailProduk').click(function() {
								$('.modal-backdrop').remove();
								let id = $(this).attr('value');
								$.ajax({
									url: "<?= base_url(); ?>Produk/detail/ajax",
									method: "post",
									data: {
										id: id
									},
									success: function(data) {
										$('#viewDetailProduk').html(data);

										$('.add').click(function(e) {
											e.preventDefault();
											var id_konsumen = '<?= $this->session->id_konsumen; ?>';
											$('.add').addClass('disabled');
											$('.add').html('<i class="fa fa-spinner fa-spin"></i> Loading...');

											if (id_konsumen !== '') {
												var id_produk = $('#id_produk').val();
												var jumlah = $('#qty').val();
												// var keterangan = 'Size: ' + $('#size').val() + ', Color: ' + $('#color').val();

												var keterangan = $('#keterangan').val();
												var diskonnilai = $('#diskon').val();

												$.ajax({
													url: '<?= base_url(); ?>produk/keranjang',
													method: 'post',
													data: {
														id_produk: id_produk,
														jumlah: jumlah,
														keterangan: keterangan,
														diskonnilai: diskonnilai
													},
													dataType: 'json',
													success: function(data) {
														$('.add').removeClass('disabled')
														$('.add').html('ADD TO CART');
														if (data.hasil == true) {
															$('#exampleModal').modal('hide');
															$('.modal-backdrop').remove();
															$('body').removeClass('modal-open');
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
												window.location.assign('<?= base_url(); ?>auth/login');
											}
										})
									}
								})
							})

						}
					})
				}
			})

			$('.search').keyup(function() {

				$('#contentFirst').hide();
				$('#category').hide()
				$('#contentSearch').hide();
				$('#loading').removeClass('d-none');

				if ($('.search').val() == '') {
					$('#loading').addClass('d-none');
					$('#contentFirst').show();
					$('#contentSearch').hide();
					$('#category').show();
				} else {
					var search = $(this).val();

					$.ajax({
						url: '<?= base_url(); ?>produk/searching/',
						method: 'post',
						data: {
							search: search
						},
						success: function(data) {
							$('#contentSearch').show();
							$('#loading').addClass('d-none');
							$('#contentFirst').hide();
							$('#contentSearch').html(data);

							$('.detailProduk').click(function() {
								$('.modal-backdrop').remove();
								let id = $(this).attr('value');
								$.ajax({
									url: "<?= base_url(); ?>Produk/detail/ajax",
									method: "post",
									data: {
										id: id
									},
									success: function(data) {
										$('#viewDetailProduk').html(data);

										$('.add').click(function(e) {
											e.preventDefault();
											var id_konsumen = '<?= $this->session->id_konsumen; ?>';
											$('.add').addClass('disabled');
											$('.add').html('<i class="fa fa-spinner fa-spin"></i> Loading...');

											if (id_konsumen !== '') {
												var id_produk = $('#id_produk').val();
												var jumlah = $('#qty').val();
												// var keterangan = 'Size: ' + $('#size').val() + ', Color: ' + $('#color').val();

												var keterangan = $('#keterangan').val();
												var diskonnilai = $('#diskon').val();

												$.ajax({
													url: '<?= base_url(); ?>produk/keranjang',
													method: 'post',
													data: {
														id_produk: id_produk,
														jumlah: jumlah,
														keterangan: keterangan,
														diskonnilai: diskonnilai
													},
													dataType: 'json',
													success: function(data) {
														$('.add').removeClass('disabled');
														$('.add').html('ADD TO CART');
														if (data.hasil == true) {
															$('#exampleModal').modal('hide');
															$('.modal-backdrop').remove();
															$('body').removeClass('modal-open');
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
												window.location.assign('<?= base_url(); ?>auth/login');
											}
										})
									}
								})
							})

						}
					})
				}
			})

			loadData_all();

			function loadData_all() {
				var order_by = $('#shortBy').val();
				var ajax = '<?= $module; ?>';
				var kategori = '<?= $this->uri->segment(3); ?>';
				$.ajax({
					url: '<?= base_url(); ?>produk/all_ajax',
					method: 'GET',
					data: {
						order_by: order_by,
						ajax: ajax,
						kategori: kategori
					},
					success: function(data) {
						$('#viewData').html(data);

						$('.detailProduk').click(function() {
							$('.modal-backdrop').remove();
							let id = $(this).attr('value');
							$.ajax({
								url: "<?= base_url(); ?>Produk/detail/ajax",
								method: "post",
								data: {
									id: id
								},
								success: function(data) {
									$('#viewDetailProduk').html(data);

									$('.add').click(function(e) {
										e.preventDefault();
										var id_konsumen = '<?= $this->session->id_konsumen; ?>';
										$('.add').addClass('disabled');
										$('.add').html('<i class="fa fa-spinner fa-spin"></i> Loading');

										if (id_konsumen !== '') {
											var id_produk = $('#id_produk').val();
											var jumlah = $('#qty').val();
											// var keterangan = 'Size: ' + $('#size').val() + ', Color: ' + $('#color').val();

											var keterangan = $('#keterangan').val();
											var diskonnilai = $('#diskon').val();

											$.ajax({
												url: '<?= base_url(); ?>produk/keranjang',
												method: 'post',
												data: {
													id_produk: id_produk,
													jumlah: jumlah,
													keterangan: keterangan,
													diskonnilai: diskonnilai
												},
												dataType: 'json',
												success: function(data) {
													$('.add').removeClass('disabled');
													$('.add').html('ADD TO CART');
													if (data.hasil == true) {
														$('#exampleModal').modal('hide');
														$('.modal-backdrop').remove();
														$('body').removeClass('modal-open');
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
											window.location.assign('<?= base_url(); ?>auth/login');
										}
									})
								}
							})
						})
					}
				})

				$('#shortBy').change(function() {
					loadData_all();
				})
			}
		})
	</script>
</body>

</html>