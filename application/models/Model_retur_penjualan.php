<?php
class Model_retur_penjualan extends CI_model
{
    protected $table = 'retur_penjualan';
    protected $primary = 'id_retur_penjualan';

    public function getAllData()
    {
        $query = "SELECT  a.id_retur_penjualan, b.kode_transaksi, a.kode_retur,d.nama_lengkap AS kasir, c.nama_lengkap AS customer, SUM(e.jumlah_retur) AS jumlah, SUM(e.total_retur) AS total, a.tgl_retur
        FROM retur_penjualan a, rb_penjualan b, rb_konsumen c, users d, retur_penjualan_detail e
        WHERE a.id_penjualan = b.id_penjualan AND b.id_pembeli = c.id_konsumen AND d.id_users = a.id_user AND e.id_retur_penjualan = a.id_retur_penjualan GROUP BY a.id_retur_penjualan";
        return $this->db->query($query)->result_array();
    }

    public function search_general_penjualan($kode)
    {
        $query = "SELECT a.id_penjualan, a.waktu_transaksi, b.nama_lengkap FROM rb_penjualan a, rb_konsumen b WHERE a.id_pembeli = b.id_konsumen AND a.kode_transaksi = '$kode'";
        return $this->db->query($query)->row_array();
    }

    public function produk_detail_akan_retur($kode)
    {
        $query = "SELECT b.id_penjualan_detail, a.id_penjualan, b.jumlah, b.subtotal, b.satuan, b.diskon, c.nama_produk, b.harga_jual FROM rb_penjualan a, rb_penjualan_detail b, rb_produk c WHERE a.id_penjualan = b.id_penjualan AND b.id_produk = c.id_produk AND a.kode_transaksi = '$kode' AND b.retur = 0";
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
        $query = "SELECT a.kondisi, a.opsi, a.id_retur_penjualan_detail, a.harga_produk, a.jumlah_retur, a.total_retur, b.nama_produk, b.satuan, c.id_penjualan_detail FROM retur_penjualan_detail a, rb_produk b, rb_penjualan_detail c WHERE a.id_produk = b.id_produk AND a.id_retur_penjualan IS NULL AND c.id_produk = b.id_produk ORDER BY a.id_retur_penjualan_detail DESC";
        return $this->db->query($query)->result_array();
    }
    public function detail_retur_penjualan($id)
    {
        $query = "SELECT a.kondisi, a.opsi, a.id_retur_penjualan_detail, a.harga_produk, a.jumlah_retur, a.total_retur, b.nama_produk, b.satuan, c.id_penjualan_detail FROM retur_penjualan_detail a, rb_produk b, rb_penjualan_detail c, retur_penjualan d WHERE a.id_produk = b.id_produk AND d.id_retur_penjualan = '$id' AND c.id_produk = b.id_produk AND a.id_retur_penjualan = d.id_retur_penjualan ORDER BY a.id_retur_penjualan_detail DESC";
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

        if ($jumlah_retur == $detail_jual['jumlah']) {
            $this->db->set(array('retur' => 1))->where('id_penjualan_detail', $id_detail_jual)->update('rb_penjualan_detail');
        }
    }

    public function delete_produk_retur($id_retur, $id_penjualan_detail)
    {
        $retur_detail = $this->db->get_where('retur_penjualan_detail', ['id_retur_penjualan_detail' => $id_retur])->row_array();
        $penjualan_detail = $this->db->get_where('rb_penjualan_detail', ['id_penjualan_detail' => $id_penjualan_detail])->row_array();
        $produk = $this->db->get_where('rb_produk', ['id_produk' => $penjualan_detail['id_produk']])->row_array();
        if ($penjualan_detail['jumlah'] == 0) {
            $data = array(
                'jumlah'        => $retur_detail['jumlah_retur'] + $penjualan_detail['jumlah'],
                'subtotal'      => $retur_detail['total_retur'] + $penjualan_detail['subtotal'],
                'retur'         => 0

            );
        } else {
            $data = array(
                'jumlah'        => $retur_detail['jumlah_retur'] + $penjualan_detail['jumlah'],
                'subtotal'      => $retur_detail['total_retur'] + $penjualan_detail['subtotal'],

            );
        }

        if ($retur_detail['opsi'] == 1) {
            $stok = $produk['stok'] - $retur_detail['jumlah_retur'];
            $this->db->set(array('stok' => $stok))->where('id_produk', $penjualan_detail['id_produk'])->update('rb_produk');
        }
        $this->db->set($data)->where('id_penjualan_detail', $id_penjualan_detail)->update('rb_penjualan_detail');
        $this->db->where('id_retur_penjualan_detail', $id_retur)->delete('retur_penjualan_detail');
    }

    public function simpan_retur_penjualan($id)
    {
        $user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
        $kode = date('YmdHis');
        $data = [
            'kode_retur'    => 'RTR-' . $kode,
            'id_penjualan'  => $id,
            'tgl_retur'     => date('Y-m-d H:i:s'),
            'id_user'       => $user['id_users']
        ];
        $this->db->insert('retur_penjualan', $data);
        $id = implode($this->db->query('select max(id_retur_penjualan) as id_retur_penjualan from retur_penjualan')->row_array());
        $this->db->query("UPDATE retur_penjualan_detail SET id_retur_penjualan = '$id' WHERE id_retur_penjualan IS NULL");
        $retur = $this->db->query("SELECT SUM(total_retur) AS retur FROM retur_penjualan_detail WHERE id_retur_penjualan = '$id'")->row_array();

        $kas = array(
            'id_user'        => $user['id_users'],
            'nominal'        => $retur['retur'],
            'jenis'          => 'Pengeluaran',
            'keterangan'     => 'Retur Penjualan',
            'created_at'     => date('Y-m-d H:i:s')
        );
        return $this->db->insert('kas', $kas);
    }
}
