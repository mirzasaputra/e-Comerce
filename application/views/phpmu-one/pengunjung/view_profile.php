<?php
if (trim($row['foto']) == '') {
  $foto_user = 'users.gif';
} else {
  $foto_user = $row['foto'];
}
echo "<p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Data Profile Anda 
        <a class='btn btn-success btn-xs pull-right' href='" . base_url() . "members/edit_profile'><span class='glyphicon glyphicon-edit'></span> Edit Data</a>
        <a style='margin-right:5px' class='btn btn-info btn-xs pull-right' href='#uploadfoto' data-toggle='modal' data-target='#uploadfoto'>Ganti Foto</a>
      </p>
        <p>Berikut Informasi Data Profile anda.<br> 
           Pastikan data-data dibawah ini sudah benar, agar tidak terjadi kesalahan saat transaksi.</p>";
echo "<table class='table table-hover table-condensed'>
                        <thead>
                          <tr bgcolor='#e3e3e3'><td width='110px' rowspan='10'><img style='border:1px solid #cecece' width='85px' src='" . base_url() . "asset/foto_user/$foto_user' class='img-circle'></td></tr>
                          <tr><td width='120px'><b>Username</b></td> <td><b style='color:red'>$row[username]</b></td></tr>
                          <tr><td><b>Nama Lengkap</b></td>           <td>$row[nama_lengkap]</td></tr>
                          <tr><td><b>Email</b></td>                  <td>$row[email]</td></tr>
                          <tr><td><b>Jenis Kelamin</b></td>          <td>$row[jenis_kelamin]</td></tr>
                          <tr><td><b>Tanggal Lahir</b></td>          <td>" . tgl_indo($row['tanggal_lahir']) . "</td></tr>
                          <tr><td><b>Tempat Lahir</b></td>           <td>$row[tempat_lahir]</td></tr>
                          <tr><td><b>Alamat</b></td>                 <td>$row[alamat_lengkap]</td></tr>
                          
                          <tr><td><b>Kota</b></td>                   <td>" . $row['kota'] . "</td></tr>
                          <tr><td><b>No Hp</b></td>                  <td>$row[no_hp]</td></tr>
                        </thead>
                    </table>";
?>
<hr><br>

<table id='example1' class='table table-hover table-condensed'>
  <thead>
    <tr>
      <th width="20px">No</th>
      <th>No Invoice</th>
      <th>Total Belanja</th>
      <th>Status</th>
      <th>Waktu Transaksi</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $record = $this->Model_app->view_where_ordering('rb_penjualan', array('id_pembeli' => $this->session->id_konsumen), 'id_penjualan', 'DESC');
    foreach ($record as $row) {
      if ($row['proses'] == '0') {
        $proses = '<i class="text-danger">Pending</i>';
      } elseif ($row['proses'] == '1') {
        $proses = '<i class="text-warning">Proses</i>';
      } elseif ($row['proses'] == '2') {
        $proses = '<i class="text-info">Konfirmasi</i>';
      } else {
        $proses = '<i class="text-success">Packing </i>';
      }
      $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
      echo "<tr><td>$no</td>
                              <td><a href='" . base_url() . "konfirmasi/tracking/$row[kode_transaksi]'>$row[kode_transaksi]</a></td>
                              <td style='color:red;'>Rp " . rupiah($total['total'] + $total['ongkir'] + substr($row['kode_transaksi'], -3)) . "</td>
                              <td>$proses</td>
                              <td>" . cek_terakhir($row['waktu_transaksi']) . " lalu</td>
                              <td width='50px'><a class='btn btn-info btn-xs' title='Detail data pesanan' href='" . base_url() . "konfirmasi/tracking/$row[kode_transaksi]'><span class='glyphicon glyphicon-search'></span></a></td>
                          </tr>";
      $no++;
    }
    ?>
  </tbody>
</table>