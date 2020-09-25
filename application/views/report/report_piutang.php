<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN DATA PIUTANG', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
if ($customer == "all") {
    $sql = "SELECT b.id_jual, a.kode_transaksi, c.nama_lengkap, SUBSTRING(b.tgl_piutang, 1, 10) AS tanggal, b.jml_piutang, b.bayar, b.sisa, b.status, b.jatuh_tempo FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir' ORDER BY SUBSTRING(b.tgl_piutang, 1, 10) ASC";
    $result = $this->db->query($sql)->result();
} else {
    $sql = "SELECT b.id_jual, a.kode_transaksi, c.nama_lengkap, SUBSTRING(b.tgl_piutang, 1, 10) AS tanggal, b.jml_piutang, b.bayar, b.sisa, b.status, b.jatuh_tempo FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_konsumen = '$customer' ORDER BY SUBSTRING(b.tgl_piutang, 1, 10) ASC";
    $result = $this->db->query($sql)->result();
}


$yi = 50;
$ya = 50;
$pdf->setFont('Arial', '', 9);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'KODE TRX', 1, 0, 'C', 1);
$pdf->CELL(55, 6, 'CUSTOMER', 1, 0, 'C', 1);
$pdf->CELL(27, 6, 'TANGGAL', 1, 0, 'C', 1);
$pdf->CELL(27, 6, 'JATUH TEMPO', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'JUMLAH', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'BAYAR', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'SISA', 1, 0, 'C', 1);
$pdf->CELL(25, 6, 'STATUS', 1, 0, 'C', 1);
$i = 1;
$no = 1;
$max = 31;
$row = 6;
$ya = $yi + $row;
foreach ($result as $data) {
    $pdf->setXY(10, $ya);
    $pdf->setFont('arial', '', 9);
    $pdf->setFillColor(255, 255, 255);
    $pdf->cell(7, 6, $no, 1, 0, 'C', 1);
    $pdf->cell(35, 6, $data->kode_transaksi, 1, 0, 'L', 1);
    $pdf->cell(55, 6, $data->nama_lengkap, 1, 0, 'L', 1);
    $pdf->CELL(27, 6, $data->tanggal, 1, 0, 'L', 1);
    $pdf->CELL(27, 6, $data->jatuh_tempo, 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->jumlah), 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->bayar), 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->sisa), 1, 0, 'L', 1);
    $pdf->CELL(25, 6, $data->status, 1, 0, 'L', 1);
    $ya = $ya + $row;
    $no++;
    $i++;
}

if ($customer == "all") {

    $query_total = "SELECT SUM(b.jml_piutang) AS total FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $query_lunas = "SELECT SUM(b.jml_piutang) AS total FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND b.status = 'Lunas'";
    $query_sisa = "SELECT SUM(b.sisa) AS sisa FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $query_bayar = "SELECT SUM(b.bayar) AS bayar FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
} else {

    $query_total = "SELECT SUM(b.jml_piutang) AS total FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_konsumen = '$customer'";
    $query_lunas = "SELECT SUM(b.jml_piutang) AS total FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND b.status = 'Lunas' AND c.id_konsumen = '$customer'";
    $query_sisa = "SELECT SUM(b.sisa) AS sisa FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_konsumen = '$customer'";
    $query_bayar = "SELECT SUM(b.bayar) AS bayar FROM rb_penjualan a, piutang b, rb_konsumen c WHERE b.id_jual  = a.id_penjualan AND a.id_pembeli = c.id_konsumen AND SUBSTRING(b.tgl_piutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_konsumen = '$customer'";
}

$total = $this->db->query($query_total)->row_array();
$lunas = $this->db->query($query_lunas)->row_array();
$sisa = $this->db->query($query_sisa)->row_array();
$bayar = $this->db->query($query_bayar)->row_array();

$pdf->setFont('Arial', 'B', 10);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(151, 6, 'TOTAL HUTANG', 1, 0, 'L', 1);
$pdf->CELL(105, 6, 'Rp. ' . rupiah($total['total']), 1, 1, 'L', 1);
$pdf->CELL(151, 6, 'HUTANG DIBAYARKAN', 1, 0, 'L', 1);
$pdf->CELL(105, 6, 'Rp. ' . rupiah($bayar['bayar']), 1, 1, 'L', 1);
$pdf->CELL(151, 6, 'TOTAL LUNAS', 1, 0, 'L', 1);
$pdf->CELL(105, 6, 'Rp. ' . rupiah($lunas['total']), 1, 1, 'L', 1);
$pdf->CELL(151, 6, 'SISA HUTANG', 1, 0, 'L', 1);
$pdf->CELL(105, 6, 'Rp. ' . rupiah($sisa['sisa']), 1, 1, 'L', 1);


$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_piutang.pdf', 'I');
