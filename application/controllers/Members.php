<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Members extends CI_Controller
{
	function foto()
	{
		cek_session_members();
		if (isset($_POST['submit'])) {
			$this->Model_members->modupdatefoto();
			redirect('members/profile');
		} else {
			redirect('members/profile');
		}
	}

	function profile()
	{
		cek_session_members();
		$data['title'] = 'Profile Anda';
		$data['row'] = $this->Model_app->profile_konsumen($this->session->id_konsumen)->row_array();
		$this->template->load('phpmu-one/template', 'phpmu-one/pengunjung/view_profile', $data);
	}

	function edit_profile()
	{
		cek_session_members();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_members->profile_update($this->session->id_konsumen);
			redirect('members/profile');
		} else {
			$data['title'] = 'Edit Profile Anda';
			$data['row'] = $this->Model_app->profile_konsumen($this->session->id_konsumen)->row_array();
			$row = $this->Model_app->profile_konsumen($this->session->id_konsumen)->row_array();
			$data['kota'] = $this->Model_app->view('rb_kota');
			$this->template->load('phpmu-one/template', 'phpmu-one/pengunjung/view_profile_edit', $data);
		}
	}

	function history()
	{
		cek_session_members();
		$data['title'] = 'History Orderan anda';
		$data['record'] = $this->Model_app->view_where_ordering('rb_penjualan', array('id_pembeli' => $this->session->id_konsumen), 'id_penjualan', 'DESC');
		$this->template->load('phpmu-one/template', 'phpmu-one/pengunjung/view_orders_report', $data);
	}

	function logout()
	{
		cek_session_members();
		$this->session->sess_destroy();
		redirect('main');
	}



	public function username_check()
	{
		// allow only Ajax request    
		if ($this->input->is_ajax_request()) {
			// grab the email value from the post variable.
			$username = $this->input->post('a');

			if (!$this->form_validation->is_unique($username, 'rb_konsumen.username')) {
				$this->output->set_content_type('application/json')->set_output(json_encode(array('messageusername' => 'Maaf, Username ini sudah terdaftar,..')));
			}
		}
	}

	public function email_check()
	{
		// allow only Ajax request    
		if ($this->input->is_ajax_request()) {
			// grab the email value from the post variable.
			$email = $this->input->post('d');

			if (!$this->form_validation->is_unique($email, 'rb_konsumen.email')) {
				$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => 'Maaf, Email ini sudah terdaftar,..')));
			}
		}
	}
}
