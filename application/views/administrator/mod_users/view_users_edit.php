<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Data <?php echo $rows['level'] ?></h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_manajemenuser') ?>" method="post" enctype="multipart/form-data">
        <?php

        if ($rows['foto'] == '') {
          $foto = 'users.gif';
        } else {
          $foto = $rows['foto'];
        }
        ?>
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['username'] ?>'>
              <input type='hidden' name='ids' value='<?php echo $rows['id_session'] ?>'>
              <tr>
                <th width='120px' scope='row'>Username</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['username'] ?>' readonly='on'></td>
              </tr>
              <tr>
                <th scope='row'>Password</th>
                <td><input type='password' class='form-control' name='b' onkeyup="nospaces(this)"></td>
              </tr>
              <tr>
                <th scope='row'>Nama Lengkap</th>
                <td><input type='text' class='form-control' name='c' value='<?php echo $rows['nama_lengkap'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Alamat Email</th>
                <td><input type='email' class='form-control' name='d' value='<?php echo $rows['email'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>No Telepon</th>
                <td><input type='number' class='form-control' name='e' value='<?php echo $rows['no_telp'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Ganti Foto</th>
                <td><input type='file' class='form-control' name='f'>
                  <hr style='margin:5px'>
                  <?php if ($rows['foto'] != '') { ?>

                    <i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href="<?php echo base_url('asset/foto_user/') . $rows['foto'] ?>"><?php echo $rows['foto'] ?></a>
                  <?php } ?>
                </td>
              </tr>
              </td>
              </tr>
              <?php
              if ($this->session->level == 'admin') {
              ?>
                <tr>
                  <th scope='row'>Blokir</th>
                  <td>
                    <?php
                    if ($rows['blokir'] == 'Y') {
                    ?>
                      <input type='radio' name='h' value='Y' checked> Ya &nbsp; <input type='radio' name='h' value='N'> Tidak
                    <?php
                    } else {
                    ?>
                      <input type='radio' name='h' value='Y'> Ya &nbsp; <input type='radio' name='h' value='N' checked> Tidak

                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th scope='row'>Tambah Akses</th>
                  <td>
                    <div class='checkbox-scroll'>
                      <?php foreach ($record as $row) { ?>

                        <span style='display:block'><input name='modul[]' type='checkbox' value='<?php echo $row['id_modul'] ?>' /> <?php echo $row['nama_modul'] ?></span>
                      <?php } ?>

                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope='row'>Hak Akses</th>
                  <td>
                    <div class='checkbox-scroll'>
                      <?php foreach ($akses as $ro) { ?>

                        <span style='display:block'><a class='text-danger' href="<?php echo base_url('administrator/delete_akses/') . $ro['id_umod'] . '/' . $this->uri->segment(3) ?>"><span class='glyphicon glyphicon-remove'></span></a> <?php echo $ro['nama_modul'] ?></span>

                      <?php } ?>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class='box-footer'>
          <button type='submit' name='submit' class='btn btn-info'>Update</button>
        </div>
      </form>
    </div>
  </div>
</div>