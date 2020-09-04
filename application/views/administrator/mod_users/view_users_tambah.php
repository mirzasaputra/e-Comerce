<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Data User</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_manajemenuser') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <tr>
                <th width='120px' scope='row'>Username</th>
                <td><input type='text' class='form-control' name='a' onkeyup="nospaces(this)" required></td>
              </tr>
              <tr>
                <th scope='row'>Password</th>
                <td><input type='password' class='form-control' name='b' onkeyup="nospaces(this)" required></td>
              </tr>
              <tr>
                <th scope='row'>Nama Lengkap</th>
                <td><input type='text' class='form-control' name='c' required></td>
              </tr>
              <tr>
                <th scope='row'>Alamat Email</th>
                <td><input type='email' class='form-control' name='d' required></td>
              </tr>
              <tr>
                <th scope='row'>No Telepon</th>
                <td><input type='number' class='form-control' name='e' required></td>
              </tr>
              <tr>
                <th scope='row'>Upload Foto</th>
                <td><input type='file' class='form-control' name='f'></td>
              </tr>
              <tr>
                <th scope='row'>Level</th>
                <td><input type='radio' name='g' value='user'> User Biasa &nbsp; <input type='radio' name='g' value='admin'> Administrator
              <tr>
                <th scope='row'>Akses Modul</th>
                <td>
                  <div class='checkbox-scroll'>
                    <?php foreach ($record as $row) { ?>

                      <span style='display:block'><input name='modul[]' type='checkbox' value='<?php echo $row['id_modul'] ?>' /> <?php echo $row['nama_modul'] ?></span>

                    <?php  } ?>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class='box-footer'>
          <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
        </div>
      </form>
    </div>
  </div>
</div>