            <p class='sidebar-title'> &nbsp; <?php echo $judul; ?></p>
            <hr>
            <?php
            if (trim($row['gambar']) == '') {
              $foto_produk = 'no-image.png';
            } else {
              $foto_produk = $row['gambar'];
            }
            // $j = $this->model_app->jual_umum($row['id_produk'])->row_array();
            // $b = $this->model_app->beli_umum($row['id_produk'])->row_array();
            // $stok = $b['beli'] - $j['jual'];
            echo "<div class='col-sm-6'>
                        <center><img style='min-height:88px; width:90%' src='" . base_url() . "asset/foto_produk/$foto_produk'></center>
                    </div>
                    <div class='col-sm-6'>
                          <h2>$row[nama_produk]</h2>";
            if ($row['diskon'] == '0') {
              echo "<span style='color:green; font-size:20px'>Rp " . rupiah($row['harga_konsumen']) . "</span><br>";
            } else {
              echo "<span style='color:green; font-size:20px'>Rp " . rupiah($row['harga_konsumen'] - $row['diskon']) . "</span> &nbsp; 
                                  <span style='color:#8a8a8a; font-size:20px'><del>" . rupiah($row['harga_konsumen']) . "</del></span><br>";
            }
            echo "<hr>
                          <form action='" . base_url() . "produk/keranjang' method='POST'>
                          <input type='hidden' name='id_produk' value='$row[id_produk]'>
                          Quantity <input class='form-control ' type='number' name='jumlah' value='1' style='width:150px; diplay:inline-block'><br>
                          Keterangan <textarea class='form-control ' type='number' name='keterangan' placeholder='Ex : Ukuran, warna, dll'></textarea><br>
                          <input class='btn btn-success btn-sm' type='submit' value='Beli Sekarang'>
                          </form>
                          <hr>

                          $row[keterangan]<br>
                          <div class='addthis_toolbox addthis_default_style'>
                              <a class='addthis_button_preferred_1'></a>
                              <a class='addthis_button_preferred_2'></a>
                              <a class='addthis_button_preferred_3'></a>
                              <a class='addthis_button_preferred_4'></a>
                              <a class='addthis_button_compact'></a>
                              <a class='addthis_counter addthis_bubble_style'></a>
                          </div>
                          <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f8aab4674f1896a'></script>
                    </div>
                    <div style='clear:both'><br></div>";
            ?>
            <div class="yotpo yotpo-main-widget" data-product-id="SKU/Product_ID" data-price="Product Price" data-currency="Price Currency" data-name="Product Title" data-url="The url to the page where the product is (url escaped)" data-image-url="The product image url. Url escaped" data-description="Product description">
            </div>