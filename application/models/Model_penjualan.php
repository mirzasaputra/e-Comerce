<?php
class Model_penjualan extends CI_model
{


    public function getAllData()
    {
        $query = "SELECT a.id_penjualan, a.kode_transaksi, a.bayar, c.nama_lengkap, d.nama_lengkap AS customer, a.diskon, a.method, SUM(b.jumlah) AS qty, SUM(b.subtotal) AS total, a.waktu_transaksi FROM rb_penjualan a, rb_penjualan_detail b, users c, rb_konsumen d WHERE a.id_pembeli = d.id_konsumen AND c.id_users = a.id_user AND a.id_penjualan = b.id_penjualan AND a.online_order = 'N' AND a.proses = 3 GROUP BY a.id_penjualan";
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
            'diskon'        => 0,
            'retur'         => 0

        );
        $this->db->insert('rb_penjualan_detail', $data);
        $sqlstok = "select stok from rb_produk where id_produk = '$id_produk'";
        $stok = implode($this->db->query($sqlstok)->row_array());
        $hasil = $stok - $jumlah;
        $update = "update rb_produk set stok = '$hasil' where id_produk = '$id_produk'";
        $this->db->query($update);

        $sql = "SELECT (SUM(subtotal) + SUM(diskon)) AS subtotal, SUM(diskon) AS diskon, SUM(subtotal) AS  total FROM rb_penjualan_detail  WHERE id_penjualan IS NULL";
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

        $subtotal = "SELECT (SUM(subtotal) + SUM(diskon)) AS subtotal, SUM(diskon) AS diskon, SUM(subtotal) AS  total FROM rb_penjualan_detail  WHERE id_penjualan IS NULL";
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

        $subtotal = "SELECT (SUM(subtotal) + SUM(diskon)) AS subtotal, SUM(diskon) AS diskon, SUM(subtotal) AS  total FROM rb_penjualan_detail  WHERE id_penjualan IS NULL";
        $data = $this->db->query($subtotal)->row_array();
        echo json_encode($data);
    }

    public function dataCheckout()
    {
        $query = "SELECT (SUM(subtotal) + SUM(diskon)) AS subtotal, SUM(diskon) AS diskon, SUM(subtotal) AS  total FROM rb_penjualan_detail  WHERE id_penjualan IS NULL";
        $data = $this->db->query($query)->row_array();
        echo json_encode($data);
    }

    public function simpanPenjualan()
    {
        $user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
        $invoice = 'TRX-' . date('YmdHis');
        $kembalian = $this->input->post('kembali');
        $bayar = $this->input->post('bayar');
        $metode = $this->input->post('metode');
        $customer = $this->input->post('idpembeli');
        $umum = $this->db->get_where('rb_konsumen', ['kota_id' => 'Umum'])->row_array();
        if ($customer == '') {
            $id_pembeli = $umum['id_konsumen'];
        } else {
            $id_pembeli = $customer;
        }

        if ($kembalian < 0) {
            $kembalian = 0;
        }

        $data = array(
            'kode_transaksi'      => $invoice,
            'id_pembeli'          => $id_pembeli,
            'diskon'              => $this->input->post('diskon1'),
            'waktu_transaksi'     => date('Y-m-d H:i:s'),
            'proses'              => 3,
            'method'              => $metode,
            'bayar'               => $bayar,
            'kembali'             => $kembalian,
            'id_user'             => $user['id_users'],
            'online_order'        => 'N',

        );
        $this->db->insert('rb_penjualan', $data);
        $nominal = $bayar - $kembalian;
        $kas = array(
            'id_user'        => $user['id_users'],
            'nominal'        => $nominal,
            'jenis'          => 'Pemasukan',
            'keterangan'     => 'Penjualan Point Of Sales (Offline)',
            'created_at'     => date('Y-m-d H:i:s')
        );

        $this->db->insert('kas', $kas);

        $id = implode($this->db->query('select max(id_penjualan) as id_jual from rb_penjualan')->row_array());
        $this->db->query("update rb_penjualan_detail set id_penjualan = '$id' where id_penjualan is null");
        $kembali = $this->input->post('kembali');

        if ($kembali < 0 || $metode == "Kredit") {
            $jml_piutang = abs($kembali);
            $piutang = array(
                'id_jual'        => $id,
                'tgl_piutang'    => date('Y-m-d H:i:s'),
                'jml_piutang'    => $jml_piutang,
                'bayar'          => 0,
                'sisa'           => $jml_piutang,
                'status'         => 'Belum Lunas',
                'jatuh_tempo'    => $this->input->post('tempo')
            );
            $this->db->insert('piutang', $piutang);
        }
    }

    public function detailPenjualan($id)
    {
        $query = "SELECT c.nama_produk, a.harga_jual, a.jumlah, a.diskon, a.subtotal 
        FROM rb_penjualan_detail a, rb_penjualan b, rb_produk c WHERE b.id_penjualan = a.id_penjualan AND c.id_produk = a.id_produk AND  a.id_penjualan = '$id' AND a.retur = 0";
        $data = $this->db->query($query)->result_array();
        echo json_encode($data);
    }
}
