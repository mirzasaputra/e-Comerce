        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="<?=base_url();?>">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="<?=base_url();?>produk/all"><?=$judul;?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										<?php foreach($kategori->result_array() as $row) : ?>
											<li><a href="<?=base_url();?>produk/kategori/<?=$row['kategori_seo'];?>"><?=$row['nama_kategori'];?></a></li>
										<?php endforeach;?>
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<?php foreach($recent_post->result_array() as $row) : ?>
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="<?=base_url();?>asset/foto_produk/<?=$row['gambar'];?>" alt="<?=$row['nama_produk'];?>">
										</div>
										<div class="content">
											<h5><a href="<?=base_url();?>produk/detail/<?=$row['produk_seo'];?>"><?=$row['nama_produk'];?></a></h5>
											<?php
											if($this->session->level == 'konsumen'){
												$harga = $row['harga_konsumen'];
											} else {
												$harga = $row['harga_reseller'];
											}
											?>
											<p class="price">Rp. <?=number_format($harga, '0', ',', '.');?></p>
										</div>
									</div>
									<!-- End Single Post -->
									<?php endforeach;?>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Sort By :</label>
											<select id="shortBy">
												<option selected="selected" value="nama_produk">Name</option>
												<option value="harga_konsumen">Price</option>
											</select>
										</div>
									</div>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row" id="viewData">
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	
		
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
        
        <script>
            $(document).ready(function(){
                loadData_all();

                function loadData_all(){
                    var order_by = $('#shortBy').val();
                    $.ajax({
                        url: '<?=base_url();?>produk/all_ajax',
                        method: 'GET',
                        data: {order_by: order_by},
                        success: function(data){
                            $('#viewData').html(data);

							$('.detailProduk').click(function(){
								let id = $(this).attr('value');
								$.ajax({
									url: "<?=base_url();?>Produk/detail/ajax",
									method: "post",
									data: {id: id},
									success: function(data){
									$('#viewDetailProduk').html(data);
									}
								})
							})
                        }
                    })

                    $('#shortBy').change(function(){
                        loadData_all();
                    })
                }
            })
        </script>