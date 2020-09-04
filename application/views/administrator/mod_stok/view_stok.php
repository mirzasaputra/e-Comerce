<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo $title ?></h3>
            <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url('administrator/add_stok') ?>'>Tambahkan Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Prodouk</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Nilai</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
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
                            <td><?php echo $row['nama_produk'] ?></td>
                            <td><?php echo $row['satuan'] ?></td>
                            <td><?php echo $row['jml'] ?></td>
                            <td>Rp. <?php echo rupiah($row['nilai']) ?></td>
                            <td><?php echo $row['jenis'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td><?php echo $row['keterangan'] ?></td>
                            <?php echo "<td><center>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_stok/$row[id_stok]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                         ";
                            ?>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <?php include 'script.php' ?>