<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Kategori Berita</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_kategoriberita') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_kategori'] ?>'>
              <tr>
                <th width='120px' scope='row'>Nama Kategori</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['nama_kategori'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Aktif</th>
                <td>
                  <?php if ($rows['aktif'] == 'Y') { ?>

                    <input type='radio' name='b' value='Y' checked> Ya &nbsp; <input type='radio' name='b' value='N'> Tidak
                  <?php } else { ?>
                    <input type='radio' name='b' value='Y'> Ya &nbsp; <input type='radio' name='b' value='N' checked> Tidak
                  <?php } ?>

                </td>
              </tr>
              <tr>
                <th scope='row'>Posisi</th>
                <td><input type='text' class='form-control' name='c' value='<?php echo $rows['sidebar'] ?>'></td>
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