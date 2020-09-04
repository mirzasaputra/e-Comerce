<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Download';
		$data['infoterbaru'] = $this->Model_berita->info_terbaru(3);
		$data['record'] = $this->Model_download->index();
		$this->template->load('phpmu-one/template', 'phpmu-one/view_download', $data);
	}

	public function file()
	{
		$name = $this->uri->segment(3);
		$this->Model_download->updatehits($name);
		$data = file_get_contents("asset/files/" . $name);
		force_download($name, $data);
	}
}
