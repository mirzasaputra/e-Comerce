<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Kategori Berita</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_kategoriberita') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Nama Kategori</th>
                <td><input type='text' class='form-control' name='a' required></td>
              </tr>
              <tr>
                <th scope='row'>Aktif</th>
                <td><input type='radio' name='b' value='Y' checked> Ya &nbsp; <input type='radio' name='b' value='N'> Tidak</td>
              </tr>
              <tr>
                <th scope='row'>Posisi</th>
                <td><input type='text' class='form-control' name='c' required></td>
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