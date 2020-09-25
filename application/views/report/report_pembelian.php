<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN DATA PENJUALAN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');

$sql = "SELECT b.id_pembelian, b.kode_pembelian, c.nama_supplier, SUM(a.jumlah_pesan)   
AS qty_beli, SUM(a.harga_pesan * a.jumlah_pesan) AS total, d.nama_lengkap, b.method, b.waktu_beli FROM rb_pembelian_detail a, rb_pembelian b, rb_supplier c, users d WHERE b.id_pembelian = a.id_pembelian AND c.id_supplier = b.id_supplier AND d.id_users = b.id_user AND a.retur = 0 AND SUBSTRING(b.waktu_beli, 1, 10) BETWEEN '$awal' AND '$akhir' GROUP BY a.id_pembelian";

$sqldetil = "SELECT b.id_pembelian, c.nama_produk, a.harga_pesan, c.harga_konsumen, a.jumlah_pesan, (a.jumlah_pesan * a.harga_pesan) AS subtotal FROM rb_pembelian_detail a, rb_pembelian b, rb_produk c WHERE b.id_pembelian = a.id_pembelian AND c.id_produk = a.id_produk AND SUBSTRING(b.waktu_beli, 1, 10) BETWEEN '$awal' AND '$akhir'";

$detil = $this->db->query($sqldetil)->result_array();
$beli = $this->db->query($sql)->result_array();

$pdf->Cell(132, 2, '', 0, 1, 'R');
$pdf->Cell(132, 6, '', 0, 1, 'R');

foreach ($beli as $j) {

    $pdf->setFont('Arial', '', 9);
    $pdf->setFillColor(255, 255, 255);
    $pdf->Cell(45, 6, 'KODE TRANSAKSI', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $j['kode_pembelian'], 0, 0, 'L', 1);
    $pdf->Cell(30, 6, 'KASIR', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $j['nama_lengkap'], 0, 1, 'L', 1);
    $pdf->Cell(45, 6, 'WAKTU', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $j['waktu_beli'], 0, 0, 'L', 1);
    $pdf->Cell(30, 6, 'SUPPLIER', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $j['nama_supplier'] . ' / ' . $j['method'], 0, 1, 'L', 1);

    $pdf->setFont('Arial', '', 9);
    $pdf->setFillColor(222, 222, 222);
    // $pdf->setXY(10, $ya);
    $pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
    $pdf->CELL(145, 6, 'NAMA ITEM', 1, 0, 'C', 1);
    $pdf->CELL(35, 6, 'HARGA BELI', 1, 0, 'C', 1);
    $pdf->CELL(30, 6, 'HARGA UMUM', 1, 0, 'C', 1);
    $pdf->CELL(25, 6, 'JUMLAH', 1, 0, 'C', 1);
    $pdf->CELL(35, 6, 'SUBTOTAL', 1, 1, 'C', 1);
    $i = 1;
    $no = 1;
    $max = 31;
    $row = 10;
    $ya = $yi + $row;
    foreach ($detil as $data) {
        if ($data['id_pembelian'] == $j['id_pembelian']) {

            // $pdf->setXY(10, $ya);
            $pdf->setFont('arial', '', 9);
            $pdf->setFillColor(255, 255, 255);
            $pdf->cell(7, 6, $no, 1, 0, 'C', 1);
            $pdf->cell(145, 6, $data['nama_produk'], 1, 0, 'L', 1);
            $pdf->cell(35, 6, 'Rp. ' . rupiah($data['harga_pesan']), 1, 0, 'L', 1);
            $pdf->CELL(30, 6, 'Rp. ' . rupiah($data['harga_konsumen']), 1, 0, 'L', 1);
            $pdf->CELL(25, 6, $data['jumlah_pesan'], 1, 0, 'L', 1);
            $pdf->CELL(35, 6, 'Rp. ' . rupiah($data['subtotal']), 1, 1, 'L', 1);
            // $ya = $ya + $row;
            $no++;
            $i++;
        }
    }
    $pdf->setFont('Arial', 'B', 10);
    $pdf->setFillColor(222, 222, 222);
    $pdf->CELL(242, 6, 'GRAND TOTAL', 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($j['total']), 1, 1, 'L', 1);
    $pdf->Cell(132, 2, '', 0, 1, 'R');
    $pdf->Cell(132, 6, '', 0, 1, 'R');
}


$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_pembelian.pdf', 'I');
