<?php
class Model_stok_opname extends CI_model
{
    protected $table = "stok_opname";
    protected $primary = "id_stok_opname";

    public function getAllData()
    {
        $query = "SELECT a.id_stok_opname, a.created_at, a.keterangan, a.selisih, a.nilai, a.stok, a.stok_nyata, b.nama_produk FROM stok_opname a, rb_produk b WHERE a.id_produk = b.id_produk ORDER BY a.id_stok_opname DESC";
        return $this->db->query($query)->result_array();
    }

    public function Save()
    {
        $stok = $this->input->post('stok');
        $stokNyata = $this->input->post('stok_nyata');
        $harga = $this->input->post('harga');
        $selisih = $stokNyata - $stok;
        $data = array(
            'id_produk'    => htmlspecialchars($this->input->post('produk'), true),
            'stok'         => $stok,
            'stok_nyata'   => $stokNyata,
            'selisih'      => $selisih,
            'nilai'        => $selisih * $harga,
            'keterangan'   => htmlspecialchars($this->input->post('ket'), true),
            'created_at'   => date('Y-m-d H:i:s'),
        );
        return $this->db->insert($this->table, $data);
    }

    public function Edit($id)
    {
        $stok = $this->input->post('stok');
        $stokNyata = $this->input->post('stok_nyata');
        $harga = $this->input->post('harga');
        $selisih = $stokNyata - $stok;
        $data = array(
            'id_produk'    => htmlspecialchars($this->input->post('produk'), true),
            'stok'         => $stok,
            'stok_nyata'   => $stokNyata,
            'selisih'      => $selisih,
            'nilai'        => $selisih * $harga,
            'keterangan'   => htmlspecialchars($this->input->post('ket'), true),
            'created_at'   => date('Y-m-d H:i:s'),
        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->table);
    }

    public function Detail($id)
    {
        $query = "SELECT a.id_stok_opname, a.created_at, a.keterangan, a.selisih, a.nilai, a.stok, a.stok_nyata, b.nama_produk, b.harga_beli, a.id_produk FROM stok_opname a, rb_produk b WHERE a.id_produk = b.id_produk AND a.id_stok_opname = '$id' ORDER BY a.id_stok_opname DESC";
        return $this->db->query($query)->row_array();
    }
}
