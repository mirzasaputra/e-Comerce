<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?=base_url();?>">Home <i class="ti-arrow-right"></i></a></li>
                        <li><a href="<?=base_url();?>members/profile/">Profile</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
			
<?php if($row['tempat_lahir'] == '' || $row['tanggal_lahir'] == '0000-00-00' || $row['alamat_lengkap'] == '' || $row['kota_id'] == '' || $row['no_hp'] == '') : ?>
  <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Silahkan lengkapi data diri anda, agar tidak terjadi kesalahan saat melakukan transaksi.</div>
<?php endif;?>

<!-- Start Blog Single -->
<section class="blog-single section">
  <div class="container">
      <?php if($_GET['pesan']) : ?>
        <div class="alert <?=decripty($_GET['success']);?>"><?=decript($_GET['success']);?></div>
      <?php endif;?>
      <div class="img-profil mx-auto mb-5">
        <?php
        if (trim($row['foto']) == '') {
          $foto_user = 'users.gif';
        } else {
          $foto_user = $row['foto'];
        }
        ?>
        <form action="<?=base_url();?>members/foto" method="post" enctype="multipart/form-data">
          <input type="file" id="file" name="foto" class="d-none">
          <input type="hidden" name="submit">
          <img src="<?=base_url();?>asset/foto_user/<?=$foto_user;?>" id="imgPreview" class="w-100" alt="User profile">
          <label for="file" class="img-btn edit"><i class="fa fa-pencil"></i></label>
          <button class="img-btn right d-none save"><i class="fa fa-save"></i></button>
        </form>
      </div>
      
      <table class="table mb-0">
        <thead>
          <tr>
            <td><h5>Data Profile</h5>Pastikan data profile anda sudah benar, agar tidak terjadi kesalahan saat transaksi.</td>
            <td align="right"><a href="<?=base_url();?>members/edit_profile" class="btn text-white">Edit Data</a></td>
          </tr>
        </thead>
      </table>

      <table class="table">
        <tr>
          <th width="20%">Nama</th>
          <td><?=$row['nama_lengkap'];?></td>
        </tr>
        <tr>  
          <th>Username</th>
          <td class="text-danger"><?=$row['username'];?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?=$row['email'];?></td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td><?=$row['jenis_kelamin'];?></td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td><?=$row['tanggal_lahir'];?></td>
        </tr>
        <tr>
          <th>Tempat Lahir</th>
          <td><?=$row['tempat_lahir'];?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><?=$row['alamat_lengkap'];?></td>
        </tr>
        <tr>
          <th>Kota</th>
          <td><?=$row['kota'];?></td>
        </tr>
        <tr>
          <th>No. Hp</th>
          <td><?=$row['no_hp'];?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </table>

      <br><br>

      <div class="card">
        <div class="card-header">
          <h5>Riwayat Pembelian</h5>
        </div>
        <div class="card-body">
          <?php
          $cek = $this->db->get_where('rb_penjualan', array('id_pembeli' => $this->session->id_konsumen));
          if($cek->num_rows() > 0) : ?>
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th width="1%">No.</th>
                <th>No. Invoice</th>
                <th>No. Resi</th>
                <th>Total Belanja</th>
                <th>Status</th>
                <th>Waktu Transaksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $record = $this->Model_app->view_where_ordering('rb_penjualan', array('id_pembeli' => $this->session->id_konsumen), 'id_penjualan', 'DESC');

              foreach($record as $row) :

              if ($row['proses'] == '0') {
                $proses = '<i class="text-danger">Pending</i>';
              } elseif ($row['proses'] == '1') {
                $proses = '<i class="text-warning">Proses</i>';
              } elseif ($row['proses'] == '2') {
                $proses = '<i class="text-info">Konfirmasi</i>';
              } else {
                $proses = '<i class="text-success">Packing </i>';
              }
              ?>
              <tr>
              <?php $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='$row[kode_transaksi]'")->row_array();?>
                <td><?=$no++;?></td>
                <td><?=$row['kode_transaksi'];?></td>
                <td><?=$row['resi'];?></td>
                <td>Rp. <?=number_format($total['total'] + $total['ongkir'] + substr($row['kode_transaksi']), 0, ',', '.');?></td>
                <td><?=$proses;?></td>
                <td><?=$row['waktu_transaksi'];?></td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <?php endif;?>
          <?php if($cek->num_rows() <= 0) : ?>
            <h5 class="text-muted text-center my-4">Tidak ada transaksi yang ditemukan.</h5>
          <?php endif;?>
        </div>
      </div>
  </div>
</div>

<script>
  function imgPreview(input){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#imgPreview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#file').change(function(){
    $('.edit').addClass('left');
    $('.save').removeClass('d-none');

    imgPreview(this);
  })
</script>