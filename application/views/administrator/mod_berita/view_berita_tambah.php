<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Tambah Berita Baru</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/tambah_listberita') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value=''>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='b' required></td>
              </tr>
              <tr>
                <th scope='row'>Sub Judul</th>
                <td><input type='text' class='form-control' name='c'></td>
              </tr>
              <tr>
                <th scope='row'>Video Youtube</th>
                <td><input type='text' class='form-control' name='d' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td>
              </tr>
              <tr>
                <th scope='row'>Kategori</th>
                <td><select name='a' class='form-control select2' required>
                    <option value='' selected>- Pilih Kategori -</option>
                    <?php foreach ($record->result_array() as $row) { ?>
                      <option value='<?php echo $row['id_kategori'] ?>'><?php echo $row['nama_kategori'] ?></option>

                    <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Headline</th>
                <td><input type='radio' name='e' value='Y'> Ya &nbsp; <input type='radio' name='e' value='N' checked> Tidak</td>
              </tr>
              <tr>
                <th scope='row'>Pilihan Redaksi</th>
                <td><input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak</td>
              </tr>
              <tr>
                <th scope='row'>Berita Utama</th>
                <td><input type='radio' name='g' value='Y'> Ya &nbsp; <input type='radio' name='g' value='N' checked> Tidak</td>
              </tr>
              <tr>
                <th scope='row'>Isi Berita</th>
                <td><textarea id='editor1' class='form-control' name='h' style='height:350px' required></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Gambar</th>
                <td><input type='file' class='form-control' name='k'></td>
              </tr>
              <tr>
                <th scope='row'>Ket. Gambar</th>
                <td><input type='text' class='form-control' name='i'></td>
              </tr>
              <tr>
                <th scope='row'>Tag</th>
                <td>
                  <div class='checkbox-scroll'>
                    <?php foreach ($tag->result_array() as $tag) { ?>
                      <span style='display:block;'><input type=checkbox value='<?php echo $tag['tag_seo'] ?>' name=j[]><?php echo $tag['nama_tag'] ?> &nbsp; &nbsp; &nbsp; </span>

                    <?php } ?>
                  </div>
                </td>
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