<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN DATA PENJUALAN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');

// if ($jenis == 'all') {

//     $sql = "SELECT b.id_penjualan, b.kode_transaksi, d.nama_lengkap, c.nama_lengkap as customer, SUM(a.diskon) AS diskon, SUM(a.subtotal) AS total, b.waktu_transaksi, SUM(a.jumlah) AS qty, b.method FROM rb_penjualan_detail a, rb_penjualan b, rb_konsumen c, users d  WHERE b.id_penjualan = a.id_penjualan AND c.id_konsumen = b.id_pembeli AND d.id_users = b.id_user AND SUBSTRING(b.waktu_transaksi, 1, 10) BETWEEN '$awal' AND '$akhir' AND a.retur = 0 GROUP BY a.id_penjualan ORDER BY SUBSTRING(b.waktu_transaksi, 1, 10) ASC";
// }
if ($jenis == 'online') {
    $sql = "SELECT b.id_penjualan, b.kurir, b.service, b.ongkir, b.resi, b.kode_transaksi, c.nama_lengkap as customer, SUM(a.diskon) AS diskon, SUM(a.subtotal) AS total, b.waktu_transaksi, SUM(a.jumlah) AS qty FROM rb_penjualan_detail a, rb_penjualan b, rb_konsumen c WHERE b.id_penjualan = a.id_penjualan AND c.id_konsumen = b.id_pembeli AND SUBSTRING(b.waktu_transaksi, 1, 10) BETWEEN '$awal' AND '$akhir' AND a.retur = 0 AND b.online_order = 'Y' AND b.proses BETWEEN '2' AND '3' GROUP BY a.id_penjualan ORDER BY SUBSTRING(b.waktu_transaksi, 1, 10) ASC";
} else if ($jenis == 'offline') {
    $sql = "SELECT b.id_penjualan, b.kode_transaksi, d.nama_lengkap, c.nama_lengkap as customer, SUM(a.diskon) AS diskon, SUM(a.subtotal) AS total, b.waktu_transaksi, SUM(a.jumlah) AS qty, b.method FROM rb_penjualan_detail a, rb_penjualan b, rb_konsumen c, users d  WHERE b.id_penjualan = a.id_penjualan AND c.id_konsumen = b.id_pembeli AND d.id_users = b.id_user AND SUBSTRING(b.waktu_transaksi, 1, 10) BETWEEN '$awal' AND '$akhir' AND a.retur = 0 AND b.online_order = 'N' GROUP BY a.id_penjualan ORDER BY SUBSTRING(b.waktu_transaksi, 1, 10) ASC";
}

$sqldetil = "SELECT b.id_penjualan, c.nama_produk, a.harga_jual, a.jumlah, a.diskon,  a.subtotal FROM rb_penjualan_detail a, rb_penjualan b, rb_produk c WHERE b.id_penjualan = a.id_penjualan AND c.id_produk = a.id_produk AND a.retur = 0";

$detil = $this->db->query($sqldetil)->result_array();
$jual = $this->db->query($sql)->result_array();

$pdf->Cell(132, 2, '', 0, 1, 'R');
$pdf->Cell(132, 6, '', 0, 1, 'R');

foreach ($jual as $j) {

    $pdf->setFont('Arial', '', 9);
    $pdf->setFillColor(255, 255, 255);
    $pdf->Cell(45, 6, 'KODE TRANSAKSI', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $j['kode_transaksi'], 0, 0, 'L', 1);
    if ($jenis == 'online') {

        $pdf->Cell(30, 6, 'KURIR', 0, 0, 'L', 1);
        $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
        $pdf->Cell(60, 6, strtoupper($j['kurir']) . '  ' . $j['service'] . ' / ' . $j['resi'], 0, 1, 'L', 1);
    } else {
        $pdf->Cell(30, 6, 'KASIR', 0, 0, 'L', 1);
        $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
        $pdf->Cell(60, 6, $j['nama_lengkap'], 0, 1, 'L', 1);
    }
    $pdf->Cell(45, 6, 'WAKTU', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    $pdf->Cell(60, 6, $j['waktu_transaksi'], 0, 0, 'L', 1);
    $pdf->Cell(30, 6, 'CUSTOMER', 0, 0, 'L', 1);
    $pdf->Cell(2, 6, ':', 0, 0, 'L', 1);
    if ($jenis == 'online') {

        $pdf->Cell(60, 6, $j['customer'], 0, 1, 'L', 1);
    } else {

        $pdf->Cell(60, 6, $j['customer'] . ' / ' . $j['method'], 0, 1, 'L', 1);
    }

    $pdf->setFont('Arial', '', 9);
    $pdf->setFillColor(222, 222, 222);
    // $pdf->setXY(10, $ya);
    $pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
    $pdf->CELL(145, 6, 'NAMA ITEM', 1, 0, 'C', 1);
    $pdf->CELL(35, 6, 'HARGA', 1, 0, 'C', 1);
    $pdf->CELL(25, 6, 'JUMLAH', 1, 0, 'C', 1);
    $pdf->CELL(30, 6, 'DISKON', 1, 0, 'C', 1);
    $pdf->CELL(35, 6, 'SUBTOTAL', 1, 1, 'C', 1);
    $i = 1;
    $no = 1;
    $max = 31;
    $row = 10;
    $ya = $yi + $row;
    foreach ($detil as $data) {
        if ($data['id_penjualan'] == $j['id_penjualan']) {

            // $pdf->setXY(10, $ya);
            $pdf->setFont('arial', '', 9);
            $pdf->setFillColor(255, 255, 255);
            $pdf->cell(7, 6, $no, 1, 0, 'C', 1);
            $pdf->cell(145, 6, $data['nama_produk'], 1, 0, 'L', 1);
            $pdf->cell(35, 6, 'Rp. ' . rupiah($data['harga_jual']), 1, 0, 'L', 1);
            $pdf->CELL(25, 6, $data['jumlah'], 1, 0, 'L', 1);
            $pdf->CELL(30, 6, 'Rp. ' . rupiah($data['diskon']), 1, 0, 'L', 1);
            $pdf->CELL(35, 6, 'Rp. ' . rupiah($data['subtotal']), 1, 1, 'L', 1);
            // $ya = $ya + $row;
            $no++;
            $i++;
        }
    }
    $pdf->setFont('Arial', 'B', 10);
    $pdf->setFillColor(222, 222, 222);
    $pdf->CELL(242, 6, 'DISKON', 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($j['diskon']), 1, 1, 'L', 1);
    $pdf->CELL(242, 6, 'TOTAL', 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($j['total']), 1, 1, 'L', 1);
    if ($jenis == 'online') {
        $pdf->CELL(242, 6, 'ONGKIR', 1, 0, 'L', 1);
        $pdf->CELL(35, 6, 'Rp. ' . rupiah($j['ongkir']), 1, 1, 'L', 1);
        $pdf->CELL(242, 6, 'GRAND TOTAL', 1, 0, 'L', 1);
        $pdf->CELL(35, 6, 'Rp. ' . rupiah($j['ongkir'] + $j['total']), 1, 1, 'L', 1);
    }
    $pdf->Cell(132, 2, '', 0, 1, 'R');
    $pdf->Cell(132, 6, '', 0, 1, 'R');
}

$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_penjualan.pdf', 'I');
