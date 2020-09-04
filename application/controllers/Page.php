<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function detail()
	{
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM halamanstatis where judul_seo='$ids' OR id_halaman='$ids'");
		$row = $dat->row();
		$total = $dat->num_rows();
		if ($total == 0) {
			redirect('main');
		}
		$data['title'] = $row->judul;
		$data['record'] = $this->Model_halaman->page_detail($ids)->row_array();
		$data['infoterbaru'] = $this->Model_berita->info_terbaru(6);
		$this->Model_halaman->page_dibaca_update($ids);
		$this->template->load('phpmu-one/template', 'phpmu-one/view_page', $data);
	}
}
