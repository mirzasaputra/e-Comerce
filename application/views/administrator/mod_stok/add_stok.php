<div class='col-md-12'>
    <div class='box box-info'>
        <div class='box-header with-border'>
            <h3 class='box-title'><?php echo $title ?></h3>
        </div>
        <div class='box-body'>
            <form action="<?php echo base_url('administrator/add_stok') ?>" class="form-horizontal" method="post">
                <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                        <tbody>
                            <input type='hidden' name='id' value=''>
                            <tr>
                                <th width='120px' scope='row'>Produk</th>
                                <td>
                                    <select name="produk" id="produk" class="form-control select2" onchange="selectProduk()" required>
                                        <option value="">-- Pilih Produk --</option>
                                        <?php foreach ($produk as $row) { ?>
                                            <option value="<?php echo $row['id_produk'] ?>"><?php echo $row['nama_produk'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope='row'>Jumlah</th>
                                <td><input type='number' class='form-control' name='jml' required autocomplete="off"></td>
                                <input type="hidden" class="form-control" name="harga" id="harga" readonly>
                                <input type="hidden" class="form-control" name="stok" id="stok">
                            </tr>
                            <tr>
                                <th scope='row'>Jenis</th>
                                <td>
                                    <select name="jenis" id="" class="form-control select2" required>
                                        <option value="Stok Masuk">Stok Masuk</option>
                                        <option value="Stok Keluar">Stok Keluar</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope='row'>Keterangan</th>
                                <td><textarea name="ket" id="" cols="30" class="form-control" rows="3" required></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        <div class='box-footer'>
            <button type='submit' name='submit' class='btn btn-info'>Save changes</button>


        </div>
        </form>
    </div>
    <?php include 'script.php' ?>