<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Foto Gallery</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_gallery') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Album</th>
                <td><select name='aa' class='form-control select2'>
                    <option value='' selected>- Pilih -</option>
                    <?php foreach ($row->result_array() as $r) { ?>

                      <option value='<?php echo $r['id_album'] ?>'><?php echo $r['jdl_album'] ?></option>

                    <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='a' required></td>
              </tr>
              <tr>
                <th scope='row'>Keterangan</th>
                <td><textarea class='ckeditor form-control' name='b' style='height:250px'></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Gambar</th>
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