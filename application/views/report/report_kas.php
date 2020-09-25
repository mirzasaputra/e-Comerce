<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN DATA KAS', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
$sql = "SELECT * FROM kas a, users b WHERE a.id_user = b.id_users AND SUBSTRING(a.created_at, 1, 10) BETWEEN '$awal' AND '$akhir'";
$result = $this->db->query($sql)->result();
$pemasukan = $this->db->query("SELECT SUM(nominal) AS nominal FROM kas WHERE jenis = 'Pemasukan'  AND SUBSTRING(created_at, 1, 10) BETWEEN '$awal' AND '$akhir'")->row_array();
$pengeluaran = $this->db->query("SELECT SUM(nominal) AS nominal FROM kas WHERE jenis = 'Pengeluaran'  AND SUBSTRING(created_at, 1, 10) BETWEEN '$awal' AND '$akhir'")->row_array();
$total = (int)$pemasukan['nominal'] - (int)$pengeluaran['nominal'];

$yi = 50;
$ya = 50;
$pdf->setFont('Arial', '', 9);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
$pdf->CELL(50, 6, 'USER', 1, 0, 'C', 1);
$pdf->CELL(40, 6, 'TANGGAL', 1, 0, 'C', 1);
$pdf->CELL(50, 6, 'JENIS', 1, 0, 'C', 1);
$pdf->CELL(45, 6, 'NOMINAL', 1, 0, 'C', 1);
$pdf->CELL(85, 6, 'KETERANGAN', 1, 0, 'C', 1);
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
    $pdf->cell(50, 6, $data->nama_lengkap, 1, 0, 'L', 1);
    $pdf->cell(40, 6, $data->created_at, 1, 0, 'L', 1);
    $pdf->CELL(50, 6, $data->jenis, 1, 0, 'L', 1);
    $pdf->CELL(45, 6, 'Rp. ' . rupiah($data->nominal), 1, 0, 'L', 1);
    $pdf->CELL(85, 6, $data->keterangan, 1, 0, 'L', 1);
    $ya = $ya + $row;
    $no++;
    $i++;
}
$pdf->setFont('Arial', 'B', 10);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(147, 6, 'TOTAL PEMASUKAN', 1, 0, 'L', 1);
$pdf->CELL(45, 6, 'Rp. ' . rupiah($pemasukan['nominal']), 1, 1, 'L', 1);
$pdf->CELL(147, 6, 'TOTAL PENGELUARAN', 1, 0, 'L', 1);
$pdf->CELL(45, 6, 'Rp. ' . rupiah($pengeluaran['nominal']), 1, 1, 'L', 1);
$pdf->CELL(147, 6, 'TOTAL SISA KAS', 1, 0, 'L', 1);
$pdf->CELL(45, 6, 'Rp. ' . rupiah($total), 1, 1, 'L', 1);


$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_kas.pdf', 'I');
