<?php
include 'report_header.php';
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 8, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'LAPORAN DATA HUTANG', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Periode :' . $awal . ' s/d ' . $akhir, 0, 1, 'C');
if ($supplier == "all") {
    $sql = "SELECT a.id_hutang, b.kode_pembelian, c.nama_supplier, SUBSTRING(a.tgl_hutang, 1, 10) AS tanggal, a.jml_hutang, a.bayar, a.sisa, a.status, a.jatuh_tempo FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' ORDER BY SUBSTRING(a.tgl_hutang, 1, 10) ASC";
    $result = $this->db->query($sql)->result();
} else {
    $sql = "SELECT a.id_hutang, b.kode_pembelian, c.nama_supplier, SUBSTRING(a.tgl_hutang, 1, 10) AS tanggal, a.jml_hutang, a.bayar, a.sisa, a.status, a.jatuh_tempo FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_supplier = '$supplier' ORDER BY SUBSTRING(a.tgl_hutang, 1, 10) ASC";
    $result = $this->db->query($sql)->result();
}


$yi = 50;
$ya = 50;
$pdf->setFont('Arial', '', 9);
$pdf->setFillColor(222, 222, 222);
$pdf->setXY(10, $ya);
$pdf->CELL(7, 6, 'NO', 1, 0, 'C', 1);
$pdf->CELL(35, 6, 'KODE TRX', 1, 0, 'C', 1);
$pdf->CELL(55, 6, 'SUPPLIER', 1, 0, 'C', 1);
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
    $pdf->cell(35, 6, $data->kode_pembelian, 1, 0, 'L', 1);
    $pdf->cell(55, 6, $data->nama_supplier, 1, 0, 'L', 1);
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

if ($supplier == "all") {

    $query_total = "SELECT SUM(a.jml_hutang) AS total FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $query_lunas = "SELECT SUM(a.jml_hutang) AS total FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND a.status = 'Lunas'";
    $query_sisa = "SELECT SUM(a.sisa) AS sisa FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
    $query_bayar = "SELECT SUM(a.bayar) AS bayar FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir'";
} else {
    $query_total = "SELECT SUM(a.jml_hutang) AS total FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_supplier = '$supplier'";
    $query_lunas = "SELECT SUM(a.jml_hutang) AS total FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND a.status = 'Lunas' AND c.id_supplier = '$supplier'";
    $query_sisa = "SELECT SUM(a.sisa) AS sisa FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_supplier = '$supplier'";
    $query_bayar = "SELECT SUM(a.bayar) AS bayar FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND SUBSTRING(a.tgl_hutang, 1, 10) BETWEEN '$awal' AND '$akhir' AND c.id_supplier = '$supplier'";
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
$pdf->Output('laporan_hutang.pdf', 'I');
