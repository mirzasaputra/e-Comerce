<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Supplier</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_supplier') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_supplier'] ?>'>
              <tr>
                <th width='120px' scope='row'>Nama Supplier</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['nama_supplier'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Kontak Person</th>
                <td><input type='text' class='form-control' name='b' value='<?php echo $rows['kontak_person'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Alamat Lengkap</th>
                <td><textarea class='form-control' name='c'><?php echo $rows['alamat_lengkap'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>No Hp</th>
                <td><input type='number' class='form-control' name='d' value='<?php echo $rows['no_hp'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Alamat Email</th>
                <td><input type='email' class='form-control' name='e' value='<?php echo $rows['alamat_email'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Kode Pos</th>
                <td><input type='number' class='form-control' name='f' value='<?php echo $rows['kode_pos'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>No Telpon</th>
                <td><input type='number' class='form-control' name='g' value='<?php echo $rows['no_telpon'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Fax</th>
                <td><input type='number' class='form-control' name='h' value='<?php echo $rows['fax'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Keterangan</th>
                <td><textarea class='form-control' name='i'><?php echo $rows['katerangan'] ?></textarea></td>
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