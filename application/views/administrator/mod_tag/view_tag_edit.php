<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Kategori Berita</h3>
    </div>
    <div class='box-body'>

      <form action="<?php echo base_url('administrator/edit_tagberita') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_tag'] ?>'>
              <tr>
                <th width='120px' scope='row'>Nama Tag</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['nama_tag'] ?>]' required></td>
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