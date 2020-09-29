<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Testimoni extends CI_Controller
{
	public function index()
	{
		if (isset($_POST['submit'])) {
			$this->Model_testimoni->insert_testimoni();
			$jumlah = $this->Model_testimoni->hitung_testimoni()->num_rows();
			$config['base_url'] = base_url() . 'testimoni/index';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 6;
			if ($this->uri->segment('3') == '') {
				$dari = 0;
			} else {
				$dari = $this->uri->segment('3');
			}
			if (is_numeric($dari)) {
				$data['record'] = $this->Model_testimoni->public_testimoni($config['per_page'], $dari);
			} else {
				redirect('testimoni');
			}
			$this->pagination->initialize($config);
			$data['title'] = 'Testimoni Konsumen';
			$this->template->load('phpmu-one/template', 'phpmu-one/view_testimoni', $data);
		} else {
			$data['record'] = $this->Model_testimoni->public_testimoni($config['per_page'], $dari);			
			$data['title'] = 'Testimoni Konsumen';
			$this->template->load('phpmu-one/template', 'phpmu-one/view_testimoni', $data);
		}
	}
}
