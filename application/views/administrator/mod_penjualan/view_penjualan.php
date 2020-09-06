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
                        <th>Kode Transaksi</th>
                        <th>Kasir</th>
                        <th>Customer</th>
                        <th>Diskon</th>
                        <th>Pembayaran</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Waktu</th>
                        <th style='width:120px'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($record as $row) {

                        echo "<tr><td>$no</td>
                              <td>$row[kode_transaksi]</td>
                              <td>$row[nama_lengkap]</td>
                              <td>$row[customer]</td>
                              <td style='color:red;'>Rp " . rupiah($row['diskon']) . "</td>
                              <td>$row[method]</td>
                              <td>$row[qty]</td>
                              <td style='color:green;'>Rp " . rupiah($row['total']) . "</td>
                              <td>$row[waktu_transaksi]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Detail Data' href='" . base_url() . "administrator/detail_penjualan/$row[id_penjualan]'><span class='glyphicon glyphicon-search'></span> Detail</a>
                                <a class='btn btn-info btn-xs' title='Print Data' href='" . base_url() . "administrator/print_struk/$row[id_penjualan]'><span class='glyphicon glyphicon-print'></span> Print</a>
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