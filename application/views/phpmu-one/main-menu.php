      <div class="head">
        <div class='container title-head'>

          <div class='col-md-8'>
            <?php
            $logo = $this->Model_app->view_ordering_limit('logo', 'id_logo', 'DESC', 0, 1);
            foreach ($logo->result_array() as $row) {
              echo "<a href='" . base_url() . "'><img height=50px src='" . base_url() . "asset/images/$row[gambar]'/></a>";
            }
            ?>
          </div>

          <div class='col-md-4'>
            <span class='pull-right' style='width:100%;'>
              <small class='pull-right'>
                <?php
                if ($this->session->id_konsumen != '') {
                  $ksm = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='" . $this->session->id_konsumen . "'")->row_array();
                  echo "Selamat Datang! <a href='" . base_url() . "members/profile'>$ksm[nama_lengkap]</a> &raquo; <a href='" . base_url() . "members/logout'>Logout</a>";
                } else {
                  $topm = $this->Model_menu->top_menu();
                  foreach ($topm->result_array() as $row) {
                    echo "<a href='" . base_url() . "$row[link]'>$row[nama_menu]</a> &raquo; ";
                  }
                }
                ?>
              </small>

              <form action='<?php echo base_url(); ?>produk' method='POST' class="form-inline">
                <div class="form-group" style='width:100%;'>
                  <input type="text" name='cari' style='width:100%;' class="form-control search" placeholder="Pencarian...">
                  <input type="submit" name='submit' class='hidden'>
                </div>
              </form>
            </span>
          </div>

        </div>
      </div>

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
            $botm = $this->Model_menu->bottom_menu();
            foreach ($botm->result_array() as $row) {
              $dropdown = $this->Model_menu->dropdown_menu($row['id_menu'])->num_rows();
              if ($dropdown == 0) {
                echo "<li><a href='" . base_url() . "$row[link]'>$row[nama_menu]</a></li>";
              } else {
                echo "<li class='dropdown'>
                            <a href='" . base_url() . "$row[link]' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$row[nama_menu] 
                            <span class='caret'></span></a>
                            <ul class='dropdown-menu'>";
                $dropmenu = $this->Model_menu->dropdown_menu($row['id_menu']);
                foreach ($dropmenu->result_array() as $row) {
                  echo "<li><a href='" . base_url() . "$row[link]'>$row[nama_menu]</a></li>";
                }
                echo "</ul>
                          </li>";
              }
            }
            $kategori = $this->Model_app->view('rb_kategori_produk');
            echo "<li class='dropdown visible-xs'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Kategori Produk 
                            <span class='caret'></span></a>
                            <ul class='dropdown-menu'>";
            foreach ($kategori->result_array() as $row) {
              echo "<li><a href='" . base_url() . "produk/kategori/$row[kategori_seo]'>$row[nama_kategori]</a></li>";
            }
            echo "</ul></li>";
            ?>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            $isi_keranjang = $this->db->query("SELECT sum(jumlah) as jumlah FROM rb_penjualan_temp where session='" . $this->session->idp . "'")->row_array();
            echo "<li><a href='" . base_url() . "produk/keranjang'>Keranjang (" . rupiah($isi_keranjang['jumlah']) . ")</a></li>";
            if ($this->session->id_konsumen) {
              echo "<li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-th-list'></span> Menu <span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='" . base_url() . "members/profile'>Profile</a></li>
                            <li><a href='" . base_url() . "members/history'>Histori Belanja</a></li>
                            <li><a href='" . base_url() . "members/logout'>Logout</a></li>
                        </ul>
                    </li>";
            }
            ?>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>