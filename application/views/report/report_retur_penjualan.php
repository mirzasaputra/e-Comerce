<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN DATA RETUR PENJUALAN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');

$sql = "SELECT a.id_retur_penjualan, a.kode_retur, a.tgl_retur, b.kode_transaksi, c.nama_lengkap AS customer, d.nama_lengkap AS kasir, SUM(e.total_retur) AS total FROM retur_penjualan a, rb_penjualan b, rb_konsumen c, users d, retur_penjualan_detail e WHERE a.id_penjualan = b.id_penjualan AND a.id_user = d.id_users AND e.id_retur_penjualan = a.id_retur_penjualan AND b.id_pembeli = c.id_konsumen AND SUBSTRING(a.tgl_retur, 1, 10) BETWEEN '$awal' AND '$akhir' GROUP BY a.id_retur_penjualan ORDER BY a.id_retur_penjualan ASC";

$sqldetil = "SELECT a.id_retur_penjualan_detail ,b.id_retur_penjualan, c.nama_produk, a.harga_produk, a.jumlah_retur, a.total_retur, IF(a.kondisi = 1, 'Rusak', 'Layak / Bagus') AS kondisi, IF(a.opsi = 1, 'Stok In', 'Stok Out') AS opsi FROM retur_penjualan_detail a, retur_penjualan b, rb_produk c WHERE a.id_retur_penjualan = b.id_retur_penjualan AND c.id_produk = a.id_produk ";

$detil = $this->db->query($sqldetil)->result_array();
$retur = $this->db->query($sql)->result_array();

$pdf->Cell(132, 2, '', 0, 1, 'R');
$pdf->Cell(132, 6, '', 0, 1, 'R');

foreach ($retur as $retur) {

    $pdf->setFont('Arial', '', 9);
    $pdf->setFillColor(255, 255, 255);
    $pdf->Cell(45, 6, 'KODE RETUR', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $retur['kode_retur'], 0, 0, 'L', 1);
    $pdf->Cell(30, 6, 'KASIR', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $retur['kasir'], 0, 0, 'L', 1);
    $pdf->Cell(30, 6, 'WAKTU', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $retur['tgl_retur'], 0, 1, 'L', 1);
    $pdf->Cell(45, 6, 'KODE PENJUALAN', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $retur['kode_transaksi'], 0, 0, 'L', 1);
    $pdf->Cell(30, 6, 'CUSTOMER', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $retur['customer'], 0, 1, 'L', 1);

    $pdf->setFont('Arial', '', 9);
    $pdf->setFillColor(222, 222, 222);
    // $pdf->setXY(10, $ya);
    $pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
    $pdf->CELL(120, 6, 'NAMA ITEM', 1, 0, 'C', 1);
    $pdf->CELL(35, 6, 'HARGA PRODUK', 1, 0, 'C', 1);
    $pdf->CELL(30, 6, 'JUMLAH RETUR', 1, 0, 'C', 1);
    $pdf->CELL(40, 6, 'TOTAL RETUR', 1, 0, 'C', 1);
    $pdf->CELL(20, 6, 'KONDISI', 1, 0, 'C', 1);
    $pdf->CELL(25, 6, 'MASUK KE', 1, 1, 'C', 1);
    $i = 1;
    $no = 1;
    $max = 31;
    $row = 10;
    $ya = $yi + $row;
    foreach ($detil as $data) {
        if ($data['id_retur_penjualan'] == $retur['id_retur_penjualan']) {

            // $pdf->setXY(10, $ya);
            $pdf->setFont('arial', '', 9);
            $pdf->setFillColor(255, 255, 255);
            $pdf->cell(7, 6, $no, 1, 0, 'C', 1);
            $pdf->cell(120, 6, $data['nama_produk'], 1, 0, 'L', 1);
            $pdf->cell(35, 6, 'Rp. ' . rupiah($data['harga_produk']), 1, 0, 'L', 1);
            $pdf->CELL(30, 6, $data['jumlah_retur'], 1, 0, 'L', 1);
            $pdf->cell(40, 6, 'Rp. ' . rupiah($data['total_retur']), 1, 0, 'L', 1);
            $pdf->CELL(20, 6, $data['kondisi'], 1, 0, 'L', 1);
            $pdf->CELL(25, 6, $data['opsi'], 1, 1, 'L', 1);
            // $ya = $ya + $row;
            $no++;
            $i++;
        }
    }
    $pdf->setFont('Arial', 'B', 10);
    $pdf->setFillColor(222, 222, 222);
    $pdf->CELL(192, 6, 'GRAND TOTAL', 1, 0, 'L', 1);
    $pdf->CELL(40, 6, 'Rp. ' . rupiah($retur['total']), 1, 1, 'L', 1);
    $pdf->Cell(132, 2, '', 0, 1, 'R');
    $pdf->Cell(132, 6, '', 0, 1, 'R');
}


$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_retur_penjualan.pdf', 'I');
