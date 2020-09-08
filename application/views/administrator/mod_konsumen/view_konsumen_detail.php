      <div class='col-md-12'>
        <div class='box box-info'>
          <div class='box-header with-border'>
            <h3 class='box-title'>Detail Data Konsumen</h3>
            <a class='pull-right btn btn-warning btn-sm' href='<?php echo base_url(); ?>administrator/konsumen'>Kembali</a>
          </div>
          <div class='box-body'>

            <div class='panel-body'>
              <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                <li role='presentation' class='active'><a href='#profile' id='profile-tab' role='tab' data-toggle='tab' aria-controls='profile' aria-expanded='true'>Data Konsumen </a></li>
                <li role='presentation' class=''><a href='#keuangan' role='tab' id='keuangan-tab' data-toggle='tab' aria-controls='keuangan' aria-expanded='false'>History Transaksi Belanja</a></li>
              </ul><br>

              <div id='myTabContent' class='tab-content'>
                <div role='tabpanel' class='tab-pane fade active in' id='profile' aria-labelledby='profile-tab'>
                  <div class='col-md-6'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <?php
                        if (trim($rows['foto']) == '') {
                          $foto_user = 'users.gif';
                        } else {
                          $foto_user = $rows['foto'];
                        } ?>
                        <tr bgcolor='#e3e3e3'>
                          <th rowspan='14' width='110px'>
                            <center><?php echo "<img style='border:1px solid #cecece; height:85px; width:85px' src='" . base_url() . "asset/foto_user/$foto_user' class='img-circle img-thumbnail'>"; ?></center>
                          </th>
                        </tr>
                        <tr>
                          <th width='130px' scope='row'>Username</th>
                          <td><?php echo $rows['username'] ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>Password</th>
                          <td>xxxxxxxxxxxxxxx</td>
                        </tr>
                        <tr>
                          <th scope='row'>Nama Lengkap</th>
                          <td><?php echo $rows['nama_lengkap'] ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>Alamat Email</th>
                          <td><?php echo $rows['email'] ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>No Hp</th>
                          <td><?php echo $rows['no_hp'] ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>Jenis Kelamin</th>
                          <td><?php echo $rows['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>Tanggal Lahir</th>
                          <td><?php echo tgl_indo($rows['tanggal_lahir']); ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>Alamat</th>
                          <td><?php echo $rows['alamat_lengkap'] ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>Kota</th>
                          <td><?php echo $rows['kota'] ?></td>
                        </tr>
                        <tr>
                          <th scope='row'>Tanggal Daftar</th>
                          <td><?php echo tgl_indo($rows['tanggal_daftar']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div style='clear:both'></div>
                </div>

                <div role='tabpanel' class='tab-pane fade' id='keuangan' aria-labelledby='keuangan-tab'>
                  <div class='col-md-12'>
                    <table id="example1" class='table table-hover table-condensed'>
                      <thead>
                        <tr>
                          <th width="20px">No</th>
                          <th>Kode Transaksi</th>
                          <th>Total Belanja</th>
                          <th>Jenis Transaksi</th>
                          <th>Pengiriman</th>
                          <th>Status</th>
                          <th>Waktu Transaksi</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($record->result_array() as $row) {
                          if ($row['proses'] == '0') {
                            $proses = '<i class="text-danger">Pending</i>';
                          } elseif ($row['proses'] == '1') {
                            $proses = '<i class="text-warning">Proses</i>';
                          } elseif ($row['proses'] == '2') {
                            $proses = '<i class="text-info">Konfirmasi</i>';
                          } else {
                            $proses = '<i class="text-success">Packing </i>';
                          }
                          $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
                        ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['kode_transaksi'] ?></td>
                            <td style='color:red;'>Rp <?php echo rupiah($total['total'] + $total['ongkir']) ?></td>
                            <td>
                              <?php if ($row['online_order'] == 'Y') { ?>
                                <i>Online</i>
                              <?php } else { ?>
                                <i>Offline (POS)</i>
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($row['online_order'] == 'Y') { ?>
                                <span style='text-transform:uppercase'><?php echo $total['kurir'] ?></span> <?php echo ($total['service']) ?>
                              <?php } else { ?>
                                -
                              <?php } ?>
                            </td>
                            <td><?php echo $proses ?></td>
                            <td><?php echo $row['waktu_transaksi'] ?></td>
                            <td width='50px'>
                              <?php if ($row['online_order'] == 'Y') { ?>
                                <a class='btn btn-info btn-xs' title='Detail data pesanan' href="<?php echo base_url('administrator/tracking/') . $row['kode_transaksi'] ?>"><span class='glyphicon glyphicon-search'></span></a>
                              <?php } else { ?>
                                <a class='btn btn-info btn-xs' onclick="detailPenjualan('<?php echo $row['id_penjualan'] ?>')" title='Detail data pesanan'><span class='glyphicon glyphicon-search'></span></a>
                              <?php } ?>

                            </td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal detail Penjulan -->
      <div class="modal fade" id="detailRiwayatKonsumen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title">Detail Transaksi Konsumen</h4>
            </div>
            <div class="modal-body">
              <table width="100%" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody id="detail_riwayat_konsumen">
                </tbody>
              </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'script.php' ?>