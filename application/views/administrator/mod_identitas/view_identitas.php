<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Identitas Website</h3>
    </div>
    <div class='box-body'>

      <div class='panel-body'>
        <ul id='myTabs' class='nav nav-tabs' role='tablist'>
          <li role='presentation' class='active'><a href='#profile' id='profile-tab' role='tab' data-toggle='tab' aria-controls='profile' aria-expanded='true'>Identitas Website </a></li>
          <li role='presentation' class=''><a href='#wa' role='tab' id='wa-tab' data-toggle='tab' aria-controls='wa' aria-expanded='false'>Whatsapp Setting</a></li>
          <li role='presentation' class=''><a href='#email' role='tab' id='email-tab' data-toggle='tab' aria-controls='email' aria-expanded='false'>Email Setting</a></li>
        </ul><br>

        <div id='myTabContent' class='tab-content'>
          <div role='tabpanel' class='tab-pane fade active in' id='profile' aria-labelledby='profile-tab'>
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
                <button type='submit' name='submit' class='btn btn-info'>Update</button>
              </div>
            </form>
          </div>

          <div role='tabpanel' class='tab-pane fade' id='wa' aria-labelledby='wa-tab'>
            <form action="<?php echo base_url('administrator/updateWa') ?>" method="post" enctype="multipart/form-data">
              <div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='<?php echo $wa['id'] ?>'>
                    <tr>
                      <th width='120px' scope='row'>No. Whatsapp</th>
                      <td><input type='number' class='form-control' name='wa' autocomplete="off" value="<?php echo $wa['key'] ?>" placeholder="No. Whatsapp" required>
                        <small><i>Awali dengan angka 62</i></small>
                      </td>
                    </tr>
                    <tr>
                      <th width='120px' scope='row'>Pesan</th>
                      <td><textarea name="pesan" rows="3" class="form-control" placeholder="Pesan..." required><?php echo $wa['value'] ?></textarea></td>
                    </tr>
                  </tbody>
                </table>
                <button type='submit' name='submit' class='btn btn-info'>Update</button>
              </div>
            </form>
          </div>

          <div role='tabpanel' class='tab-pane fade' id='email' aria-labelledby='email-tab'>
            <form action="<?php echo base_url('administrator/updateEmail') ?>" method="post" enctype="multipart/form-data">
              <div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=' <?php echo $email['id'] ?>'>
                    <tr>
                      <th width='120px' scope='row'>Email</th>
                      <td><input type='text' class='form-control' name='email' value='<?php echo $email['key'] ?>' autocomplete="off" placeholder="Email..." required></td>
                    </tr>
                    <tr>
                      <th width='120px' scope='row'>Password</th>
                      <td>
                        <input type='password' class='form-control' name='password' placeholder="Password...">
                        <small><i>Kosongkan jika tidak diubah</i></small>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <button type='submit' name='submit' class='btn btn-info'>Update</button>
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>