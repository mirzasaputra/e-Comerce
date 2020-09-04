<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>LIhat dan Balas Pesan Masuk</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/detail_pesanmasuk/') . $rows['id_hubungi'] ?>" method="post">
        <div class='col-md-12'>
          <?php if (isset($_POST['submit'])) { ?>

            <div class='alert alert-success alert-dismissible fade in' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span></button> <strong>Success!</strong> - Email success Terkirim ke <?php echo $_POST['b'] ?>
            </div>

          <?php } ?>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <tr>
                <th width='120px' scope='row'>Nama Pengirim</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['nama'] ?>' readonly='on'></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Email Pengirim</th>
                <td><input type='text' class='form-control' name='b' value='<?php echo $rows['email'] ?>' readonly='on'></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Subjek Pesan</th>
                <td><input type='text' class='form-control' name='c' value='<?php echo $rows['subjek'] ?>' readonly='on'></td>
              </tr>
              <tr>
                <th scope='row'>Isi Pesan</th>
                <td><textarea class='form-control' name='isi' style='height:120px' readonly='on'><?php echo $rows['pesan'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Balas Pesan</th>
                <td><textarea class='form-control' name='d' style='height:120px'></textarea></td>
              </tr>

            </tbody>
          </table>
        </div>
    </div>
    <div class='box-footer'>
      <button type='submit' name='submit' class='btn btn-info'>Kirimkan Balasan</button>
    </div>
    </form>
  </div>