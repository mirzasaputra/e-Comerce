<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Testimoni Konsumen</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_testimoni') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_testimoni'] ?>'>
              <tr>
                <th width='120px' scope='row'>Konsumen</th>
                <td><input type='text' class='form-control' value='<?php echo $rows['nama_lengkap'] ?>' disabled></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Testimoni</th>
                <td><textarea class='ckeditor form-control' name='b' style='height:250px'><?php echo $rows['isi_testimoni'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Aktif</th>
                <td>

                  <?php if ($rows['aktif'] == 'Y') { ?>
                    <input type='radio' name='f' value='Y' checked> Ya &nbsp; <input type='radio' name='f' value='N'> Tidak

                  <?php } else { ?>
                    <input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak
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