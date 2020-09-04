<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit File Download</h3>
    </div>
    <div class='box-body'>

      <form action="<?php echo base_url('administrator/edit_download') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_download'] ?>'>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['judul'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Ganti File</th>
                <td><input type='file' class='form-control' name='b'>

                  <?php if ($rows['nama_file'] != '') { ?>
                    Lihat File : <a target='_BLANK' href="<?php echo base_url('download/file/') . $rows['nama_file'] ?>"><?php echo $rows['nama_file'] ?></a>
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