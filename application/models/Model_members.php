<?php
class Model_members extends CI_model
{
    function rekening()
    {
        return $this->db->query("SELECT * FROM rb_rekening ORDER BY id_rekening ASC");
    }

    function konsumen()
    {
        return $this->db->query("SELECT * FROM rb_konsumen ORDER BY id_konsumen DESC");
    }

    function keterangan($id)
    {
        return $this->db->query("SELECT * FROM `rb_keterangan` where id_keterangan='$id'");
    }

    function profile_view($id)
    {
        return $this->db->query("SELECT * FROM `rb_konsumen` a where a.id_konsumen='$id'");
    }

    function modupdatefoto()
    {
        $config['upload_path'] = 'asset/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|gif|JPEG|jpeg';
        $config['max_size']     = '1000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $hasil = $this->upload->data();
        
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'asset/foto_user/' . $hasil['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['height']       = 622;
        $this->load->library('image_lib', $config);
        $this->image_lib->crop();

        $datadb = array('foto' => $hasil['file_name']);
        $this->db->where('id_konsumen', $this->session->id_konsumen);
        $this->db->update('rb_konsumen', $datadb);
    }

    function modupdatefotoreseller()
    {
        $config['upload_path'] = 'asset/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|gif|JPEG|jpeg';
        $config['max_size']     = '1000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $hasil = $this->upload->data();

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'asset/foto_user/' . $hasil['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['height']       = 622;
        $this->load->library('image_lib', $config);
        $this->image_lib->crop();

        $datadb = array('foto' => $hasil['file_name']);
        $this->db->where('id_reseller', $this->session->id_reseller);
        $this->db->update('rb_reseller', $datadb);
    }

    function profile_update($id)
    {
        if (trim($this->input->post('a')) != '') {
            $datadbd = array(
                'username' => $this->db->escape_str(strip_tags($this->input->post('aa'))),
                'password' => hash("sha512", md5($this->input->post('a'))),
                'nama_lengkap' => $this->db->escape_str(strip_tags($this->input->post('b'))),
                'email' => $this->db->escape_str(strip_tags($this->input->post('c'))),
                'jenis_kelamin' => $this->db->escape_str($this->input->post('d')),
                'tanggal_lahir' => $this->db->escape_str($this->input->post('e')),
                'tempat_lahir' => $this->db->escape_str(strip_tags($this->input->post('f'))),
                'alamat_lengkap' => $this->db->escape_str(strip_tags($this->input->post('g'))),
                'kota_id' => $this->db->escape_str(strip_tags($this->input->post('j'))),
                'no_hp' => $this->db->escape_str(strip_tags($this->input->post('l'))),
                'tipe' => $this->db->escape_str(strip_tags($this->input->post('tipe')))
            );
        } else {
            $datadbd = array(
                'username' => $this->db->escape_str(strip_tags($this->input->post('aa'))),
                'nama_lengkap' => $this->db->escape_str(strip_tags($this->input->post('b'))),
                'email' => $this->db->escape_str(strip_tags($this->input->post('c'))),
                'jenis_kelamin' => $this->db->escape_str($this->input->post('d')),
                'tanggal_lahir' => $this->db->escape_str($this->input->post('e')),
                'tempat_lahir' => $this->db->escape_str(strip_tags($this->input->post('f'))),
                'alamat_lengkap' => $this->db->escape_str(strip_tags($this->input->post('g'))),
                'kota_id' => $this->db->escape_str(strip_tags($this->input->post('j'))),
                'no_hp' => $this->db->escape_str(strip_tags($this->input->post('l'))),
                'tipe' => $this->db->escape_str(strip_tags($this->input->post('tipe')))
            );
        }
        $this->db->where('id_konsumen', $id);
        $this->db->update('rb_konsumen', $datadbd);
    }

    public function add_konsumen()
    {
        if (trim($this->input->post('a')) != '') {
            $datadbd = array(
                'username' => $this->db->escape_str(strip_tags($this->input->post('aa'))),
                'password' => hash("sha512", md5($this->input->post('a'))),
                'nama_lengkap' => $this->db->escape_str(strip_tags($this->input->post('b'))),
                'email' => $this->db->escape_str(strip_tags($this->input->post('c'))),
                'jenis_kelamin' => $this->db->escape_str($this->input->post('d')),
                'tanggal_lahir' => $this->db->escape_str($this->input->post('e')),
                'tempat_lahir' => $this->db->escape_str(strip_tags($this->input->post('f'))),
                'alamat_lengkap' => $this->db->escape_str(strip_tags($this->input->post('g'))),
                'kota_id' => $this->db->escape_str(strip_tags($this->input->post('j'))),
                'no_hp' => $this->db->escape_str(strip_tags($this->input->post('l'))),
                'tanggal_daftar' => date('Y-m-d H:i:s'),
                'tipe' => $this->db->escape_str(strip_tags($this->input->post('tipe')))
            );
        } else {
            $datadbd = array(
                'username' => $this->db->escape_str(strip_tags($this->input->post('aa'))),
                'nama_lengkap' => $this->db->escape_str(strip_tags($this->input->post('b'))),
                'email' => $this->db->escape_str(strip_tags($this->input->post('c'))),
                'jenis_kelamin' => $this->db->escape_str($this->input->post('d')),
                'tanggal_lahir' => $this->db->escape_str($this->input->post('e')),
                'tempat_lahir' => $this->db->escape_str(strip_tags($this->input->post('f'))),
                'alamat_lengkap' => $this->db->escape_str(strip_tags($this->input->post('g'))),
                'kota_id' => $this->db->escape_str(strip_tags($this->input->post('j'))),
                'no_hp' => $this->db->escape_str(strip_tags($this->input->post('l'))),
                'tanggal_daftar' => date('Y-m-d H:i:s'),
                'tipe' => $this->db->escape_str(strip_tags($this->input->post('tipe')))
            );
        }
        $this->db->insert('rb_konsumen', $datadbd);
    }
}
