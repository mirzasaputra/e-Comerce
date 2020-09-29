<!-- <p class='sidebar-title'> Konfirmasi Pembayaran Pesanan Anda</p> -->

<?php

// $attributes = array('class' => 'form-horizontal', 'role' => 'form');
// echo form_open_multipart('konfirmasi/index', $attributes);
// echo "<div class='alert alert-info'>Masukkan No Invoice atau No Transaksi Terlebih dahulu!</div>
//       <table class='table table-condensed'>
//         <tbody>
//           <input type='hidden' name='id' value='$rows[id_penjualan]'>
//           <tr><th scope='row' width='120px'>No Invoice</th>       <td><input type='text' name='a' class='form-control' style='width:100%' value='$rows[kode_transaksi]' placeholder='TRX-0000000000' required>";
// if ($rows['kode_transaksi'] != '') {
//   echo "<tr><th scope='row'>Total</th>                  <td><input type='text' name='b' class='form-control' style='width:50%' value='Rp " . rupiah($total['total'] + $total['ongkir'] + substr($rows['kode_transaksi'], -3)) . "' required>
//             <tr><th scope='row'>Transfer Ke</th>                  <td><select name='c' class='form-control' required>
//                                                                         <option value='' selected>- Pilih -</option>";
//   foreach ($record->result_array() as $row) {
//     echo "<option value='$row[id_rekening]'>$row[nama_bank] - $row[no_rekening], A/N : $row[pemilik_rekening]</option>";
//   }
//   echo "</td></tr>
//             <tr><th width='130px' scope='row'>Nama Pengirim</th>  <td><input type='text' class='form-control' style='width:70%' name='d' value='$ksm[nama_lengkap]' required></td></tr>
//             <tr><th scope='row'>Tanggal Transfer</th>             <td><input type='text' class='datepicker form-control' style='width:40%; padding-left:13px' name='e' data-date-format='yyyy-mm-dd' value='" . date('Y-m-d') . "'></td></tr>
//             <tr><th scope='row'>Bukti Transfer</th>               <td><input type='file' class='form-control' name='f'></td></tr>";
// }
// echo "</tbody>
//       </table>

//     <div class='box-footer'>";
// if ($rows['kode_transaksi'] != '') {
//   echo "<button type='submit' name='submit' class='btn btn-info'>Kirimkan</button>";
// } else {
//   echo "<button type='submit' name='submit1' class='btn btn-info'>Cek Invoice</button>";
// }
// echo "</div>";
// echo form_close();

?>

<section class="shop checkout section">
  <div class="container">
      <?php if(isset($this->session->message)) : ?>
        <?=$this->session->message;?>
      <?php endif;?>
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="checkout-form">
          <h2>Konfirmasi Pembayaran Pesanan Anda</h2>
          <p>Masukkan No Invoice atau No Transaksi Terlebih dahulu!</p>
          <!-- Form -->
          <form class="form" method="post" action="<?php echo base_url('konfirmasi/index') ?>" enctype="multipart/form-data">
            <div class="row">
              <?php if(empty($rows['kode_transaksi'])){ ?>
              <div class="col-lg-9 col-md-9 col-12">
                <div class="form-group">
                  <label>Kode Transaksi<span>*</span></label>
                  <input type="text" name="a" placeholder="Masukan Kode Transaksi Anda!" required="required" autocomplete="off">
                </div>
              </div>
              <div class="col-lg-3 col-md-12 col-12">
                <div class="form-group" style="margin-top: 30px;">
                  <div class="single-widget get-button">
                    <div class="content">
                      <div class="button">
                        <button type="submit" name="submit1" class="btn">Cek Invoice</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } else { ?>
              <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group">
                  <label>Kode Transaksi<span>*</span></label>
                  <input type="text" readonly value="<?=$rows['kode_transaksi'];?>" name="kode_transaksi" placeholder="Masukan Kode Transaksi Anda!" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                  <label>Total Transfer</label>
                  <input type="hidden" name="id" value="<?=$rows['id_penjualan'];?>">
                  <input type="text" value="Rp. <?=number_format($total['total'], 0, ',', '.');?>" name="total" placeholder="Total..." required="required" autocomplete="off">
                </div>
                <div class="form-group">
                  <label>Transfer Ke</label>
                  <select name="id_rekening" id="">
                    <option value="">--Pilih--</option>
                    <?php foreach($record->result_array() as $row) : ?>
                      <option value="<?=$row['id_rekening'];?>"><?=$row['nama_bank'];?> - <?=$row['no_rekening'];?> A/N : <?=$row['pemilik_rekening'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Pengirim<span>*</span></label>
                  <input type="text" name="nama" value="<?=$ksm['nama_lengkap'];?>" placeholder="Nama Pengirim" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                  <label>Tanggal Transfer</label>
                  <input type="date" name="date" placeholder="Tanggal ..." value="<?=date('d/m/y');?>" required="required" autocomplete="off">
                </div>
                  <label>Bukti Transfer</label><br>
                  <input type="file" name="file" placeholder="Bukti transfer ..."required="required"><br><br>
                <div class="form-group">
                  <button class="btn" type="submit" name="submit">kirimkan</button>
                </div>
              </div>
              <?php } ?>
            </div>
          </form>
          <!--/ End Form -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Checkout -->