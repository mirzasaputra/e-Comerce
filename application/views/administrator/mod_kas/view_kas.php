<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kas</h3>
            <a class='pull-right btn btn-primary btn-sm' href='#' onclick="addKas()">Tambahkan Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:20px'>No</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th style='width:70px'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($record as $row) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_lengkap'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td><?php echo $row['jenis'] ?></td>
                            <?php if ($row['jenis'] == "Pemasukan") { ?>
                                <td style="color:green">+ Rp. <?php echo rupiah($row['nominal']) ?></td>
                            <?php } else if ($row['jenis'] == "Pengeluaran") { ?>
                                <td style="color:red">- Rp. <?php echo rupiah($row['nominal']) ?></td>
                            <?php } ?>
                            <td><?php echo $row['keterangan'] ?></td>
                            <?php echo "<td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='#' onclick='editKas(" . $row['id_kas'] . ")'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_kas/$row[id_kas]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                         ";
                            ?>
                        </tr>
                    <?php } ?>

                </tbody>
                <tfoot>

                    <tr class='success'>
                        <td colspan='4'><b>Total Kas Saat Ini </b></td>
                        <td colspan="3"><b>Rp <?php echo rupiah($total_kas) ?></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php include 'script.php' ?>
        <?php include 'add_kas.php' ?>
        <?php include 'edit_kas.php' ?>