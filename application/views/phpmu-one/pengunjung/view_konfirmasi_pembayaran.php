<p class='sidebar-title'> Konfirmasi Pembayaran Pesanan Anda</p>

<?php 

    $attributes = array('class'=>'form-horizontal','role'=>'form');
    echo form_open_multipart('konfirmasi/index',$attributes); 
    echo "<div class='alert alert-info'>Masukkan No Invoice atau No Transaksi Terlebih dahulu!</div>
      <table class='table table-condensed'>
        <tbody>
          <input type='hidden' name='id' value='$rows[id_penjualan]'>
          <tr><th scope='row' width='120px'>No Invoice</th>       <td><input type='text' name='a' class='form-control' style='width:100%' value='$rows[kode_transaksi]' placeholder='TRX-0000000000' required>";
          if ($rows['kode_transaksi']!=''){
            echo "<tr><th scope='row'>Total</th>                  <td><input type='text' name='b' class='form-control' style='width:50%' value='Rp ".rupiah($total['total']+$total['ongkir']+substr($rows['kode_transaksi'],-3))."' required>
            <tr><th scope='row'>Transfer Ke</th>                  <td><select name='c' class='form-control' required>
                                                                        <option value='' selected>- Pilih -</option>";
                                                                    foreach ($record->result_array() as $row){
                                                                        echo "<option value='$row[id_rekening]'>$row[nama_bank] - $row[no_rekening], A/N : $row[pemilik_rekening]</option>";
                                                                    }
            echo "</td></tr>
            <tr><th width='130px' scope='row'>Nama Pengirim</th>  <td><input type='text' class='form-control' style='width:70%' name='d' value='$ksm[nama_lengkap]' required></td></tr>
            <tr><th scope='row'>Tanggal Transfer</th>             <td><input type='text' class='datepicker form-control' style='width:40%; padding-left:13px' name='e' data-date-format='yyyy-mm-dd' value='".date('Y-m-d')."'></td></tr>
            <tr><th scope='row'>Bukti Transfer</th>               <td><input type='file' class='form-control' name='f'></td></tr>";
          }
        echo "</tbody>
      </table>

    <div class='box-footer'>";
        if ($rows['kode_transaksi']!=''){
          echo "<button type='submit' name='submit' class='btn btn-info'>Kirimkan</button>";
        }else{
          echo "<button type='submit' name='submit1' class='btn btn-info'>Cek Invoice</button>";
        }
    echo "</div>";
    echo form_close();

