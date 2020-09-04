<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Menu Website</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_menuwebsite') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_menu'] ?>'>
              <tr>
                <th width='120px' scope='row'>Link Menu</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['link'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Level Menu</th>
                <td><select name='b' class='form-control select2'>
                    <option value='0' selected>Menu Utama</option>
                    <?php
                    foreach ($record->result_array() as $row) {
                      if ($row['id_menu'] == $rows['id_parent']) {
                    ?>
                        <option value='<?php echo $row['id_menu'] ?>' selected><?php echo $row['nama_menu'] ?> </option>
                      <?php } else { ?>
                        <option value='<?php echo $row['id_menu'] ?>'><?php echo $row['nama_menu'] ?> </option>
                      <?php } ?>
                    <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Nama Menu</th>
                <td><input type='text' class='form-control' name='c' value='<?php echo $rows['nama_menu'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Position</th>
                <td>
                  <?php if ($rows['position'] == 'Top') { ?>
                    <input type='radio' name='d' value='Top' checked> Top
                    <input type='radio' name='d' value='Bottom'> Bottom
                  <?php } else { ?>
                    <input type='radio' name='d' value='Top'> Top
                    <input type='radio' name='d' value='Bottom' checked> Bottom
                  <?php } ?>

                </td>
              </tr>
              <tr>
                <th scope='row'>Urutan</th>
                <td><input type='number' class='form-control' name='e' style='width:70px' value='<?php echo $rows['urutan'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Aktif</th>
                <td>
                  <?php if ($rows['aktif'] == 'Ya') { ?>
                    <input type='radio' name='f' value='Ya' checked> Ya
                    <input type='radio' name='f' value='Tidak'> Tidak
                  <?php } else { ?>

                    <input type='radio' name='f' value='Ya'> Ya
                    <input type='radio' name='f' value='Tidak' checked> Tidak
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