<?php
class Model_stok extends CI_model
{
    protected $table = "stok";
    protected $primary = "id_stok";

    public function getAllStok()
    {
        $query = "SELECT a.id_stok, a.jenis, a.jml, a.created_at, a.nilai, a.keterangan, b.nama_produk, b.satuan
        FROM stok a, rb_produk b WHERE a.id_produk = b.id_produk ORDER BY a.id_stok DESC";
        return $this->db->query($query)->result_array();
    }

    public function addStok()
    {
        $harga = $this->input->post('harga');
        $jml = $this->input->post('jml');
        $jenis = $this->input->post('jenis');
        $nilai = $jml * $harga;
        $id = $this->input->post('produk');
        $data = array(
            'id_produk'       => htmlspecialchars($id, true),
            'jml'             => htmlspecialchars($jml, true),
            'nilai'           => $nilai,
            'jenis'           => $jenis,
            'keterangan'      => htmlspecialchars($this->input->post('ket'), true),
            'created_at'      => date('Y-m-d H:i:s'),
        );
        $this->db->insert($this->table, $data);
        $sqlstok = "select stok from rb_produk where id_produk = '$id'";
        $stok = implode($this->db->query($sqlstok)->row_array());
        if ($jenis == "Stok Masuk") {

            $hasil = $stok + $jml;
        } else {

            $hasil = $stok - $jml;
        }
        $update = "update rb_produk set stok = '$hasil' where id_produk = '$id'";
        $this->db->query($update);
    }


    public function Delete($id)
    {
        $getDetil = $this->db->get_where('stok', ['id_stok' => $id])->row_array();
        $qty = $getDetil['jml'];
        $idBrg = $getDetil['id_produk'];
        $jenis = $getDetil['jenis'];
        $getBrg = $this->db->get_where('rb_produk', ['id_produk' => $idBrg])->row_array();
        $stokBrg = $getBrg['stok'];
        if ($jenis == "Stok Masuk") {

            $hasil = $stokBrg - $qty;
        } else {

            $hasil = $stokBrg + $qty;
        }

        $updateStok = $this->db->set(array('stok' => $hasil))->where('id_produk', $idBrg)->update('rb_produk');

        $sql = "delete from stok where id_stok = '$id'";
        $this->db->query($sql);
    }
}
