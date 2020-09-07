<?php
class Model_piutang extends CI_model
{
    protected $table = "piutang";
    protected $primary = "id_piutang";


    public function getAllData()
    {
        $query  = "SELECT a.id_piutang, b.kode_transaksi, c.nama_lengkap, a.tgl_piutang, a.jml_piutang, a.jatuh_tempo, a.bayar, a.sisa, a.status FROM piutang a, rb_penjualan b, rb_konsumen c WHERE a.id_jual = b.id_penjualan AND c.id_konsumen = b.id_pembeli ORDER BY a.id_piutang DESC";
        return $this->db->query($query)->result_array();
    }

    public function detailPembayaran($id)
    {
        $query  = "SELECT b.id_detil_piutang, c.nama_lengkap, b.nominal, b.tgl_bayar FROM piutang a, detil_piutang b, users c WHERE a.id_piutang = b.id_piutang AND c.id_users = b.id_user AND a.id_piutang = '$id' ORDER BY b.id_detil_piutang DESC";
        return $this->db->query($query)->result_array();
    }

    public function detailHutang($id)
    {
        $query  = "SELECT a.id_piutang, b.kode_transaksi, c.nama_lengkap, a.tgl_piutang, a.jml_piutang, a.jatuh_tempo, a.bayar, a.sisa, a.status FROM piutang a, rb_penjualan b, rb_konsumen c WHERE a.id_jual = b.id_penjualan AND c.id_konsumen = b.id_pembeli AND a.id_piutang = '$id'";
        return $this->db->query($query)->row_array();
    }

    public function addPayment()
    {
        $id = $this->input->post('id_piutang');
        $user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
        $nominal = $this->input->post('nominal');
        $data = array(
            'id_user'     => $user['id_users'],
            'id_piutang'  => $id,
            'nominal'     => $nominal,
            'tgl_bayar'   => date('Y-m-d H:i:s'),
        );
        $this->db->insert('detil_piutang', $data);

        $bayar = implode($this->db->query("SELECT SUM(nominal) AS nominal FROM detil_piutang WHERE id_piutang = '$id'")->row_array());
        $jml = implode($this->db->query("SELECT jml_piutang FROM piutang WHERE id_piutang = '$id'")->row_array());
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
            'jenis'      => 'Pemasukan',
            'keterangan' => 'Pembayaran Piutang',
            'created_at' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('kas', $kas);
    }

    public function deleteDetailPembayaran($id)
    {
        $user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
        $detail = $this->db->get_where('detil_piutang', ['id_detil_piutang' => $id])->row_array();
        $hutang = $this->db->get_where($this->table, [$this->primary => $detail['id_piutang']])->row_array();

        $bayar = $hutang['bayar'] - $detail['nominal'];
        $sisa = $hutang['sisa'] + $detail['nominal'];

        $update = array(
            'bayar' => $bayar,
            'sisa'  => $sisa
        );
        $this->db->set($update)->where($this->primary, $detail['id_piutang'])->update($this->table);
        $this->db->where('id_detil_piutang', $id)->delete('detil_piutang');


        $kas = array(
            'id_user'    => $user['id_users'],
            'nominal'    => $detail['nominal'],
            'jenis'      => 'Pengeluaran',
            'keterangan' => 'Pembayaran Piutang Telah Dihapus',
            'created_at' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('kas', $kas);
    }

    public function getDetail($id)
    {
        $sql = "SELECT b.id_detil_piutang, c.nama_lengkap, b.nominal, b.tgl_bayar FROM piutang a, detil_piutang b, users c WHERE a.id_piutang = b.id_piutang AND c.id_users = b.id_user AND a.id_piutang = '$id' ORDER BY b.id_detil_piutang DESC";
        return $this->db->query($sql)->result_array();
    }
}
