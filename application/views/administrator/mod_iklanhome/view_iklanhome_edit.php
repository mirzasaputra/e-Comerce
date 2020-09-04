<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Iklan Home</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_iklanhome') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_iklantengah'] ?>'>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['judul'] ?>' required></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Url</th>
                <td><input type='url' class='form-control' name='b' value='<?php echo $rows['url'] ?>' required></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Gambar</th>
                <td><input type='file' class='form-control' name='c'>
                  <?php if ($rows['gambar'] != '') { ?>

                    Lihat Gambar : <a target='_BLANK' href="<?php echo base_url('asset/foto_iklan/') . $rows['gambar'] ?>"><?php echo $rows['gambar'] ?></a>

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