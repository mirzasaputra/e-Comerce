<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Produk Baru</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_produk') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th scope='row'>Kategori</th>
                <td><select name='a' class='form-control select2' required>
                    <option value='' selected>- Pilih Kategori Produk -</option>
                    <?php foreach ($record as $row) { ?>
                      <option value='<?php echo $row['id_kategori_produk'] ?>'><?php echo $row['nama_kategori'] ?></option>

                    <?php } ?>
                </td>
              </tr>
              <tr>
                <th width='130px' scope='row'>Nama Produk</th>
                <td><input type='text' class='form-control' name='b' required></td>
              </tr>
              <tr>
                <th scope='row'>Satuan</th>
                <td><input type='text' class='form-control' name='c' required></td>
              </tr>
              <tr>
                <th scope='row'>Berat</th>
                <td><input type='text' class='form-control' name='berat' required></td>
              </tr>
              <tr>
                <th scope='row'>Harga Beli</th>
                <td><input type='number' class='form-control' name='d' required></td>
              </tr>
              <tr>
                <th scope='row'>Harga Reseller</th>
                <td><input type='number' class='form-control' name='e' required></td>
              </tr>
              <tr>
                <th scope='row'>Harga Konsumen</th>
                <td><input type='number' class='form-control' name='f' required></td>
              </tr>
              <tr>
                <th scope='row'>Keterangan</th>
                <td><textarea id='editor1' class='form-control' name='ff' required></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Gambar</th>
                <td><input type='file' class='form-control' name='g' required></td>
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