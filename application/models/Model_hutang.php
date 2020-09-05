<?php
class Model_hutang extends CI_model
{
    protected $table = "hutang";
    protected $primary = "id_hutang";


    public function getAllData()
    {
        $query  = "SELECT a.id_hutang, b.kode_pembelian, c.nama_supplier, a.tgl_hutang, a.jml_hutang, a.jatuh_tempo, a.bayar, a.sisa, a.status FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier ORDER BY a.id_hutang DESC";
        return $this->db->query($query)->result_array();
    }

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

    public function detailPembayaran($id)
    {
        $query  = "SELECT b.id_detil_hutang, c.nama_lengkap, b.nominal, b.tgl_bayar FROM hutang a, detil_hutang b, users c WHERE a.id_hutang = b.id_hutang AND c.id_users = b.id_user AND a.id_hutang = '$id' ORDER BY b.id_detil_hutang DESC";
        return $this->db->query($query)->result_array();
    }

    public function detailHutang($id)
    {
        $query  = "SELECT a.id_hutang, b.kode_pembelian, c.nama_supplier, a.tgl_hutang, a.jml_hutang, a.jatuh_tempo, a.bayar, a.sisa, a.status FROM hutang a, rb_pembelian b, rb_supplier c WHERE a.id_beli = b.id_pembelian AND c.id_supplier = b.id_supplier AND a.id_hutang = '$id'";
        return $this->db->query($query)->row_array();
    }

    public function addPayment()
    {
        $id = $this->input->post('id_hutang');
        $user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
        $nominal = $this->input->post('nominal');
        $data = array(
            'id_user'     => $user['id_users'],
            'id_hutang'   => $id,
            'nominal'     => $nominal,
            'tgl_bayar'   => date('Y-m-d H:i:s'),
        );
        $this->db->insert('detil_hutang', $data);

        $get_bayar = "SELECT SUM(nominal) AS nominal FROM detil_hutang WHERE id_hutang = '$id'";
        $get_jml_hutang = "SELECT jml_hutang FROM hutang WHERE id_hutang = '$id'";
        $bayar = implode($this->db->query($get_bayar)->row_array());
        $jml = implode($this->db->query($get_jml_hutang)->row_array());
        $sisa = $jml - $bayar;
        $update = array(
            'bayar' => $bayar,
            'sisa'  => $sisa
        );
        $this->db->set($update)->where($this->primary, $id)->update($this->table);

        if ($sisa == 0) {
            $status = array(
                'status'  => 'Lunas'
            );
            $this->db->set($status)->where($this->primary, $id)->update($this->table);
        }

        $kas = array(
            'id_user'    => $user['id_users'],
            'nominal'    => $nominal,
            'jenis'      => 'Pengeluaran',
            'keterangan' => 'Pembayaran Hutang',
            'created_at' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('kas', $kas);
    }

    public function deleteDetailPembayaran($id)
    {
        $user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
        $detail = $this->db->get_where('detil_hutang', ['id_detil_hutang' => $id])->row_array();
        $hutang = $this->db->get_where($this->table, [$this->primary => $detail['id_hutang']])->row_array();

        $bayar = $hutang['bayar'] - $detail['nominal'];
        $sisa = $hutang['sisa'] + $detail['nominal'];

        $update = array(
            'bayar' => $bayar,
            'sisa'  => $sisa
        );
        $this->db->set($update)->where($this->primary, $detail['id_hutang'])->update($this->table);
        $this->db->where('id_detil_hutang', $id)->delete('detil_hutang');


        $kas = array(
            'id_user'    => $user['id_users'],
            'nominal'    => $detail['nominal'],
            'jenis'      => 'Pemasukan',
            'keterangan' => 'Pembayaran Hutang Telah Dihapus',
            'created_at' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('kas', $kas);
    }

    public function getDetail($id)
    {
        $sql = "SELECT b.id_detil_hutang, c.nama_lengkap, b.nominal, b.tgl_bayar FROM hutang a, detil_hutang b, users c WHERE a.id_hutang = b.id_hutang AND c.id_users = b.id_user AND a.id_hutang = '$id' ORDER BY b.id_detil_hutang DESC";
        return $this->db->query($sql)->result_array();
    }
}
