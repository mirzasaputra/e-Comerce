<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function kas()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $this->load->view('report/report_kas', $data);
    }
    public function stok_opname()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $this->load->view('report/report_stok_opname', $data);
    }
    public function stok_in_out()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $data['jenis'] = $this->input->get('category');
        $this->load->view('report/report_stok_in_out', $data);
    }
    public function hutang()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $data['supplier'] = $this->input->get('supplier');
        $this->load->view('report/report_hutang', $data);
    }
    public function piutang()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $data['customer'] = $this->input->get('customer');
        $this->load->view('report/report_piutang', $data);
    }
    public function laba_kotor()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $this->load->view('report/report_laba_kotor', $data);
    }
    public function laba_bersih()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $data['biaya_lain'] = $this->input->get('utility');
        $this->load->view('report/report_laba_bersih', $data);
    }
    public function penjualan()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $data['jenis'] = $this->input->get('category');
        $this->load->view('report/report_penjualan', $data);
    }
    public function pembelian()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $this->load->view('report/report_pembelian', $data);
    }
    public function retur_penjualan()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $this->load->view('report/report_retur_penjualan', $data);
    }
    public function retur_pembelian()
    {
        $data['awal'] = $this->input->get('from');
        $data['akhir'] = $this->input->get('to');
        $this->load->view('report/report_retur_pembelian', $data);
    }
}
