            <div class="hidden-xs">
              <p class='sidebar-title'> &nbsp; Kategori Produk</p>
              <?php
              $kategori = $this->Model_app->view('rb_kategori_produk');
              foreach ($kategori->result_array() as $row) {
                echo "<a style='text-align:left' class='btn btn-sm btn-block btn-primary' href='" . base_url() . "produk/kategori/$row[kategori_seo]'><span class='glyphicon glyphicon-record'></span> $row[nama_kategori]</a>";
              }
              ?>
            </div>

            <p class='sidebar-title'> &nbsp; Informasi Terbaru</p>
            <?php
            $berita = $this->Model_berita->semua_berita(0, 2);
            foreach ($berita->result_array() as $row) {
              $isi_berita = strip_tags($row['isi_berita']);
              $isi = substr($isi_berita, 0, 150);
              $isi = substr($isi_berita, 0, strrpos($isi, " "));
              $tanggal = tgl_indo($row['tanggal']);
              if ($row['gambar'] == '') {
                $foto = 'small_no-image.jpg';
              } else {
                $foto = $row['gambar'];
              }
              echo "<small class='date'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal, $row[jam] WIB</small>
                        <img class='img-thumbnail pull-left' style='width:120px' src='" . base_url() . "asset/foto_berita/$foto'>
                        <a href='" . base_url() . "berita/detail/$row[judul_seo]'>$row[judul]</a>
                        <p>$isi...</p><hr>";
            }


            $iklansidebar = $this->Model_iklan->iklan_sidebar();
            foreach ($iklansidebar->result_array() as $row) {
              $hitung = $this->Model_main->iklan_sidebar()->num_rows();
              if ($hitung >= 1) {
                if (preg_match("/swf\z/i", $row['gambar'])) {
                  echo "<div><a target='_BLANK' title='" . $row['judul'] . "' href='" . $row['url'] . "'><embed class='img-thumbnail' src='" . base_url() . "asset/foto_iklan/" . $row['gambar'] . "' width='100%' quality='high' type='application/x-shockwave-flash'></a></div>";
                } else {
                  echo "<div><a target='_BLANK' title='" . $row['judul'] . "' href='" . $row['url'] . "'><img class='img-thumbnail' width='100%' src='" . base_url() . "asset/foto_iklan/" . $row['gambar'] . "'></a></div>";
                }
              }
            }
            ?>