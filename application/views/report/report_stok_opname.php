<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN STOK OPNAME', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
$sql = "SELECT a.id_stok_opname, b.nama_produk, a.stok, a.stok_nyata, a.selisih, a.keterangan, 
 a.nilai FROM stok_opname a, rb_produk b WHERE a.id_produk = b.id_produk AND SUBSTRING(a.created_at, 1, 10) BETWEEN '$awal' AND '$akhir'";
$result = $this->db->query($sql)->result();

$yi = 50;
$ya = 50;
$pdf->setFont('Arial', '', 9);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
$pdf->CELL(75, 6, 'NAMA ITEM', 1, 0, 'C', 1);
$pdf->CELL(25, 6, 'STOK', 1, 0, 'C', 1);
$pdf->CELL(25, 6, 'STOK NYATA', 1, 0, 'C', 1);
$pdf->CELL(25, 6, 'SELISIH', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'NILAI', 1, 0, 'C', 1);
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
    $pdf->cell(75, 6, $data->nama_produk, 1, 0, 'L', 1);
    $pdf->cell(25, 6, $data->stok, 1, 0, 'L', 1);
    $pdf->CELL(25, 6, $data->stok_nyata, 1, 0, 'L', 1);
    $pdf->CELL(25, 6, $data->selisih, 1, 0, 'L', 1);
    $pdf->CELL(35, 6, 'Rp. ' . rupiah($data->nilai), 1, 0, 'L', 1);
    $pdf->CELL(85, 6, $data->keterangan, 1, 0, 'L', 1);
    $ya = $ya + $row;
    $no++;
    $i++;
}



$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_stok_opname.pdf', 'I');
