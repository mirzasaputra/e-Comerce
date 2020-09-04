              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-pencil"></i>
                  <h3 class="box-title">Transaksi Penjualan Terbaru</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class="box-body">
                  <table class='table table-hover table-condensed'>
                    <thead>
                      <tr>
                        <th width="20px">No</th>
                        <th>Kode Transaksi</th>
                        <th>Total Belanja</th>
                        <th>Status</th>
                        <th>Waktu</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $record = $this->Model_app->orders_report_home(10);
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
                        echo "<tr><td>$no</td>
                                      <td>$row[kode_transaksi]</td>
                                      <td style='color:red;'>Rp " . rupiah($total['total'] + $total['ongkir'] + substr($total['kode_transaksi'], -3)) . "</td>
                                      <td>$proses</td>
                                      <td>" . cek_terakhir($row['waktu_transaksi']) . " lalu</td>
                                      <td width='50px'><a class='btn btn-info btn-xs' title='Detail data pesanan' href='" . base_url() . "administrator/tracking/$row[kode_transaksi]'><span class='glyphicon glyphicon-search'></span></a></td>
                                   </tr>";
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

              </div>