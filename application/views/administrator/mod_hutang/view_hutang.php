<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style='width:20px'>No</th>
                            <th>Kode</th>
                            <th>Supplier</th>
                            <th>Waktu Hutang</th>
                            <th>Jatuh Tempo</th>
                            <th>Hutang</th>
                            <th>Bayar</th>
                            <th>Sisa</th>
                            <th>Status</th>
                            <th style='width:70px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($record as $row) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['kode_pembelian'] ?></td>
                                <td><?php echo $row['nama_supplier'] ?></td>
                                <td><?php echo $row['tgl_hutang'] ?></td>
                                <td><?php echo $row['jatuh_tempo'] ?></td>
                                <td style="color:red">Rp. <?php echo rupiah($row['jml_hutang']) ?></td>
                                <td style="color:green">Rp. <?php echo rupiah($row['bayar']) ?></td>
                                <td style="color:green">Rp. <?php echo rupiah($row['sisa']) ?></td>
                                <td>
                                    <?php if ($row['status'] == 'Lunas') { ?>
                                        <span class="label label-success"><?php echo $row['status'] ?></span>
                                    <?php } else { ?>
                                        <span class="label label-danger"><?php echo $row['status'] ?></span>
                                    <?php } ?>
                                </td>
                                <td>

                                    <?php if ($row['status'] == 'Lunas') { ?>
                                        <a href="#" onclick="detailPay('<?php echo $row['id_hutang'] ?>')" class="btn btn-primary btn-xs"><i class="fa fa-search-plus"></i> Detail Pembayaran</a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('administrator/pembayaran_hutang/' . $row['id_hutang']) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Payment</a>
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



<!-- Modal Detail Pembayaran Hutang -->
<div class="modal fade" id="detailHutang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="showDataModal">Detail Pembayaran Hutang</h4>
            </div>
            <div class="modal-body">
                <table id="" width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Operator</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody id="detail_hutang">
                    </tbody>
                </table>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include  'script.php' ?>