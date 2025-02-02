<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Data Konsumen</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_konsumen') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' value="<?php echo $this->uri->segment(3) ?>" name='id'>
              <tr>
                <td width='140px'><b>Username</b></td>
                <td><input class='required form-control' style='width:50%; display:inline-block' name='user' type='text' value='<?php echo $row['username'] ?>'></td>
              </tr>
              <tr>
                <td><b>Password</b></td>
                <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='pass'> <small style='color:red'><i>Kosongkan Saja JIka Tidak ubah.</i></small></td>
              </tr>
              <tr>
                <td><b>Nama Lengkap</b></td>
                <td><input class='required form-control' type='text' name='nama' value='<?php echo $row['nama_lengkap'] ?>'></td>
              </tr>
              <tr>
                <td><b>Email</b></td>
                <td><input class='required email form-control' type='email' name='email' value='<?php echo $row['email'] ?>'></td>
              </tr>
              <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>
                  <input type="radio" name="jekel" value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo "checked"; ?> id="laki"> <label for="laki"> Laki - laki</label>
                  <input type="radio" name="jekel" value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> id="prem"> <label for="prem"> Perempuan</label>
                </td>
              </tr>
              <tr>
                <td><b>Tanggal Lahir</b></td>
                <td><input style='padding-left:13px' class='required datepicker form-control' type='text' name='tanggal_lahir' value='<?php echo $row['tanggal_lahir'] ?>' data-date-format='yyyy-mm-dd'></td>
              </tr>
              <tr>
                <td><b>Tempat Lahir</b></td>
                <td><input class='required form-control' type='text' name='tempat_lahir' value='<?php echo $row['tempat_lahir'] ?>'></td>
              </tr>
              <tr>
                <td><b>Alamat</b></td>
                <td><textarea class='required form-control' name='alamat'><?php echo $row['alamat_lengkap'] ?></textarea></td>
              </tr>
              <tr>
                <td><b>Kota Sekarang</b></td>
                <td><select class='form-control select2' name='kota_id' id='city' required>
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
                <td><input style='width:40%' class='required number form-control' type='number' name='no_hp' value='<?php echo $row['no_hp'] ?>'></td>
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
      <button type='submit' name='submit' class='btn btn-info'>Update</button>

    </div>
    </form>
  </div>