<?php
class Model_hutang extends CI_model
{
    protected $table = "hutang";
    protected $primary = "id_hutang";


    public function addHutang($metode, $id)
    {
        $kembali = $this->input->post('kembali');
        if ($kembali < 0 || $metode == "Kredit") {
            $jml_hutang = abs($kembali);
            $hutang = array(
                'id_beli'       => $id,
                'tgl_hutang'    => date('Y-m-d H:i:s'),
                'jml_hutang'    => $jml_hutang,
                'bayar'         => 0,
                'sisa'          => $jml_hutang,
                'status'        => 'Belum Lunas',
                'jatuh_tempo'   => $this->input->post('tempo'),
            );
            $this->db->insert('hutang', $hutang);
        }
    }
}
