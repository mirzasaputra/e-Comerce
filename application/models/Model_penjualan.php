<?php
class Model_penjualan extends CI_model
{


    public function getAllData()
    {
        $query = "SELECT a.id_penjualan, a.kode_transaksi, c.nama_lengkap, d.nama_lengkap AS customer, a.diskon, a.method, SUM(b.jumlah) AS qty, SUM(b.subtotal) AS total, a.waktu_transaksi FROM rb_penjualan a, rb_penjualan_detail b, users c, rb_konsumen d WHERE a.id_pembeli = d.id_konsumen AND c.id_users = a.id_user AND a.id_penjualan = b.id_penjualan AND a.online_order = 'N' AND a.proses = 3 GROUP BY a.id_penjualan";
        return $this->db->query($query)->result_array();
    }


    public function addItemJual()
    {
        $id_produk = $this->input->post('produk');
        $jumlah = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $subtotal = $jumlah * $harga;
        $data = array(
            'id_produk'     => $id_produk,
            'jumlah'        => $jumlah,
            'harga_jual'    => $harga,
            'satuan'        => $this->input->post('satuan'),
            'subtotal'      => $subtotal,
            'diskon'        => 0

        );
        $this->db->insert('rb_penjualan_detail', $data);
        $sqlstok = "select stok from rb_produk where id_produk = '$id_produk'";
        $stok = implode($this->db->query($sqlstok)->row_array());
        $hasil = $stok - $jumlah;
        $update = "update rb_produk set stok = '$hasil' where id_produk = '$id_produk'";
        $this->db->query($update);

        $sql = "SELECT sum(subtotal) as subtotal FROM rb_penjualan_detail WHERE id_penjualan IS NULL";
        $data = $this->db->query($sql)->row_array();
        echo json_encode($data);
    }

    public function loadItemJual()
    {
        $query = "SELECT a.id_penjualan_detail, b.nama_produk, a.jumlah, a.diskon, a.subtotal, a.harga_jual
        FROM rb_penjualan_detail a, rb_produk b WHERE a.id_produk = b.id_produk AND a.id_penjualan IS NULL";
        $data = $this->db->query($query)->result_array();
        echo json_encode($data);
    }

    public function deleteItemJual($id)
    {
        $getDetil = $this->db->get_where('rb_penjualan_detail', ['id_penjualan_detail' => $id])->row_array();
        $qty = $getDetil['jumlah'];
        $idBrg = $getDetil['id_produk'];

        if ($idBrg != NULL) {

            $getBrg = $this->db->get_where('rb_produk', ['id_produk' => $idBrg])->row_array();
            $stokBrg = $getBrg['stok'];
            $stok = $qty + $stokBrg;
            $updateStok = $this->db->set(array('stok' => $stok))->where('id_produk', $idBrg)->update('rb_produk');
        }
        $sql = "delete from rb_penjualan_detail where id_penjualan_detail = '$id'";
        $this->db->query($sql);

        $subtotal = "SELECT sum(subtotal) as subtotal FROM rb_penjualan_detail WHERE id_penjualan IS NULL";
        $data = $this->db->query($subtotal)->row_array();
        echo json_encode($data);
    }

    public function detailItemJual($id)
    {
        $query = "SELECT a.id_penjualan_detail, b.id_produk, b.nama_produk, a.harga_jual, a.jumlah, a.diskon, 
        a.subtotal FROM rb_penjualan_detail a, rb_produk b WHERE b.id_produk = a.id_produk AND a.id_penjualan_detail = '$id'";
        $data = $this->db->query($query)->row_array();
        echo json_encode($data);
    }


    public function editDetailPenjualan()
    {
        $id = $this->input->post('iddetiljual');
        $id_produk = $this->input->post('iddetilbarang');
        $jumlah_lama = $this->input->post('hideqty');
        $jumlah_baru = $this->input->post('detilqty');
        $stok = $jumlah_lama - $jumlah_baru;

        $brg = $this->db->get_where('rb_produk', ['id_produk' => $id_produk])->row_array();
        if ($stok < 0) {
            $qty = abs($stok);
            $stokBrg = $brg['stok'] - $qty;
        } else {

            $stokBrg = $brg['stok'] + $stok;
        }
        $this->db->set(array('stok' => $stokBrg))->where('id_produk', $id_produk)->update('rb_produk');

        $data = array(
            'jumlah'     => $this->input->post('detilqty'),
            'subtotal'   => $this->input->post('detiltotalitem'),
            'diskon'     => $this->input->post('detildiskonitem'),
        );
        $this->db->set($data)->where('id_penjualan_detail', $id)->update('rb_penjualan_detail');

        $subtotal = "SELECT sum(subtotal) as subtotal FROM rb_penjualan_detail WHERE id_penjualan IS NULL";
        $data = $this->db->query($subtotal)->row_array();
        echo json_encode($data);
    }
}
