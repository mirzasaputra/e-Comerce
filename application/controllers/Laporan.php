<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function penjualan()
    {
        cek_session_akses('laporan/penjualan', $this->session->id_session);
        $data['title'] = "Laporan Penjualan";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_penjualan/view_laporan', $data);
    }
    public function pembelian()
    {
        cek_session_akses('laporan/pembelian', $this->session->id_session);
        $data['title'] = "Laporan Pembelian";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_pembelian/view_laporan', $data);
    }
    public function kas()
    {
        cek_session_akses('laporan/kas', $this->session->id_session);
        $data['title'] = "Laporan Kas";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_kas/view_laporan', $data);
    }

    public function hutang()
    {
        cek_session_akses('laporan/hutang', $this->session->id_session);
        $data['title'] = "Laporan Hutang";
        $data['supplier'] = $this->db->get('rb_supplier')->result_array();
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_hutang/view_laporan', $data);
    }

    public function piutang()
    {
        cek_session_akses('laporan/piutang', $this->session->id_session);
        $data['title'] = "Laporan Piutang";
        $data['customer'] = $this->db->get('rb_supplier')->result_array();
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_piutang/view_laporan', $data);
    }
    public function stok_opname()
    {
        cek_session_akses('laporan/stok_opname', $this->session->id_session);
        $data['title'] = "Laporan Stok Opname";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_stok_opname/view_laporan', $data);
    }
    public function stok_in_out()
    {
        cek_session_akses('laporan/stok_in_out', $this->session->id_session);
        $data['title'] = "Laporan Stok In / out";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_stok/view_laporan', $data);
    }
    public function retur_penjualan()
    {
        cek_session_akses('laporan/retur_penjualan', $this->session->id_session);
        $data['title'] = "Laporan Retur Penjualan";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_retur_penjualan/view_laporan', $data);
    }
    public function retur_pembelian()
    {
        cek_session_akses('laporan/retur_pembelian', $this->session->id_session);
        $data['title'] = "Laporan Retur Pembelian";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_retur_pembelian/view_laporan', $data);
    }
    public function laba_rugi()
    {
        cek_session_akses('laporan/laba_rugi', $this->session->id_session);
        $data['title'] = "Laporan Laba Rugi";
        $data['identitas_web'] = $this->Model_main->identitas()->row_array();
        $this->template->load('administrator/template', 'administrator/mod_laba_rugi/view_laporan', $data);
    }
}
