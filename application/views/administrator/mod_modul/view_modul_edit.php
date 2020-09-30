<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Modul Website</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_manajemenmodul') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_modul'] ?>'>
              <tr>
                <th width='120px' scope='row'>Nama Modul</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['nama_modul'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Link</th>
                <td><input type='text' class='form-control' name='b' value='<?php echo $rows['link'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Publish</th>
                <td>
                  <?php if ($rows['publish'] == 'Y') { ?>

                    <input type='radio' name='c' value='Y' checked> Ya &nbsp; <input type='radio' name='c' value='N'> Tidak

                  <?php } else { ?>
                    <input type='radio' name='c' value='Y'> Ya &nbsp; <input type='radio' name='c' value='N' checked> Tidak

                  <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Aktif</th>
                <td>

                  <?php if ($rows['aktif'] == 'Y') { ?>
                    <input type='radio' name='d' value='Y' checked> Ya &nbsp; <input type='radio' name='d' value='N'> Tidak

                  <?php } else { ?>
                    <input type='radio' name='d' value='Y'> Ya &nbsp; <input type='radio' name='d' value='N' checked> Tidak

                  <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Status</th>
                <td>

                  <?php if ($rows['status'] == 'admin') { ?>
                    <input type='radio' name='e' value='admin' checked> Admin &nbsp; <input type='radio' name='e' value='user'> User

                  <?php } else { ?>
                    <input type='radio' name='e' value='admin'> Admin &nbsp; <input type='radio' name='e' value='user' checked> User

                  <?php } ?>
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