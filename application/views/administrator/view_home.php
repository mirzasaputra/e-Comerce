<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>
          <?php $jmla = $this->db->query("SELECT * FROM rb_konsumen")->num_rows();
          echo $jmla;
          ?>
        </h3>

        <p>Konsumen</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="<?php echo base_url(); ?>administrator/konsumen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>
          <?php $jmlb = $this->db->query("SELECT * FROM rb_kategori_produk")->num_rows();
          echo $jmlb;
          ?>
        </h3>
        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="fa fa-th-list"></i>
      </div>
      <a href="<?php echo base_url(); ?>administrator/kategori_produk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>
          <?php $jmlc = $this->db->query("SELECT * FROM rb_produk")->num_rows();
          echo $jmlc;
          ?>
        </h3>

        <p>Produk</p>
      </div>
      <div class="icon">
        <i class="glyphicon glyphicon-th"></i>
      </div>
      <a href="<?php echo base_url(); ?>administrator/produk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>
          <?php $jmld = $this->db->query("SELECT * FROM rb_penjualan")->num_rows();
          echo $jmld;
          ?>
        </h3>

        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="<?php echo base_url(); ?>administrator/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->



<div class="row">
  <section class="col-lg-6 ">

    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-pencil"></i>
        <h3 class="box-title">Transaksi Penjualan Terbaru</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body">
        <table class='table table-hover table-condensed'>
          <thead>
            <tr>
              <th width="20px">No</th>
              <th>Kode Transaksi</th>
              <th>Total Belanja</th>
              <th>Status</th>
              <th>Waktu</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $record = $this->Model_app->orders_report_home(10);
            foreach ($record->result_array() as $row) {
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
                                      <td>$row[kode_transaksi]</td>
                                      <td style='color:red;'>Rp " . rupiah($total['total'] + $total['ongkir'] + substr($total['kode_transaksi'], -3)) . "</td>
                                      <td>$proses</td>
                                      <td>" . cek_terakhir($row['waktu_transaksi']) . " lalu</td>
                                      <td width='50px'><a class='btn btn-info btn-xs' title='Detail data pesanan' href='" . base_url() . "administrator/tracking/$row[kode_transaksi]'><span class='glyphicon glyphicon-search'></span></a></td>
                                   </tr>";
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>

  </section><!-- right col -->
</div>