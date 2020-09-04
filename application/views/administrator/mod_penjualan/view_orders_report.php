      <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Orders Masuk</h3>
                  <a target='_BLANK' class='pull-right btn btn-warning btn-sm' href='<?php echo base_url(); ?>administrator/print_orders'>Print Report</a>
                </div>
                <div class='box-body'>
                          <div class='col-md-12'>
                            <table id="example1" class='table table-hover table-condensed'>
                              <thead>
                                <tr>
                                  <th width="20px">No</th>
                                  <th>Kode Transaksi</th>
                                  <th>Total Belanja</th>
                                  <th>Pengiriman</th>
                                  <th>Tujuan</th>
                                  <th>Waktu Transaksi</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  foreach ($record->result_array() as $row){
                                  if ($row['proses']=='0'){ $proses = '<i class="text-danger">Pending</i>'; $color = 'danger'; $text = 'Pending'; }elseif($row['proses']=='1'){ $proses = '<i class="text-warning">Proses</i>'; $color = 'warning'; $text = 'Proses'; }elseif($row['proses']=='2'){ $proses = '<i class="text-info">Konfirmasi</i>'; $color = 'info'; $text = 'Konfirmasi'; }else{ $proses = '<i class="text-success">Packing </i>'; $color = 'success'; $text = 'Packing'; }
                                  $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, e.nama_kota, f.nama_provinsi, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk JOIN rb_konsumen d ON a.id_pembeli=d.id_konsumen JOIN rb_kota e ON d.kota_id=e.kota_id JOIN rb_provinsi f ON e.provinsi_id=f.provinsi_id where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
                                  
                                  echo "<tr><td>$no</td>
                                            <td>$row[kode_transaksi]</td>
                                            <td style='color:red;'>Rp ".rupiah($total['total']+$total['ongkir']+substr($row['kode_transaksi'],-3))."</td>
                                            <td><span style='text-transform:uppercase'>$total[kurir]</span> ($total[service])</td>
                                            <td><a target='_BLANK' title='$total[nama_provinsi] -> $total[nama_kota]' href='https://www.google.com/maps/place/$total[nama_kota]'>$total[nama_kota]</a></td>
                                            <td>$row[waktu_transaksi]</td>
                                            <td width='150px'>
                                              <div class='btn-group'> 
                                                <button style='width:70px' type='button' class='btn btn-$color btn-xs'>$text</button> 
                                                <button type='button' class='btn btn-$color btn-xs dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> <span class='sr-only'>Toggle Dropdown</span> </button> 
                                                  <ul class='dropdown-menu' style='border:1px solid #cecece;'> 
                                                    <li><a href='".base_url()."administrator/orders_status/$row[id_penjualan]/0' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Pending ?')\"> Pending</a></li> 
                                                    <li><a href='".base_url()."administrator/orders_status/$row[id_penjualan]/1' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Proses ?')\"> Proses</a></li> 
                                                    <li><a href='".base_url()."administrator/orders_status/$row[id_penjualan]/2' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Konfirmasi ?')\"> Konfirmasi</a></li> 
                                                    <li><a href='".base_url()."administrator/orders_status/$row[id_penjualan]/3' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Packing ?')\"> Packing</a></li> 
                                                  </ul> 
                                              </div>
                                            <a class='btn btn-info btn-xs' title='Detail data pesanan' href='".base_url()."administrator/tracking/$row[kode_transaksi]'><span class='glyphicon glyphicon-search'></span></a></td>
                                         </tr>";
                                    $no++;
                                  }
                                ?>
                              </tbody>
                            </table>
                          </div>
                </div>
            </div>
        </div>