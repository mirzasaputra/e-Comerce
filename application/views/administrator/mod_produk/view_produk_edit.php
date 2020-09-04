<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Produk Terpilih</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_produk') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_produk'] ?>'>
              <tr>
                <th scope='row'>Kategori</th>
                <td><select name='a' class='form-control select2' required>
                    <option value='' selected>- Pilih Kategori Produk -</option>
                    <?php
                    foreach ($record as $row) {
                      if ($rows['id_kategori_produk'] == $row['id_kategori_produk']) {
                    ?>
                        <option value='<?php echo $row['id_kategori_produk'] ?>' selected><?php echo $row['nama_kategori'] ?></option>
                      <?php } else { ?>

                        <option value='<?php echo $row['id_kategori_produk'] ?>'><?php echo $row['nama_kategori'] ?></option>

                      <?php } ?>
                    <?php } ?>

                </td>
              </tr>
              <tr>
                <th width='130px' scope='row'>Nama Produk</th>
                <td><input type='text' class='form-control' name='b' value='<?php echo $rows['nama_produk'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Satuan</th>
                <td><input type='text' class='form-control' name='c' value='<?php echo $rows['satuan'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Berat</th>
                <td><input type='text' class='form-control' name='berat' value='<?php echo $rows['berat'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Harga Beli</th>
                <td><input type='number' class='form-control' name='d' value='<?php echo $rows['harga_beli'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Harga Reseller</th>
                <td><input type='number' class='form-control' name='e' value='<?php echo $rows['harga_reseller'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Harga Konsumen</th>
                <td><input type='number' class='form-control' name='f' value='<?php echo $rows['harga_konsumen'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Keterangan</th>
                <td><textarea id='editor1' class='form-control' name='ff'><?php echo $rows['keterangan'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Gambar</th>
                <td><input type='file' class='form-control' name='g'>
                  <?php if ($rows['gambar'] != '') { ?>
                    <i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href="<?php echo base_url('asset/foto_produk/') . $rows['gambar'] ?>"><?php echo $rows['gambar'] ?></a>
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