<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Album</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_album') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_album'] ?>'>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='a' value='$rows[jdl_album]' required></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Keterangan</th>
                <td><textarea class='ckeditor form-control' name='b' style='height:250px'><?php echo $rows['keterangan'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Ganti Gambar</th>
                <td><input type='file' class='form-control' name='c'>
                  <?php if ($rows['gbr_album'] != '') { ?>
                    <i style='color:red'>Lihat Cover Saat ini : </i><a target='_BLANK' href=".<?php echo base_url('asset/img_album/') . $rows['gbr_album'] ?>"><?php echo $rows['gbr_album'] ?></a>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Aktif</th>
                <td>
                  <?php if ($rows['aktif'] == 'Y') { ?>
                    <input type='radio' name='f' value='Y' checked> Ya &nbsp; <input type='radio' name='f' value='N'> Tidak
                  <?php  } else { ?>

                    <input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak

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