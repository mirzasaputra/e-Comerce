<!DOCTYPE html>
<html>

<head>
  <title>Report - Toko Online</title>
</head>

<body onload="window.print()">
  <?php
  $identitas = $this->db->get('identitas')->row_array();
  echo "<center><h2 style='margin-bottom:3px;'>ORDERS REPORT</h2>
        " . $identitas['alamat'] . "<br>"
    . $identitas['no_telp'] . "</center><hr/>";
  ?>
  <table width='100%' border=1>
    <thead>
      <tr>
        <th width="20px">No</th>
        <th>Kode Transaksi</th>
        <th>Total Belanja</th>
        <th>Pengiriman</th>
        <th>Tujuan</th>
        <th>Waktu Transaksi</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($record->result_array() as $row) {
        if ($row['proses'] == '0') {
          $proses = '<i class="text-danger">Pending</i>';
          $color = 'danger';
          $text = 'Pending';
        } elseif ($row['proses'] == '1') {
          $proses = '<i class="text-warning">Proses</i>';
          $color = 'warning';
          $text = 'Proses';
        } elseif ($row['proses'] == '2') {
          $proses = '<i class="text-info">Konfirmasi</i>';
          $color = 'info';
          $text = 'Konfirmasi';
        } else {
          $proses = '<i class="text-success">Packing </i>';
          $color = 'success';
          $text = 'Packing';
        }
        $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, e.nama_kota, f.nama_provinsi, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk JOIN rb_konsumen d ON a.id_pembeli=d.id_konsumen JOIN rb_kota e ON d.kota_id=e.kota_id JOIN rb_provinsi f ON e.provinsi_id=f.provinsi_id where a.kode_transaksi='$row[kode_transaksi]'")->row_array();

        echo "<tr><td>$no</td>
                <td>$row[kode_transaksi]</td>
                <td style='color:red;'>Rp " . rupiah($total['total'] + $total['ongkir'] + substr($row['kode_transaksi'], -3)) . "</td>
                <td><span style='text-transform:uppercase'>$total[kurir]</span> ($total[service])</td>
                <td><a target='_BLANK' title='$total[nama_provinsi] -> $total[nama_kota]' href='https://www.google.com/maps/place/$total[nama_kota]'>$total[nama_kota]</a></td>
                <td>$row[waktu_transaksi]</td>
                <td>$text</td>
             </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
</body>

</html>