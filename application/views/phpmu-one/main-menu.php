	<?php $kategori = $this->Model_app->view('rb_kategori_produk'); ?>
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> <?=$iden['no_telp'];?></li>
								<li><i class="ti-email"></i> <?=$iden['email'];?></li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
<<<<<<< HEAD
								<li><i class="ti-location-pin"></i> Store location</li>
								<?php if (isset($this->session->id_konsumen)) : ?>
									<li><i class="ti-user"></i> <a href="<?= base_url(); ?>members/profile">My account</a></li>
								<?php endif; ?>
								<?php if (empty($this->session->id_konsumen)) : ?>
									<li><i class="ti-power-off"></i><a href="<?= base_url(); ?>auth/login">Login</a></li>
								<?php endif; ?>
=======
								<li><a href="<?=base_url();?>page/location/"><i class="ti-location-pin"></i> Store Location</a></li>
								<?php if(isset($this->session->id_konsumen)) : ?>
									<li><i class="ti-user"></i> <a href="<?=base_url();?>members/profile">My account</a></li>
								<?php endif;?>
								<?php if(empty($this->session->id_konsumen)) : ?>
									<li><i class="ti-power-off"></i><a href="<?=base_url();?>auth/login">Login</a></li>
								<?php endif;?>
>>>>>>> ea7f0b0c23219943668c9be3eec5a5aadb82f772
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<?php
							$logo = $this->Model_app->view_ordering_limit('logo', 'id_logo', 'DESC', 0, 1);
							foreach ($logo->result_array() as $row) {
								echo "<a href='" . base_url() . "'><img class='logo-image-nav' height=50px src='" . base_url() . "asset/images/$row[gambar]'/></a>";
							}
							?>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" class="search-input" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<form class="w-100">
									<input name="search" class="w-100 search-input" placeholder="Search Products Here....." type="search">
									<i class="fa fa-search"></i>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar shopping" id="viewCart">

								<!--/ End Shopping Item -->
							</div>
							<?php if (isset($this->session->id_konsumen)) : ?>
								<div class="sinlge-bar">
									<a href="#" class="single-icon logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container-fluid">
				<div class="cat-nav-head">
					<div class="row px-md-5 m-0">
						<?php if ($module == "home") : ?>
							<div class="col-lg-3" id="category">
								<div class="all-category">
									<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
									<ul class="main-category">
										<?php
										foreach ($kategori->result_array() as $row) {
											echo "<li><a href='" . base_url() . "produk/kategori/$row[kategori_seo]'>$row[nama_kategori]</a></li>";
										}
										?>
									</ul>
								</div>
							</div>
						<?php endif; ?>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
												<?php
												$botm = $this->Model_menu->bottom_menu();
												$no = 1;
												foreach ($botm->result_array() as $row) {
													if ($no == 1) {
														$active = "class='active'";
													} else {
														$active = '';
													}
													$dropdown = $this->Model_menu->dropdown_menu($row['id_menu'])->num_rows();
													if ($dropdown == 0) {
														echo "<li " . $active . "><a href='" . base_url() . "$row[link]'>$row[nama_menu]</a></li>";
													} else {
														echo "<li>
																	<a href='" . base_url() . "$row[link]' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$row[nama_menu] 
																	<span class='ti-angle-down'></span></a>
																	<ul class='dropdown'>";
														$dropmenu = $this->Model_menu->dropdown_menu($row['id_menu']);
														foreach ($dropmenu->result_array() as $row) {
															echo "<li><a href='" . base_url() . "$row[link]'>$row[nama_menu]</a></li>";
														}
														echo "</ul>
																</li>";
													}
													$no++;
												}
												?>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

	<script>
		$('.logout').click(function(e) {
			e.preventDefault();
			swal.fire({
				title: 'Logout?',
				icon: 'question',
				text: 'Yakin ingin keluar?',
				showCancelButton: true,
				confirmButtonColor: '#ff2222',
				confirmButtonText: 'Logout'
			}).then((result) => {
<<<<<<< HEAD
				if (!result.dismiss) {
					window.location.assign('members/logout');
=======
				if(!result.dismiss){
					window.location.assign('<?=base_url();?>members/logout');
>>>>>>> ea7f0b0c23219943668c9be3eec5a5aadb82f772
				}
			});
		})
	</script>