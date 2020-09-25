<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN STOK OPNAME', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
if ($jenis == "all") {

    $sql = "SELECT d.id_stok, a.nama_produk, d.jenis, d.nilai, d.keterangan, SUBSTRING(d.created_at, 1, 10) AS created_at, d.jml, a.satuan FROM  rb_produk a, stok d        
    WHERE d.id_produk = a.id_produk AND SUBSTRING(d.created_at, 1, 10) BETWEEN '$awal' AND '$akhir'";
} else if ($jenis == "in") {

    $sql = "SELECT d.id_stok, a.nama_produk, d.jenis, d.nilai, d.keterangan, SUBSTRING(d.created_at, 1, 10) AS created_at, d.jml, a.satuan FROM  rb_produk a, stok d        
    WHERE d.id_produk = a.id_produk AND SUBSTRING(d.created_at, 1, 10) BETWEEN '$awal' AND '$akhir' AND d.jenis = 'Stok Masuk'";
} else {

    $sql = "SELECT d.id_stok, a.nama_produk, d.jenis, d.nilai, d.keterangan, SUBSTRING(d.created_at, 1, 10) AS created_at, d.jml, a.satuan FROM  rb_produk a, stok d        
    WHERE d.id_produk = a.id_produk AND SUBSTRING(d.created_at, 1, 10) BETWEEN '$awal' AND '$akhir' AND d.jenis = 'Stok Keluar'";
}

$result = $this->db->query($sql)->result();

$yi = 50;
$ya = 50;
$pdf->setFont('Arial', '', 9);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
$pdf->CELL(64, 6, 'NAMA ITEM', 1, 0, 'C', 1);
$pdf->CELL(18, 6, 'SATUAN', 1, 0, 'C', 1);
$pdf->CELL(18, 6, 'JUMLAH', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'NILAI', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'JENIS', 1, 0, 'C', 1);
$pdf->CELL(30, 6, 'TANGGAL', 1, 0, 'C', 1);
$pdf->CELL(75, 6, 'KETERANGAN', 1, 0, 'C', 1);
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
    $pdf->cell(64, 6, $data->nama_produk, 1, 0, 'L', 1);
    $pdf->cell(18, 6, $data->satuan, 1, 0, 'L', 1);
    $pdf->CELL(18, 6, $data->jml, 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->nilai), 1, 0, 'L', 1);
    $pdf->CELL(35, 6, $data->jenis, 1, 0, 'L', 1);
    $pdf->CELL(30, 6, $data->created_at, 1, 0, 'L', 1);
    $pdf->CELL(75, 6, $data->keterangan, 1, 0, 'L', 1);
    $ya = $ya + $row;
    $no++;
    $i++;
}


$pdf->setFont('Arial', 'B', 10);
$pdf->setFillColor(222, 222, 222);
if ($jenis == "all") {

    $sql_nilai_masuk = "SELECT SUM(nilai) AS nilai_masuk FROM stok WHERE jenis = 'Stok Masuk' AND SUBSTRING(created_at, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $sql_nilai_keluar = "SELECT SUM(nilai) AS nilai_keluar FROM stok WHERE jenis = 'Stok Keluar' AND SUBSTRING(created_at, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $nilai_masuk = $this->db->query($sql_nilai_masuk)->row_array();
    $nilai_keluar = $this->db->query($sql_nilai_keluar)->row_array();


    $pdf->setXY(10, $ya);
    $pdf->CELL(107, 6, 'TOTAL STOK MASUK', 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($nilai_masuk['nilai_masuk']), 1, 1, 'L', 1);
    $pdf->CELL(107, 6, 'TOTAL STOK KELUAR', 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($nilai_keluar['nilai_keluar']), 1, 1, 'L', 1);
} else if ($jenis == "in") {
    $sql_nilai_masuk = "SELECT SUM(nilai) AS nilai_masuk FROM stok WHERE jenis = 'Stok Masuk' AND SUBSTRING(created_at, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $nilai_masuk = $this->db->query($sql_nilai_masuk)->row_array();

    $pdf->setXY(10, $ya);
    $pdf->CELL(107, 6, 'TOTAL STOK MASUK', 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($nilai_masuk['nilai_masuk']), 1, 1, 'L', 1);
} else {
    $sql_nilai_keluar = "SELECT SUM(nilai) AS nilai_keluar FROM stok WHERE jenis = 'Stok Keluar' AND SUBSTRING(created_at, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $nilai_keluar = $this->db->query($sql_nilai_keluar)->row_array();
    $pdf->setXY(10, $ya);
    $pdf->CELL(107, 6, 'TOTAL STOK KELUAR', 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($nilai_keluar['nilai_keluar']), 1, 1, 'L', 1);
}



$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_stok_in_out.pdf', 'I');
