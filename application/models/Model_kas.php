<?php
class Model_kas extends CI_model
{
    protected $table = "kas";
    protected $primary = "id_kas";

    public function getAllKas()
    {
        $query = "SELECT b.id_kas, b.nominal, b.created_at, b.jenis, b.keterangan, a.nama_lengkap FROM users a, kas b
        WHERE a.id_users = b.id_user ORDER BY b.id_kas DESC";
        return $this->db->query($query)->result_array();
    }

    public function addKas()
    {
        $users = $this->model_users->users_edit($this->session->username)->row_array();
        $data = array(
            'id_user'        => $users['id_users'],
            'nominal'        => htmlspecialchars($this->input->post('nominal'), true),
            'jenis'          => htmlspecialchars($this->input->post('jenis'), true),
            'keterangan'     => htmlspecialchars($this->input->post('keterangan'), true),
            'created_at'     => date('Y-m-d H:i:s')
        );
        return $this->db->insert($this->table, $data);
    }

    public function getTotalKas()
    {
        $pemasukan = $this->db->query("SELECT SUM(nominal) AS nominal FROM kas WHERE jenis='Pemasukan'")->row_array();
        $pengeluaran = $this->db->query("SELECT SUM(nominal) AS nominal FROM kas WHERE jenis='Pengeluaran'")->row_array();
        $hasil = $pemasukan['nominal'] - $pengeluaran['nominal'];
        return $hasil;
    }

    public function editKas()
    {
        $id = $this->input->post('id_kas');
        $data = array(
            'nominal'        => htmlspecialchars($this->input->post('nominal'), true),
            'jenis'          => htmlspecialchars($this->input->post('jenis'), true),
            'keterangan'     => htmlspecialchars($this->input->post('keterangan'), true),
        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->table);
    }
}
