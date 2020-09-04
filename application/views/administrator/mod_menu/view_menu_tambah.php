<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Menu Website</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_menuwebsite') ?>">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Link Menu</th>
                <td><input type='text' class='form-control' name='a' required></td>
              </tr>
              <tr>
                <th scope='row'>Level Menu</th>
                <td><select name='b' class='form-control select2' required>
                    <option value='0' selected>Menu Utama</option>
                    <?php foreach ($record->result_array() as $row) { ?>
                      <option value='<?php echo $row['id_menu'] ?>'><?php echo $row['nama_menu'] ?></option>
                    <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Nama Menu</th>
                <td><input type='text' class='form-control' name='c' required></td>
              </tr>
              <tr>
                <th scope='row'>Position</th>
                <td><input type='radio' name='d' value='Top'> Top <input type='radio' name='d' value='Bottom'> Bottom</td>
              </tr>
              <tr>
                <th scope='row'>Urutan</th>
                <td><input type='number' class='form-control' name='e' style='width:70px' required></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    <div class='box-footer'>
      <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
    </div>
    </form>
  </div>