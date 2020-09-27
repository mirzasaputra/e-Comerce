<?php
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->setMargins(6, 10, 20);
// $pdf->SetAutoPageBreak(true,30);
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 18);
// $pdf->Image('./assets/img/profil/' . $profil['LOGO'], 7, 5, 12, 10);
$pdf->Cell(25);
$pdf->Cell(0, -6, '', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(70, 6, $profil['nama_website'], 0, 1, 'C');
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(70, 2, $profil['alamat'], 0, 1, 'C');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 6, $profil['no_telp'], 0, 1, 'C');

$max_id = "SELECT MAX(id_penjualan) AS id_penjualan FROM rb_penjualan";
$id = implode($this->db->query($max_id)->row_array());

if ($id_resi == null) {
    $sql_general = "SELECT a.kode_transaksi, a.bayar, a.kembali, a.waktu_transaksi, b.username, b.id_users, a.method FROM rb_penjualan a, users b WHERE a.id_user = b.id_users AND a.id_penjualan = '$id'";
    $sql_detail = "SELECT b.nama_alias, a.jumlah, a.diskon, a.subtotal FROM rb_penjualan_detail a,  rb_produk b
    WHERE a.id_produk = b.id_produk AND a.id_penjualan = '$id'";
    $sql_total = "SELECT SUM(subtotal) AS total, SUM(diskon) AS diskon FROM rb_penjualan_detail WHERE id_penjualan = '$id'";
} else {
    $sql_general = "SELECT a.kode_transaksi, a.bayar, a.kembali, a.waktu_transaksi, b.username, b.id_users, a.method FROM rb_penjualan a, users b WHERE a.id_user = b.id_users AND a.id_penjualan = '$id_resi'";
    $sql_detail = "SELECT b.nama_alias, a.jumlah, a.diskon, a.subtotal FROM rb_penjualan_detail a,  rb_produk b
    WHERE a.id_produk = b.id_produk AND a.id_penjualan = '$id_resi'";
    $sql_total = "SELECT SUM(subtotal) AS total, SUM(diskon) AS diskon FROM rb_penjualan_detail WHERE id_penjualan = '$id_resi'";
}
$general = $this->db->query($sql_general)->row_array();
$detail = $this->db->query($sql_detail)->result_array();
$total = $this->db->query($sql_total)->row_array();

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(70, 6, '-----------------------------------------------------------------------------', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(56, 5, 'NO : ' . $general['kode_transaksi'], 0, 0, 'L');
$pdf->Cell(32, 5, $general['method'], 0, 1, 'L');
$pdf->Cell(32, 2, $general['waktu_transaksi'], 0, 0, 'L');
$pdf->Cell(35, 2, $general['username'] . $general['id_users'], 0, 1, 'R');
$pdf->Cell(70, 6, '-----------------------------------------------------------------------------', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 8);
foreach ($detail as $d) {
    $pdf->Cell(49, 2, $d['nama_alias'], 0, 0, 'L');
    $pdf->Cell(4, 2, 'x' . $d['jumlah'], 0, 0, 'L');
    $pdf->Cell(20, 2, rupiah($d['subtotal']), 0, 1, 'R');
    $pdf->Cell(60, 5, 'Diskon:', 0, 0, 'R');
    $pdf->Cell(4, 5, rupiah($d['diskon']), 0, 1, 'L');
}


$pdf->Cell(73, 6, '----------------------------------------', 0, 1, 'R');
$pdf->Cell(54, 3, 'GRAND TOTAL', 0, 0, 'R');
$pdf->Cell(3, 3, ':', 0, 0, 'R');
$pdf->Cell(20, 3, 'Rp. ' . number_format($total['total'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'DISKON', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($total['diskon'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'TOTAL', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($total['total'] + $general['ppn'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'TUNAI', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($general['bayar'], '0', '.', '.'), 0, 1, 'L');
$pdf->Cell(54, 5, 'KEMBALI', 0, 0, 'R');
$pdf->Cell(3, 5, ':', 0, 0, 'R');
$pdf->Cell(20, 5, 'Rp. ' . number_format($general['kembali'], '0', '.', '.'), 0, 1, 'L');

$pdf->Cell(73, 8, '', 0, 1, 'R');
$pdf->Cell(73, 4, '', 0, 1, 'C');
$pdf->Cell(73, 4, '=== TERIMA KASIH SUDAH BERBELANJA ===', 0, 1, 'C');
$pdf->Cell(73, 4, ' BARANG YANG SUDAH DIBELI TIDAK BOLEH DIKEMBALIKAN', 0, 1, 'C');

$pdf->Output($general['kode_transaksi'] . '.pdf', 'I');
