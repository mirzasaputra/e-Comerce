<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="<?= base_url(); ?>">Home <i class="ti-arrow-right"></i></a></li>
            <li><a href="<?= base_url(); ?>members/profile/">Profile <i class="ti-arrow-right"></i></i></a></li>
            <li><a href="">Edit Profile</i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="checkout-form">
          <form action="<?= base_url(); ?>members/edit_profile" method="post" class="form">
            <input type="hidden" name="submit">
            <table class="table">
              <thead>
                <tr>
                  <td colspan="2">
                    <h5>Edit Data Profile</h5>Pastikan data anda sudah benar, agar tidak terjadi kesalahan saat transaksi.
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th width='20%'>Nama</th>
                  <td>
                    <div class="form-group m-0">
                      <input type="text" name="nama" placeholder="Nama..." value="<?= $row['nama_lengkap']; ?>" autofocus required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Username</th>
                  <td>
                    <div class="form-group m-0 p-0 col-md-8 col-12">
                      <input type="text" name="user" placeholder="Usernae..." value="<?= $row['username']; ?>" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Password</th>
                  <td>
                    <div class="form-group m-0 p-0 col-md-8 col-12">
                      <input type="password" name="pass" placeholder="Password...">
                      <i class="small text-muted mx-2">*Kosongkan saja jika tidak diubah</i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Email</th>
                  <td>
                    <div class="form-group m-0">
                      <input type="email" name="email" placeholder="Email..." value="<?= $row['email']; ?>" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Jenis Kelamin</th>
                  <td>
                    <input type="radio" name="jekel" value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo "checked"; ?> id="laki"><label for="laki" class="mx-2"> Laki - laki</label>
                    <input type="radio" name="jekel" value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> id="prem"><label for="prem" class="mx-2"> Perempuan</label>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Tanggal Lahir</th>
                  <td>
                    <div class="form-group m-0">
                      <input type="date" name="tanggal_lahir" placeholder="Tanggal lahir..." value="<?= $row['tanggal_lahir']; ?>" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Tempat Lahir</th>
                  <td>
                    <div class="form-group m-0">
                      <input type="text" name="tempat_lahir" placeholder="Tempat lahir..." value="<?= $row['tempat_lahir']; ?>" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Alamat</th>
                  <td>
                    <div class="form-group m-0">
                      <textarea name="alamat" rows="2" style="height: auto!important;" placeholder="Alamat..."><?= $row['alamat_lengkap']; ?></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Kota Sekarang</th>
                  <td>
                    <div class="form-group m-0">
                      <select name="kota_id" id="country">
                        <?php
                        foreach ($kota->result_array() as $rows) {
                          if ($row['kota_id'] == $rows['kota_id']) {
                            echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
                          } else {
                            echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>No. Hp</th>
                  <td>
                    <div class="form-group m-0">
                      <input type="text" name="no_hp" placeholder="No Hp..." value="<?= $row['no_hp']; ?>" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th width='20%'>Tipe Konsumen</th>
                  <td>
                    <div class="form-group m-0 p-0 col-md-8 col-12">
                      <input type="text" name="tipe" placeholder="Tipe Konsumen" value="<?= $row['tipe']; ?>" readonly>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><button class="btn" type="submit">Simpan Perubahan</button></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Checkout -->