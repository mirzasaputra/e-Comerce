<?php
class Model_penjualan extends CI_model
{


    public function getAllData()
    {
        $query = "SELECT a.id_penjualan, a.kode_transaksi, c.nama_lengkap, d.nama_lengkap AS customer, a.diskon, a.method, SUM(b.jumlah) AS qty, SUM(b.subtotal) AS total, a.waktu_transaksi FROM rb_penjualan a, rb_penjualan_detail b, users c, rb_konsumen d WHERE a.id_pembeli = d.id_konsumen AND c.id_users = a.id_user AND a.id_penjualan = b.id_penjualan AND a.online_order = 'N' AND a.proses = 3";
        return $this->db->query($query)->result_array();
    }
}
