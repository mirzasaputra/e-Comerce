<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body ">
                <form action="<?php echo base_url('administrator/pembayaran_piutang') ?>" method="post">

                    <div class="form-group">
                        <label for="">Kode Transaksi</label>
                        <input type="text" name="kode_transaksi" readonly value="<?php echo $record['kode_transaksi'] ?>" class="form-control">
                        <input type="hidden" name="id_piutang" readonly value="<?php echo $record['id_piutang'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Customer</label>
                        <input type="text" name="customer" readonly class="form-control" value="<?php echo $record['nama_lengkap'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Sisa Piutang</label>
                        <input type="text" readonly class="form-control" value="Rp. <?php echo rupiah($record['sisa']) ?>">
                        <input type="hidden" name="sisa_piutang" readonly class="form-control" value="<?php echo $record['sisa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nominal Pembayaran</label>
                        <?php if ($record['sisa'] == 0) { ?>
                            <input type="number" autocomplete="off" name="nominal" class="form-control" required readonly>
                        <?php } else { ?>
                            <input type="number" autocomplete="off" name="nominal" class="form-control" required>
                        <?php }  ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-check-square-o"></i> Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style='width:20px'>No</th>
                            <th>Operator</th>
                            <th>Tanggal</th>
                            <th>Nominal Bayar</th>
                            <th style='width:70px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($detail as $val) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $val['nama_lengkap'] ?></td>
                                <td><?php echo $val['tgl_bayar'] ?></td>
                                <td style="color:green">Rp. <?php echo rupiah($val['nominal']) ?></td>
                                <td>
                                    <center>
                                        <a class='btn btn-danger btn-xs' title='Delete Data' onclick="hapusPembayaranPiutang('<?php echo $val['id_detil_piutang'] ?>')"><span class='glyphicon glyphicon-remove'></span></a>
                                    </center>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php include 'script.php' ?>