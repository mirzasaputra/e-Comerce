<p class='sidebar-title'> Berikut Data Pesanan anda</p>
<?php 
  if ($record->num_rows() == '0'){
    echo "<center style='padding:15%'><i class='text-danger'>Maaf, Keranjang belanja anda saat ini masih kosong,...</i><br>
            <a class='btn btn-warning btn-sm' href='".base_url()."produk'>Klik Disini Untuk mulai Belanja!</a></center>";
  }else{
?>
      <table class="table table-striped table-condensed">
          <thead>
            <tr bgcolor='#e3e3e3'>
              <th width='47%'>Nama Produk</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Berat</th>
              <th>Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
        <?php 
          $no = 1;
          foreach ($record->result_array() as $row){
          $sub_total = (($row['harga_jual']-$row['diskon'])*$row['jumlah']);
          if ($row['diskon']!='0'){ $diskon = "<del style='color:red'>".rupiah($row['harga_jual'])."</del>"; }else{ $diskon = ""; }
          if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
          echo "<tr>
                    <td class='valign'><a href='".base_url()."produk/detail/$row[produk_seo]'>$row[nama_produk]</a> <br>
                      <small>Note : $row[keterangan_order]</small></td>
                    <td class='valign'>".rupiah($row['harga_jual']-$row['diskon'])." $diskon</td>
                    <td class='valign'>$row[jumlah]</td>
                    <td class='valign'>".($row['berat']*$row['jumlah'])." Gram</td>
                    <td class='valign'>Rp ".rupiah($sub_total)."</td>
                    <td class='valign' width='30px'><a class='btn btn-danger btn-xs' title='Delete' href='".base_url()."produk/keranjang_delete/$row[id_penjualan_detail]'><span class='glyphicon glyphicon-remove'></span></a></td>
                </tr>";
            $no++;
          }
          $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `rb_penjualan_temp` a JOIN rb_produk b ON a.id_produk=b.id_produk where a.session='".$this->session->idp."'")->row_array();
          echo "<tr class='success'>
                  <td colspan='4'><b>Subtotal </b> <i class='pull-right'>(".terbilang($total['total'])." Rupiah)</i></td>
                  <td><b>Rp ".rupiah($total['total'])."</b></td>
                  <td></td>
                </tr>

                <tr class='success'>
                  <td colspan='4'><b>Berat</b> <i class='pull-right'>(".terbilang($total['total_berat'])." Gram)</i></td>
                  <td><b>$total[total_berat] Gram</b></td>
                  <td></td>
                </tr>

        </tbody>
      </table>

      <a class='btn btn-success btn-sm' href='".base_url()."produk'>Lanjut Belanja</a>
      <a class='btn btn-primary btn-sm' href='".base_url()."produk/checkouts'>Selesai Belanja</a>";

      $ket = $this->db->query("SELECT * FROM rb_keterangan")->row_array();
      echo "<hr><br>$ket[keterangan]";
}