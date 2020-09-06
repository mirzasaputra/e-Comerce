<div class='col-md-12'>
    <div class='box box-info'>
        <div class='box-header with-border'>
            <h3 class='box-title'>Edit Data Konsumen</h3>
        </div>
        <div class='box-body'>
            <form action="<?php echo base_url('administrator/add_konsumen') ?>" method="post">
                <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                        <tbody>

                            <tr>
                                <td width='140px'><b>Username</b></td>
                                <td><input class='required form-control' style='width:50%; display:inline-block' name='aa' type='text' required></td>
                            </tr>
                            <tr>
                                <td><b>Password</b></td>
                                <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a'>
                            </tr>
                            <tr>
                                <td><b>Nama Lengkap</b></td>
                                <td><input class='required form-control' type='text' name='b' required></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td><input class='required email form-control' type='email' name='c'></td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>
                                    <input type='radio' value='Laki-laki' name='d' checked> Laki-laki <input type='radio' value='Perempuan' name='d'> Perempuan
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir</b></td>
                                <td><input style='padding-left:13px' class='required datepicker form-control' type='text' name='e' data-date-format='yyyy-mm-dd'></td>
                            </tr>
                            <tr>
                                <td><b>Tempat Lahir</b></td>
                                <td><input class='required form-control' type='text' name='f'></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td><textarea class='required form-control' name='g'></textarea></td>
                            </tr>
                            <tr>
                                <td><b>Kota Sekarang</b></td>
                                <td><select class='form-control select2' name='j' id='city' required>
                                        <option value=''>- Pilih -</option>
                                        <?php foreach ($kota->result_array() as $rows) { ?>
                                            <?php if ($row['kota_id'] == $rows['kota_id']) { ?>
                                                <option value='<?php echo $rows['kota_id'] ?>' selected><?php echo $rows['nama_kota'] ?></option>
                                            <?php  } else { ?>
                                                <option value='<?php echo $rows['kota_id'] ?>'><?php echo $rows['nama_kota'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>No Hp</b></td>
                                <td><input style='width:40%' class='required number form-control' type='number' name='l'></td>
                            </tr>
                            <tr>
                                <td><b>Tipe Konsumen</b></td>
                                <td>
                                    <select name="tipe" id="" class="form-control select2">
                                        <?php $data = ['Konsumen', 'Reseller'] ?>
                                        <?php foreach ($data as $val) { ?>
                                            <?php if ($row['tipe'] == $val) { ?>
                                                <option value="<?php echo $val ?>" selected><?php echo $val ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $val ?>"><?php echo $val ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </td>
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