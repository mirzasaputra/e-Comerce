<?php
class Model_produk_image extends CI_model
{
    public function getDataById($id)
    {
        return $this->db->get_where('produk_image', ['id_produk' => $id])->result_array();
    }

    public function delete($id)
    {
        $image_detail =  $this->db->get_where('produk_image', ['id_produk_image' => $id])->row_array();

        if (file_exists($loc = FCPATH . 'asset/foto_produk/' . $image_detail['gambar'])) {
            unlink($loc);
        }
        $this->db->where('id_produk_image', $id)->delete('produk_image');
    }
}
