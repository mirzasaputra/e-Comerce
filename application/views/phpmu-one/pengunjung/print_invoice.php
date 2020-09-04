<!DOCTYPE html>
<html>
<head>
<title>Invoice Report</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/printer.css">
</head>
<body onload="window.print()">
<?php
$total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='".$this->uri->segment(3)."'")->row_array();
$iden = $this->model_app->view_where('identitas',array('id_identitas'=>'1'))->row_array();
if ($total['proses']=='0'){ $proses = 'Pending'; }elseif ($total['proses']=='1'){ $proses = 'Proses'; }elseif ($total['proses']=='2'){ $proses = 'Konfirmasi'; }else{ $proses = 'Packing'; }
echo "<h2 style='margin:0px'><center>$iden[nama_website]<center></h2>
      <center><span style='font-size:14px'>$iden[alamat]</span></center><hr>
      <center><b>Invoice. #$total[kode_transaksi]</b></center>
      <div style='clear:both'></div><br>

    <div class='col-md-8'>
        <table width='70%' style='float:left'>
            <tr><td style='text-align:right' width='120px'><b>Nama</b></td> <td> : $rows[nama_lengkap]</td></tr>
            <tr><td style='text-align:right'><b>No Telpon/Hp</b></td>       <td> : $rows[no_hp]</td></tr>
            <tr><td style='text-align:right'><b>Email</b></td>              <td> : $rows[email]</td></tr>
            <tr><td style='text-align:right'><b>Kota</b></td>               <td> : $rows[nama_kota]</td></tr>
            <tr><td style='text-align:right'><b>Alamat Lengkap</b></td>     <td> : $rows[alamat_lengkap]</td></tr>
        </table>
    </div>

    <div class='col-md-4'>
        <center>
        Total Tagihan 
        <h3 style='margin:0px;'>Rp ".rupiah($total['total']+$total['ongkir']+substr($total['kode_transaksi'],-3))."<br> <br>
          <span style='text-transform:uppercase'>$total[kurir]</span> ($total[service])
        </h3>
        Status : <i>$proses</i>   
        </center>
    </div>
      <div style='clear:both'></div>
      <br>
      <table width='100%' border=1 id='tablemodul1'>
          <thead>
            <tr bgcolor='#e3e3e3'>
              <th width='47%'>Nama Produk</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Berat</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>";

          $no = 1;
          $diskon_total = 0;
          foreach ($record->result_array() as $row){
          $sub_total = (($row['harga_jual']-$row['diskon'])*$row['jumlah']);
          if ($row['diskon']!='0'){ $diskon = "<del style='color:red'>".rupiah($row['harga_jual'])."</del>"; }else{ $diskon = ""; }
          if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
          $diskon_total = $diskon_total+$row['diskon']*$row['jumlah'];
          echo "<tr>
                    <td class='valign'>$row[nama_produk]</td>
                    <td class='valign'>".rupiah($row['harga_jual']-$row['diskon'])." $diskon</td>
                    <td class='valign'>$row[jumlah]</td>
                    <td class='valign'>".($row['berat']*$row['jumlah'])." Gram</td>
                    <td class='valign'>Rp ".rupiah($sub_total)."</td>
                </tr>";
            $no++;
          }
          
          echo "<tr class='success'>
                  <td colspan='4'><b>Subtotal </b> <i style='float:right'>(".terbilang($total['total'])." Rupiah)</i></td>
                  <td><b>Rp ".rupiah($total['total'])."</b></td>
                </tr>

                <tr class='success'>
                  <td colspan='4'><b>Berat</b> <i style='float:right'>(".terbilang($total['total_berat'])." Gram)</i></td>
                  <td><b>$total[total_berat] Gram</b></td>
                </tr>

        </tbody>
      </table><br>";
?>

Silahkan Transfer ke salah satu pilihan bank di bawah ini:
<table width='50%' border=1 id='tablemodul1'>
<thead>
  <tr bgcolor='#e3e3e3'>
    <th width="20px">No</th>
    <th>Nama Bank</th>
    <th>No Rekening</th>
    <th>Atas Nama</th>
  </tr>
</thead>
<tbody>
  <?php 
    $no = 1;
    $rekening = $this->model_app->view('rb_rekening');
    foreach ($rekening->result_array() as $row){
    echo "<tr><td>$no</td>
              <td>$row[nama_bank]</td>
              <td>$row[no_rekening]</td>
              <td>$row[pemilik_rekening]</td>
          </tr>";
      $no++;
    }
  ?>
</tbody>
</table>
</body>
</html>
