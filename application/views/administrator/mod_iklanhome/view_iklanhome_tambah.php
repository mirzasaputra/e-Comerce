<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Iklan Home</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_iklanhome') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='a' required></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Url</th>
                <td><input type='url' class='form-control' name='b' required></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Gambar</th>
                <td><input type='file' class='form-control' name='c'></td>
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