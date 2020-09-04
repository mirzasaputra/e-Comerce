<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Rekening Bank Perusahaan</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_rekening') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_rekening'] ?>'>
              <tr>
                <th width='120px' scope='row'>Nama Bank</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['nama_bank'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>No Rekening</th>
                <td><input type='number' class='form-control' name='b' value='<?php echo $rows['no_rekening'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Atas Nama</th>
                <td><input type='text' class='form-control' name='c' value='<?php echo $rows['pemilik_rekening'] ?>'></td>
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