<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Edit Berita Terpilih</h3>
    </div>
    <div class='box-body'>
      <form action="<?php echo base_url('administrator/edit_listberita') ?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
          <table class='table table-condensed table-bordered'>
            <tbody>
              <input type='hidden' name='id' value='<?php echo $rows['id_berita'] ?>'>
              <tr>
                <th width='120px' scope='row'>Judul</th>
                <td><input type='text' class='form-control' name='b' value='<?php echo $rows['judul'] ?>' required></td>
              </tr>
              <tr>
                <th scope='row'>Sub Judul</th>
                <td><input type='text' class='form-control' name='c' value='<?php echo $rows['sub_judul'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Video Youtube</th>
                <td><input type='text' class='form-control' name='d' value='<?php echo $rows['youtube'] ?>' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td>
              </tr>
              <tr>
                <th scope='row'>Kategori</th>
                <td><select name='a' class='form-control select2' required>
                    <?php foreach ($record->result_array() as $row) {
                      if ($rows['id_kategori'] == $row['id_kategori']) { ?>
                        <option value='<?php echo $row['id_kategori'] ?>' selected><?php echo $row['nama_kategori'] ?></option>
                      <?php } else { ?>
                        <option value='<?php echo $row['id_kategori'] ?>'><?php echo $row['nama_kategori'] ?></option>
                      <?php } ?>
                    <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Headline</th>
                <td>
                  <?php if ($rows['headline'] == 'Y') { ?>

                    <input type='radio' name='e' value='Y' checked> Ya &nbsp; <input type='radio' name='e' value='N'> Tidak
                  <?php } else { ?>

                    <input type='radio' name='e' value='Y'> Ya &nbsp; <input type='radio' name='e' value='N' checked> Tidak
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Pilihan Redaksi</th>
                <td>
                  <?php if ($rows['aktif'] == 'Y') { ?>

                    <input type='radio' name='f' value='Y' checked> Ya &nbsp; <input type='radio' name='f' value='N'> Tidak
                  <?php } else { ?>

                    <input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak
                  <?php } ?>

                </td>
              </tr>
              <tr>
                <th scope='row'>Berita Utama</th>
                <td>
                  <?php if ($rows['utama'] == 'Y') { ?>
                    <input type='radio' name='g' value='Y' checked> Ya &nbsp; <input type='radio' name='g' value='N'> Tidak
                  <?php } else { ?>
                    <input type='radio' name='g' value='Y'> Ya &nbsp; <input type='radio' name='g' value='N' checked> Tidak
                  <?php } ?>

                </td>
              </tr>
              <tr>
                <th scope='row'>Isi Berita</th>
                <td><textarea id='editor1' class='form-control' name='h' style='height:350px' required><?php echo $rows['isi_berita'] ?></textarea></td>
              </tr>
              <tr>
                <th scope='row'>Ganti Gambar</th>
                <td><input type='file' class='form-control' name='k'>
                  <?php if ($rows['gambar'] != '') { ?>
                    <i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href="<?php echo base_url('asset/foto_berita/') . $rows['gambar'] ?>"><?php echo $rows['gambar'] ?></a>

                  <?php } ?>
                </td>
              </tr>
              <tr>
                <th scope='row'>Ket. Gambar</th>
                <td><input type='text' class='form-control' name='i' value='<?php echo $rows['keterangan_gambar'] ?>'></td>
              </tr>
              <tr>
                <th scope='row'>Tag</th>
                <td>
                  <div class='checkbox-scroll'>
                    <?php
                    $_arrNilai = explode(',', $rows['tag']);
                    foreach ($tag->result_array() as $tag) {
                      $_ck = (array_search($tag['tag_seo'], $_arrNilai) === false) ? '' : 'checked';
                    ?>
                      <span style='display:block;'><input type=checkbox value='<?php echo $tag['tag_seo'] ?>' name=j[] $_ck><?php echo $tag['nama_tag'] ?> &nbsp; &nbsp; &nbsp; </span>
                    <?php } ?>

                  </div>
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