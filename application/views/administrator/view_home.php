            <a style='color:#000' href='<?php echo base_url(); ?>administrator/konsumen'>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Konsumen</span>
                    <?php $jmla = $this->db->query("SELECT * FROM rb_konsumen")->num_rows(); ?>
                    <span class="info-box-number"><?php echo $jmla; ?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col -->
            </a>

            <a style='color:#000' href='<?php echo base_url(); ?>administrator/kategori_produk'>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-th-list"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Kategori</span>
                    <?php $jmlb = $this->db->query("SELECT * FROM rb_kategori_produk")->num_rows(); ?>
                    <span class="info-box-number"><?php echo $jmlb; ?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col -->
            </a>

            <a style='color:#000' href='<?php echo base_url(); ?>administrator/produk'>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-th"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Produk</span>
                    <?php $jmlc = $this->db->query("SELECT * FROM rb_produk")->num_rows(); ?>
                    <span class="info-box-number"><?php echo $jmlc; ?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col -->
            </a>

            <a style='color:#000' href='<?php echo base_url(); ?>administrator/orders'>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Transaksi</span>
                    <?php $jmld = $this->db->query("SELECT * FROM rb_penjualan")->num_rows(); ?>
                    <span class="info-box-number"><?php echo $jmld; ?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col -->
            </a>

            <section class="col-lg-6 connectedSortable">
              <?php include "home_grafik.php"; ?>
            </section><!-- /.Left col -->

            <section class="col-lg-6 connectedSortable">
              <?php include "home_berita.php"; ?>

            </section><!-- right col -->