<?php
class Model_retur_penjualan extends CI_model
{
    protected $table = 'retur_penjualan';
    protected $primary = 'id_retur_penjualan';

    public function getAllData()
    {
        $query = "SELECT a.id_penjualan, a.kode_transaksi, a.bayar, c.nama_lengkap, d.nama_lengkap AS customer, a.diskon, a.method, SUM(b.jumlah) AS qty, SUM(b.subtotal) AS total, a.waktu_transaksi FROM rb_penjualan a, rb_penjualan_detail b, users c, rb_konsumen d WHERE a.id_pembeli = d.id_konsumen AND c.id_users = a.id_user AND a.id_penjualan = b.id_penjualan AND a.online_order = 'N' AND a.proses = 3 GROUP BY a.id_penjualan";
        return $this->db->query($query)->result_array();
    }

    public function search_general_penjualan($kode)
    {
        $query = "SELECT a.id_penjualan, a.waktu_transaksi, b.nama_lengkap FROM rb_penjualan a, rb_konsumen b WHERE a.id_pembeli = b.id_konsumen AND a.kode_transaksi = '$kode'";
        return $this->db->query($query)->row_array();
    }

    public function produk_detail_akan_retur($kode)
    {
        $query = "SELECT b.id_penjualan_detail, a.id_penjualan, b.jumlah, b.subtotal, b.satuan, b.diskon, c.nama_produk, b.harga_jual FROM rb_penjualan a, rb_penjualan_detail b, rb_produk c WHERE a.id_penjualan = b.id_penjualan AND b.id_produk = c.id_produk AND a.kode_transaksi = '$kode'";
        return $this->db->query($query)->result_array();
    }

    public function select_produk_retur($kode)
    {
        $query = "SELECT a.id_penjualan_detail, a.jumlah, a.harga_jual, b.nama_produk, b.id_produk
        FROM rb_penjualan_detail a, rb_produk b WHERE a.id_produk = b.id_produk AND a.id_penjualan_detail = '$kode'";
        return $this->db->query($query)->row_array();
    }
    public function load_detail_retur()
    {
        $query = "SELECT a.kondisi, a.opsi, a.id_retur_penjualan_detail, a.harga_produk, a.jumlah_retur, a.total_retur, b.nama_produk, b.satuan FROM retur_penjualan_detail a, rb_produk b WHERE a.id_produk = b.id_produk AND a.id_retur_penjualan IS NULL ORDER BY a.id_retur_penjualan_detail DESC";
        return $this->db->query($query)->result_array();
    }

    public function tambah_detail_retur()
    {
        $jumlah_retur = $this->input->post('qty-retur');
        $id_detail_jual = $this->input->post('id-detail-jual');
        $harga_produk = $this->input->post('harga-jual');
        $total_retur = $jumlah_retur * $harga_produk;
        $kondisi = $this->input->post('kondisi');
        $masuk_ke = $this->input->post('masuk-ke');
        $id_produk = $this->input->post('id-produk');

        $retur = [
            'id_produk'     => $id_produk,
            'jumlah_retur'  => $this->input->post('qty-retur'),
            'harga_produk'  => $harga_produk,
            'total_retur'   => $total_retur,
            'kondisi'       => $kondisi,
            'opsi'          => $masuk_ke
        ];
        $this->db->insert('retur_penjualan_detail', $retur);

        $harga_produk = $this->db->get_where('rb_produk', ['id_produk' => $id_produk])->row_array();
        $detail_jual =  $this->db->get_where('rb_penjualan_detail', ['id_penjualan_detail' => $id_detail_jual])->row_array();

        if ($masuk_ke == 1) {
            $stok_detail_jual = $detail_jual['jumlah'] - $jumlah_retur;
            $data = [
                'jumlah'    => $stok_detail_jual,
                'subtotal'  => $detail_jual['harga_jual'] * $stok_detail_jual
            ];
            $this->db->set($data)->where('id_penjualan_detail', $id_detail_jual)->update('rb_penjualan_detail');

            $stok_brg = $jumlah_retur + $harga_produk['stok'];
            $this->db->set('stok', $stok_brg)->where('id_produk', $id_produk)->update('rb_produk');
        } else if ($masuk_ke == 2) {

            $stok_detail_jual = $detail_jual['jumlah'] - $jumlah_retur;
            $data = [
                'jumlah'    => $stok_detail_jual,
                'subtotal'  => $detail_jual['harga_jual'] * $stok_detail_jual
            ];
            $this->db->set($data)->where('id_penjualan_detail', $id_detail_jual)->update('rb_penjualan_detail');
        }
    }
}
