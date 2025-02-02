            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $title ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
                  $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                  echo form_open_multipart('administrator/tambah_pembelian', $attributes);
                  ?>
                  <table class='table table-condensed table-bordered'>
                    <tbody>
                      <tr>
                        <th width='140px' scope='row'>Kode Pembelian</th>
                        <td><input type='text' class='form-control' value='<?php echo "$rows[kode_pembelian]"; ?>' name='a' autocomplete="off"></td>
                      </tr>
                      <tr>
                        <th scope='row'>Nama Supplier</th>
                        <td><select class='form-control select2' name='b' data-placeholder="Pilih Supplier">
                            <option value=""></option>
                            <?php
                            foreach ($supplier as $r) {
                              if ($r['id_supplier'] == $rows['id_supplier']) {
                                echo "<option value='$r[id_supplier]' selected>$r[nama_supplier]</option>";
                              } else {
                                echo "<option value='$r[id_supplier]'>$r[nama_supplier]</option>";
                              }
                            }
                            ?>
                          </select></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php if ($this->session->idp == '') { ?>
                    <input class='btn btn-primary btn-sm' type="submit" name='submit1' value='Simpan Data'>
                  <?php } ?>
                  <?php if ($this->session->idp != '') { ?>
                    <button type="button" onclick="checkoutBeli()" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> Checkout</button>

                    <hr>
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style='width:40px'>No</th>
                          <th>Nama Produk</th>
                          <th>Harga Pesan</th>
                          <th>Jumlah Pesan</th>
                          <th>Satuan</th>
                          <th>Sub Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      echo "<tr>
                                <td></td>
                                <input type='hidden' value='" . $this->uri->segment(3) . "' name='idpd'>
                                <td><select name='aa' class='combobox form-control' onchange=\"changeValue(this.value)\" autofocus>
                                 <option value='' selected> Cari Barang </option>";
                      $jsArray = "var prdName = new Array();\n";
                      foreach ($barang as $r) {
                        if ($r['id_produk'] == $row['id_produk']) {
                          echo "<option value='$r[id_produk]' selected>$r[nama_produk]</option>";
                          $jsArray .= "prdName['" . $r['id_produk'] . "'] = {name:'" . addslashes($r['harga_beli']) . "',desc:'" . addslashes($r['satuan']) . "'};\n";
                        } else {
                          echo "<option value='$r[id_produk]'>$r[nama_produk]</option>";
                          $jsArray .= "prdName['" . $r['id_produk'] . "'] = {name:'" . addslashes($r['harga_beli']) . "',desc:'" . addslashes($r['satuan']) . "'};\n";
                        }
                      }
                      echo "</select></td>
                                <td><input class='form-control' type='number' name='bb' value='$row[harga_pesan]' id='harga'> </td>
                                <td><input class='form-control' type='number' name='cc' value='$row[jumlah_pesan]'></td>
                                <td><input class='form-control' type='text' name='dd' id='satuan' value='$row[satuan]' readonly='on'> </td>
                                <td></td>
                                <td><button type='submit' name='submit' class='btn btn-success  btn-xs'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
                                    <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/tambah_pembelian'><span class='glyphicon glyphicon-remove'></span></a>
                                </td>
                              </tr>";
                      ?>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($record as $row) {
                          echo "<tr><td>$no</td>
                              <td>$row[nama_produk]</td>
                              <td>Rp " . rupiah($row['harga_pesan']) . "</td>
                              <td>$row[jumlah_pesan]</td>
                              <td>$row[satuan]</td>
                              <td>Rp " . rupiah($row['harga_pesan'] * $row['jumlah_pesan']) . "</td>
                              <td>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='" . base_url() . "administrator/tambah_pembelian/$row[id_pembelian_detail]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_pembelian_tambah_detail/$row[id_pembelian_detail]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </td>
                          </tr>";
                          $no++;
                        }

                        $total = $this->db->query("SELECT sum(a.harga_pesan*a.jumlah_pesan) as total FROM `rb_pembelian_detail` a where a.id_pembelian='" . $this->session->idp . "'")->row_array();
                        echo "<tr class='success'>
                            <td colspan='5'><b>Total</b></td>
                            <td><b>Rp " . rupiah($total['total']) . "</b></td>
                          </tr>";
                        ?>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>
              </div>
            </div>

            <!-- </div> -->

            <!-- Modal Checkout -->

            <div class="modal fade" id="checkoutModalBeli">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Checkout Pembelian</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="control-label mb-1 col-md-3 col-sm-3 col-xs-12">Grand Total</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" readonly class="form-control" value="Rp. <?php echo rupiah($total['total']) ?>">
                          <input type="hidden" name="total" id="total" readonly class="form-control" value="<?php echo $total['total'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label mb-1 col-md-3 col-sm-3 col-xs-12">Payment Method</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="checkbox">
                            <label>
                              <input type="radio" name="metode" id="cash" value="Cash" checked> Cash
                            </label>
                            <label>
                              <input type="radio" name="metode" id="kredit" value="Kredit"> Kredit
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group jatuh-tempo">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jatuh Tempo</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="date" class="form-control" name="tempo" id="tempo" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bayar</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" onkeyup="totalbayar()" name="bayar" id="bayar" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kembali</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="kembali" id="kembali" readonly autocomplete="off">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit1" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


            <script type="text/javascript">
              $('input:radio[name="metode"]').on('change', function() {
                if ($(this).is(':checked') && $(this).val() == "Cash") {
                  $('.jatuh-tempo').hide();
                } else if ($(this).is(':checked') && $(this).val() == "Kredit") {
                  $('.jatuh-tempo').show();
                }
              });

              function totalbayar() {
                const grand = $('#total');
                const bayar = $('#bayar');
                if (bayar.val() == null) {
                  const nilai = 0;
                  bayar.val(nilai);
                } else {
                  const hasil = bayar.val() - grand.val();
                  $('#kembali').val(hasil);
                }

              }

              function checkoutBeli() {
                $('#checkoutModalBeli').modal('show');
              }
              <?php echo $jsArray; ?>

              function changeValue(id) {
                document.getElementById('harga').value = prdName[id].name;
                document.getElementById('satuan').value = prdName[id].desc;
              };
            </script>