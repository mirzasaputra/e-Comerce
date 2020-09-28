<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Identitas Website</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/identitaswebsite') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Nama Website</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $record['nama_website'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Email</th>
                <td><input type='email' class='form-control' name='b' value='<?php echo $record['email'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Domain</th>
                <td><input type='url' class='form-control' name='c' value='<?php echo $record['url'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Sosial Network</th>
                <td><input type='text' class='form-control' name='d' value='<?php echo $record['facebook'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>No. Rekening</th>
                <td><input type='text' class='form-control' name='e' value='<?php echo $record['rekening'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>No Telpon</th>
                <td><input type='text' class='form-control' name='f' value='<?php echo $record['no_telp'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Kota Toko</th>
                <td><select class='form-control select2' name='kota' required>
                    <option value=''>- Pilih -</option>
                    <?php
                    $kota = $this->Model_app->view('rb_kota');
                    foreach ($kota->result_array() as $rows) {
                    ?>
                      <?php if ($record['kota_id'] == $rows['kota_id']) { ?>
                        <option value='<?php echo $rows['kota_id'] ?>' selected><?php echo $rows['nama_kota'] ?></option>
                      <?php } else { ?>
                        <option value='<?php echo $rows['kota_id'] ?>'><?php echo $rows['nama_kota'] ?></option>

                      <?php } ?>
                    <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <th scope='row'>Alamat</th>
                <td><textarea class='form-control' name='alamat'><?php echo $record['alamat'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Meta Deskripsi</th>
                <td><input type='text' class='form-control' name='g' value='<?php echo $record['meta_deskripsi'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Meta Keyword</th>
                <td><input type='text' class='form-control' name='h' value='<?php echo $record['meta_keyword'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Google Maps</th>
                <td><input type='text' class='form-control' name='j' value='<?php echo $record['maps'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Favicon</th>
                <td><input type='file' class='form-control' name='i' value='<?php echo $record['favicon'] ?>'>
                  <hr style='margin:5px'>
                  Favicon Aktif Saat ini : <img src="<?php echo base_url('asset/images/') . $record['favicon']; ?>" width="300"></td>
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