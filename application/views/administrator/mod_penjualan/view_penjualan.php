<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Transaksi Penjualan</h3>
            <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_penjualan'><i class="fa fa-shopping-cart"></i> Tambah Penjualan</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Kasir</th>
                        <th>Customer</th>
                        <th>Diskon</th>
                        <th>Pembayaran</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Retur</th>
                        <th>Waktu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($record as $row) {
                        $id = $row['id_penjualan'];
                        $query = "SELECT SUM(b.total_retur) AS retur FROM retur_penjualan a, retur_penjualan_detail b
                        WHERE a.id_retur_penjualan = b.id_retur_penjualan AND a.id_penjualan = '$id'";
                        $retur = $this->db->query($query)->row_array();
                    ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['kode_transaksi'] ?></td>
                            <td><?php echo $row['nama_lengkap'] ?></td>
                            <td><?php echo $row['customer'] ?></td>
                            <td style='color:red;'>Rp <?php echo rupiah($row['diskon']) ?></td>
                            <td><?php echo $row['method'] ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td style='color:green;'>Rp <?php echo rupiah($row['total']) ?></td>
                            <td style='color:red;'>Rp <?php echo rupiah($retur['retur']) ?></td>
                            <td><?php echo $row['waktu_transaksi'] ?></td>
                            <td>
                                <a class='btn btn-success btn-xs' title='Detail Data' onclick="detailPenjualan('<?php echo $row['id_penjualan'] ?>')"><span class='glyphicon glyphicon-search'></span> </a>
                                <a class='btn btn-info btn-xs' title='Print Data' href="<?php echo base_url('report/struk_penjualan/') . $row['id_penjualan'] ?> " target='_blank'><span class='glyphicon glyphicon-print'></span> </a>

                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal detail Penjulan -->
<div class="modal fade" id="detailPenjualanModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Detail Penjualan</h4>
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
                    <tbody id="detail_penjualan">
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