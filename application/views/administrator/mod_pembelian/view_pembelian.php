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
                        <th>Pembayaran</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Retur</th>
                        <th>Tunai</th>
                        <th style='width:120px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($record as $row) {
                        $id = $row['id_pembelian'];
                        $query = "SELECT SUM(b.total_retur) AS retur FROM retur_pembelian a, retur_pembelian_detail b WHERE a.id_retur_pembelian = b.id_retur_pembelian AND a.id_pembelian = '$id'";
                        $retur = $this->db->query($query)->row_array();

                        $total = $this->db->query("SELECT sum(a.harga_pesan*a.jumlah_pesan) as total, sum(a.jumlah_pesan) as jumlah_pesan FROM `rb_pembelian_detail` a where a.id_pembelian='$row[id_pembelian]'")->row_array();
                      ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $row['kode_pembelian'] ?></td>
                          <td><?php echo $row['nama_supplier'] ?></td>
                          <td><?php echo $row['waktu_beli'] ?></td>
                          <td><?php echo $row['method'] ?></td>
                          <td><?php echo $total['jumlah_pesan'] ?></td>
                          <td style='color:red;'>Rp <?php echo rupiah($total['total']) ?></td>
                          <td style='color:red;'>Rp <?php echo rupiah($retur['retur']) ?></td>
                          <td style='color:green;'>Rp <?php echo rupiah($row['bayar']) ?></td>
                          <td>
                            <center>
                              <a class='btn btn-success btn-xs' title='Detail Data' href=" <?php echo base_url('administrator/detail_pembelian/') . $row['id_pembelian'] ?> "><span class='glyphicon glyphicon-search'></span> Detail Pembelian</a>
                            </center>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>