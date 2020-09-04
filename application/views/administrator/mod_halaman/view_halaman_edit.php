<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Halaman Statis</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_halamanbaru') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_halaman'] ?>'>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['judul'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Isi Halaman</th>
                <td><textarea id='editor1' class='form-control' name='b' style='height:350px'><?php echo $rows['isi_halaman'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Ganti Gambar</th>
                <td><input type='file' class='form-control' name='c'>
                  <hr style='margin:5px'>
                  <?php if ($rows['gambar'] != '') { ?>
                    <i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href=" <?php echo base_url() ?>asset/foto_statis/<?php echo $rows['gambar'] ?>"><?php echo $rows['gambar'] ?></a>
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