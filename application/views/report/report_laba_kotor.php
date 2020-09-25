<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN LABA KOTOR', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');

$sql = "SELECT b.diskon, SUBSTRING(a.waktu_transaksi, 1, 10) AS tgl, c.nama_produk, c.harga_beli, b.jumlah, b.subtotal, b.harga_jual FROM rb_penjualan a, rb_penjualan_detail b, rb_produk c WHERE a.id_penjualan = b.id_penjualan AND c.id_produk = b.id_produk AND SUBSTRING(a.waktu_transaksi, 1, 10) BETWEEN '$awal' AND '$akhir' AND b.retur = 0";

$sqlhpp = "SELECT SUM(c.harga_beli*b.jumlah) AS total_hpp, SUBSTRING(a.waktu_transaksi, 1, 10) AS tgl
FROM rb_penjualan a, rb_penjualan_detail b, rb_produk c WHERE a.id_penjualan = b.id_penjualan AND c.id_produk = b.id_produk AND SUBSTRING(a.waktu_transaksi, 1, 10) BETWEEN '$awal' AND '$akhir'";

$sqltotal = "SELECT SUM(b.subtotal) AS total, SUBSTRING(a.waktu_transaksi, 1, 10) AS tgl
FROM rb_penjualan a, rb_penjualan_detail b, rb_produk c WHERE a.id_penjualan = b.id_penjualan AND c.id_produk = b.id_produk AND SUBSTRING(a.waktu_transaksi, 1, 10) BETWEEN '$awal' AND '$akhir'";

$hpp = $this->db->query($sqlhpp)->row_array();
$total = $this->db->query($sqltotal)->row_array();
$item = $this->db->query($sql)->result();

$laba = $total['total'] - $hpp['total_hpp'];

$yi = 50;
$ya = 50;
$pdf->setFont('Arial', '', 9);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
$pdf->CELL(78, 6, 'NAMA ITEM', 1, 0, 'C', 1);
$pdf->CELL(30, 6, 'TANGGAL', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'HPP', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'PENJUALAN', 1, 0, 'C', 1);
$pdf->CELL(30, 6, 'JUMLAH', 1, 0, 'C', 1);
$pdf->CELL(30, 6, 'DISKON', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'SUBTOTAL', 1, 1, 'C', 1);
$i = 1;
$no = 1;
$max = 31;
$row = 6;
$ya = $yi + $row;
foreach ($item as $data) {
    $pdf->setXY(10, $ya);
    $pdf->setFont('arial', '', 9);
    $pdf->setFillColor(255, 255, 255);
    $pdf->cell(7, 6, $no, 1, 0, 'C', 1);
    $pdf->cell(78, 6, $data->nama_produk, 1, 0, 'L', 1);
    $pdf->cell(30, 6, $data->tgl, 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->harga_beli), 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->harga_jual), 1, 0, 'L', 1);
    $pdf->cell(30, 6, $data->jumlah, 1, 0, 'L', 1);
    $pdf->cell(30, 6, $data->diskon, 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->subtotal), 1, 1, 'L', 1);
    $ya = $ya + $row;
    $no++;
    $i++;
}


$pdf->setFont('Arial', 'B', 10);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(245, 6, 'TOTAL', 1, 0, 'L', 1);
$pdf->CELL(35, 6, 'Rp. ' . rupiah($total['total']), 1, 1, 'L', 1);
$pdf->CELL(245, 6, 'HPP (Harga Pokok Penjualan)', 1, 0, 'L', 1);
$pdf->CELL(35, 6, 'Rp. ' . rupiah($hpp['total_hpp']), 1, 1, 'L', 1);
$pdf->CELL(245, 6, 'TOTAL LABA', 1, 0, 'L', 1);
$pdf->CELL(35, 6, 'Rp. ' . rupiah($laba), 1, 1, 'L', 1);



$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_laba_kotor.pdf', 'I');
