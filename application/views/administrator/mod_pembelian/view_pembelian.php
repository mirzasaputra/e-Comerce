            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Transaksi Pembelian</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_pembelian'><i class="fa fa-shopping-cart"></i> Tambah Pembelian</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Kode Pembelian</th>
                        <th>Supplier</th>
                        <th>Waktu Pembelian</th>
                        <th>Metode Pembayaran</th>
                        <th>Total</th>
                        <th>Tunai</th>
                        <th style='width:120px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($record as $row) {
                        $total = $this->db->query("SELECT sum(a.harga_pesan*a.jumlah_pesan) as total FROM `rb_pembelian_detail` a where a.id_pembelian='$row[id_pembelian]'")->row_array();
                        echo "<tr><td>$no</td>
                              <td>$row[kode_pembelian]</td>
                              <td>$row[nama_supplier]</td>
                              <td>$row[waktu_beli]</td>
                              <td>$row[method]</td>
                              <td style='color:red;'>Rp " . rupiah($total['total']) . "</td>
                              <td style='color:green;'>Rp " . rupiah($row['bayar']) . "</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Detail Data' href='" . base_url() . "administrator/detail_pembelian/$row[id_pembelian]'><span class='glyphicon glyphicon-search'></span> Detail Pembelian</a>
                              </center></td>
                          </tr>";
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>