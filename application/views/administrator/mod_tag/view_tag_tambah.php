<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Tag Berita</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_tagberita') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Nama Tag</th>
                <td><input type='text' class='form-control' name='a' required></td>
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