<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Foto Gallery</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_gallery') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_gallery'] ?>'>
              <tr>
                <th width='120px' scope='row'>Album</th>
                <td><select name='aa' class='form-control select2'>
                    <option value='' selected>- Pilih -</option>
                    <?php
                    foreach ($row->result_array() as $r) {
                      if ($rows['id_album'] == $r['id_album']) {
                    ?>
                        <option value='<?php echo $r['id_album'] ?>' selected><?php echo $r['jdl_album'] ?></option>

                      <?php } else { ?>
                        <option value='<?php echo $r['id_album'] ?>'><?php echo $r['jdl_album'] ?></option>

                      <?php } ?>
                    <?php } ?>

                  </select></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['jdl_gallery'] ?>' required></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Keterangan</th>
                <td><textarea class='ckeditor form-control' name='b' style='height:250px'><?php echo $rows['keterangan'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Ganti Gambar</th>
                <td><input type='file' class='form-control' name='c'>
                  <?php if ($rows['gbr_gallery'] != '') { ?>
                    <i style='color:red'>Lihat Foto Saat ini : </i><a target='_BLANK' href="<?php echo base_url('asset/img_galeri/') . $rows['gbr_gallery'] ?>"><?php echo $rows['gbr_gallery'] ?></a>

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