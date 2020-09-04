<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Kategori Produk</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_kategori_produk') ?>" method="post">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_kategori_produk'] ?>'>
              <tr>
                <th width='120px' scope='row'>Nama Kategori</th>
                <td><input type='text' class='form-control' name='a' value='<?php echo $rows['nama_kategori'] ?>' required></td>
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