<?php
class Model_retur_pembelian extends CI_model
{
    protected $table = 'retur_pembelian';
    protected $primary = 'id_retur_pembelian';

    public function getAllData()
    {
        $query = "SELECT  a.id_retur_pembelian, b.kode_pembelian, a.kode_retur,d.nama_lengkap, c.nama_supplier, 
        SUM(e.jumlah_retur) AS jumlah, SUM(e.total_retur)  AS total, a.tgl_retur FROM retur_pembelian a, rb_pembelian b, rb_supplier c, users d, retur_pembelian_detail e WHERE a.id_pembelian = b.id_pembelian AND b.id_supplier = c.id_supplier AND d.id_users = a.id_user AND e.id_retur_pembelian = a.id_retur_pembelian GROUP BY a.id_retur_pembelian";
        return $this->db->query($query)->result_array();
    }

    public function search_general_pembelian($kode)
    {
        $query = "SELECT a.id_pembelian, a.waktu_beli, b.nama_supplier FROM rb_pembelian a, rb_supplier b WHERE a.id_supplier = b.id_supplier AND a.kode_pembelian = '$kode'";
        return $this->db->query($query)->row_array();
    }

    public function produk_detail_akan_retur_pembelian($kode)
    {
        $query = "SELECT b.id_pembelian_detail, a.id_pembelian, b.jumlah_pesan,(b.harga_pesan * b.jumlah_pesan) AS subtotal, b.satuan, c.nama_produk, b.harga_pesan  FROM rb_pembelian a, rb_pembelian_detail b, rb_produk c 
        WHERE a.id_pembelian = b.id_pembelian AND b.id_produk = c.id_produk AND a.kode_pembelian = '$kode' AND b.retur = 0";
        return $this->db->query($query)->result_array();
    }

    public function select_produk_retur_pembelian($kode)
    {
        $query = "SELECT a.id_pembelian_detail, a.jumlah_pesan, a.harga_pesan, b.nama_produk, b.id_produk
        FROM rb_pembelian_detail a, rb_produk b WHERE a.id_produk = b.id_produk AND a.id_pembelian_detail = '$kode'";
        return $this->db->query($query)->row_array();
    }
    public function load_detail_retur_pembelian()
    {
        $query = "SELECT a.kondisi, a.opsi, a.id_retur_pembelian_detail, a.harga_produk, a.jumlah_retur, a.total_retur, b.nama_produk, b.satuan, c.id_pembelian_detail FROM retur_pembelian_detail a, rb_produk b, rb_pembelian_detail c WHERE a.id_produk = b.id_produk AND a.id_retur_pembelian IS NULL AND c.id_produk = b.id_produk ORDER BY a.id_retur_pembelian_detail DESC";
        return $this->db->query($query)->result_array();
    }
    public function detail_retur_pembelian($id)
    {
        $query = "SELECT a.kondisi, a.opsi, a.id_retur_pembelian_detail, a.harga_produk, a.jumlah_retur, a.total_retur, b.nama_produk, b.satuan, c.id_pembelian_detail FROM retur_pembelian_detail a, rb_produk b, rb_pembelian_detail c, retur_pembelian d WHERE a.id_produk = b.id_produk AND d.id_retur_pembelian = '$id' AND c.id_produk = b.id_produk AND a.id_retur_pembelian = d.id_retur_pembelian ORDER BY a.id_retur_pembelian_detail DESC";
        return $this->db->query($query)->result_array();
    }

    public function tambah_detail_retur_pembelian()
    {
        $jumlah_retur = $this->input->post('qty-retur');
        $id_detail_beli = $this->input->post('id-detail-beli');
        $harga_produk = $this->input->post('harga-beli');
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
        $this->db->insert('retur_pembelian_detail', $retur);

        $harga_produk = $this->db->get_where('rb_produk', ['id_produk' => $id_produk])->row_array();
        $detail_beli =  $this->db->get_where('rb_pembelian_detail', ['id_pembelian_detail' => $id_detail_beli])->row_array();

        if ($masuk_ke == 1) {
            $stok_detail_beli = $detail_beli['jumlah_pesan'] - $jumlah_retur;
            $data = [
                'jumlah_pesan'    => $stok_detail_beli,
            ];
            $this->db->set($data)->where('id_pembelian_detail', $id_detail_beli)->update('rb_pembelian_detail');
        } else if ($masuk_ke == 2) {

            $stok_detail_beli = $detail_beli['jumlah_pesan'] - $jumlah_retur;
            $data = [
                'jumlah_pesan'    => $stok_detail_beli,
            ];
            $this->db->set($data)->where('id_pembelian_detail', $id_detail_beli)->update('rb_pembelian_detail');
            $stok_brg = $harga_produk['stok'] - $jumlah_retur;
            $this->db->set('stok', $stok_brg)->where('id_produk', $id_produk)->update('rb_produk');
        }

        if ($jumlah_retur == $detail_beli['jumlah_pesan']) {
            $this->db->set(array('retur' => 1))->where('id_pembelian_detail', $id_detail_beli)->update('rb_pembelian_detail');
        }
    }

    public function delete_produk_retur_pembelian($id_retur, $id_pembelian_detail)
    {
        $retur_detail = $this->db->get_where('retur_pembelian_detail', ['id_retur_pembelian_detail' => $id_retur])->row_array();
        $pembelian_detail = $this->db->get_where('rb_pembelian_detail', ['id_pembelian_detail' => $id_pembelian_detail])->row_array();
        $produk = $this->db->get_where('rb_produk', ['id_produk' => $pembelian_detail['id_produk']])->row_array();
        if ($pembelian_detail['jumlah_pesan'] == 0) {
            $data = array(
                'jumlah_pesan'  => $retur_detail['jumlah_retur'] + $pembelian_detail['jumlah_pesan'],
                'retur'         => 0

            );
        } else {
            $data = array(
                'jumlah_pesan'   => $retur_detail['jumlah_retur'] + $pembelian_detail['jumlah_pesan'],
            );
        }

        if ($retur_detail['opsi'] == 2) {
            $stok = $produk['stok'] + $retur_detail['jumlah_retur'];
            $this->db->set(array('stok' => $stok))->where('id_produk', $pembelian_detail['id_produk'])->update('rb_produk');
        }
        $this->db->set($data)->where('id_pembelian_detail', $id_pembelian_detail)->update('rb_pembelian_detail');
        $this->db->where('id_retur_pembelian_detail', $id_retur)->delete('retur_pembelian_detail');
    }

    public function simpan_retur_pembelian($id)
    {
        $user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
        $kode = date('YmdHis');
        $data = [
            'kode_retur'    => 'RTRB-' . $kode,
            'id_pembelian'  => $id,
            'tgl_retur'     => date('Y-m-d H:i:s'),
            'id_user'       => $user['id_users']
        ];
        $this->db->insert('retur_pembelian', $data);
        $id = implode($this->db->query('select max(id_retur_pembelian) as id_retur_pembelian from retur_pembelian')->row_array());
        $this->db->query("UPDATE retur_pembelian_detail SET id_retur_pembelian = '$id' WHERE id_retur_pembelian IS NULL");
        $retur = $this->db->query("SELECT SUM(total_retur) AS retur FROM retur_pembelian_detail WHERE id_retur_pembelian = '$id'")->row_array();

        $kas = array(
            'id_user'        => $user['id_users'],
            'nominal'        => $retur['retur'],
            'jenis'          => 'Pemasukan',
            'keterangan'     => 'Retur Pembelian',
            'created_at'     => date('Y-m-d H:i:s')
        );
        return $this->db->insert('kas', $kas);
    }
}
