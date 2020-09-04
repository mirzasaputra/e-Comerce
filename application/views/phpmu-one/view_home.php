            <p class='sidebar-title'> &nbsp; <?php echo $judul; ?></p>
            <hr>

            <?php
            foreach ($iklantengah->result_array() as $row) {
              $hitung = $this->Model_iklan->iklan_tengah()->num_rows();
              if ($hitung >= 1) {
                if (preg_match("/swf\z/i", $row['gambar'])) {
                  echo "<div><a target='_BLANK' title='" . $row['judul'] . "' href='" . $row['url'] . "'><embed class='img-thumbnail' src='" . base_url() . "asset/foto_iklan/" . $row['gambar'] . "' width='100%' quality='high' type='application/x-shockwave-flash'></a></div>";
                } else {
                  echo "<div><a target='_BLANK' title='" . $row['judul'] . "' href='" . $row['url'] . "'><img class='img-thumbnail' width='100%' src='" . base_url() . "asset/foto_iklan/" . $row['gambar'] . "'></a></div>";
                }
              }
            }
            ?>

            <?php
            if ($this->uri->segment(2) == 'kategori') {
              $cek = $this->Model_app->edit('rb_kategori_produk', array('kategori_seo' => $this->uri->segment(3)))->row_array();
              $jumlah = $this->Model_app->view_where('rb_produk', array('id_kategori_produk' => $cek['id_kategori_produk']))->num_rows();
              if ($jumlah <= 0) {
                echo "<div  style='margin:10%' class='alert alert-info'><center>Maaf, Produk pada Kategori ini belum tersedia..!</center></div>";
              }
            }

            $no = 1;
            foreach ($record->result_array() as $row) {
              if (trim($row['gambar']) == '') {
                $foto_produk = 'no-image.png';
              } else {
                $foto_produk = $row['gambar'];
              }
              // $j = $this->model_app->jual_umum($row['id_produk'])->row_array();
              // $b = $this->model_app->beli_umum($row['id_produk'])->row_array();
              // $stok = $b['beli']-$j['jual'];

              echo "<div class='col-sm-2 col-xs-6 produk'>
                        <center>";
              if ($row['stok'] == '0') {
                $blur = 'blur';
                $status = '<div class="stok">SOLD OUT</div>';
              } else {
                $blur = 'normal';
                $status = '';
              }
              echo "<a href='" . base_url() . "produk/detail/$row[produk_seo]'><p style='line-height:20px'>$row[nama_produk]</p><img class='$blur' src='" . base_url() . "asset/foto_produk/$foto_produk'> $status";
              if ($row['diskon'] == '0') {
                echo "<span style='color:green;'>Rp " . rupiah($row['harga_konsumen']) . "</span><br>";
              } else {
                echo "<span style='color:green;'>Rp " . rupiah($row['harga_konsumen'] - $row['diskon']) . "</span>
                <span style='color:#8a8a8a;'><del>" . rupiah($row['harga_konsumen']) . "</del></span><br>";
              }

              echo "<b>Stok $row[stok]</b><br>
                          </a><br>
                        </center>
                    </div>";
              if ($no % 6 == 0) {
                echo "<hr>";
              }
              $no++;
            }

            echo "<div style='clear:both'></div>";
            echo $this->pagination->create_links(); ?>