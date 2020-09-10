<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title ?></h3>
                <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_retur_penjualan'><i class="fa fa-plus"></i> Tambah Retur Penjualan</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Retur</th>
                            <th>Kode Penjualan</th>
                            <th>Kasir</th>
                            <th>Customer</th>
                            <th>Jumlah</th>
                            <th>Total Retur</th>
                            <th>Waktu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($record as $row) { ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['kode_retur'] ?></td>
                                <td><?php echo $row['kode_transaksi'] ?></td>
                                <td><?php echo $row['kasir'] ?></td>
                                <td><?php echo $row['customer'] ?></td>
                                <td><?php echo $row['jumlah'] ?></td>
                                <td style='color:green;'>Rp <?php echo rupiah($row['total']) ?></td>
                                <td><?php echo $row['tgl_retur'] ?></td>
                                <td>
                                    <a class='btn btn-success btn-xs' title='Detail Data' onclick="detailRetur('<?php echo $row['id_retur_penjualan'] ?>')"><span class='glyphicon glyphicon-search'></span> Detail Retur</a>

                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal detail Retur Penjualan -->
<div class="modal fade" id="detailReturPenjualan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Detail Retur Penjualan</h4>
            </div>
            <div class="modal-body">
                <table width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Jumlah Retur</th>
                            <th>Total Retur</th>
                            <th>Kondisi Produk</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="detail-retur-penjualan">
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