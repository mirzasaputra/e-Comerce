<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Supplier</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_supplier') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Nama Supplier</th>
                <td><input type='text' class='form-control' name='a'></td>
              </tr>
              <tr>
                <th scope='row'>Kontak Person</th>
                <td><input type='text' class='form-control' name='b' required></td>
              </tr>
              <tr>
                <th scope='row'>Alamat Lengkap</th>
                <td><textarea class='form-control' name='c' required></textarea></td>
              </tr>
              <tr>
                <th scope='row'>No Hp</th>
                <td><input type='number' class='form-control' name='d' required></td>
              </tr>
              <tr>
                <th scope='row'>Alamat Email</th>
                <td><input type='email' class='form-control' name='e' required></td>
              </tr>
              <tr>
                <th scope='row'>Kode Pos</th>
                <td><input type='number' class='form-control' name='f'></td>
              </tr>
              <tr>
                <th scope='row'>No Telpon</th>
                <td><input type='number' class='form-control' name='g' required></td>
              </tr>
              <tr>
                <th scope='row'>Fax</th>
                <td><input type='number' class='form-control' name='h'></td>
              </tr>
              <tr>
                <th scope='row'>Keterangan</th>
                <td><textarea class='form-control' name='i'></textarea></td>
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