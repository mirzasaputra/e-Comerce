<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	function state()
	{
		$country_id = $this->input->post('count_id');
		$data['provinsi'] = $this->Model_app->view_where_ordering('rb_state', array('country_id' => $country_id), 'state_id', 'DESC');
		$this->load->view('phpmu-one/view_state', $data);
	}

	function city()
	{
		$state_id = $this->input->post('stat_id');
		$data['kota'] = $this->Model_app->view_where_ordering('rb_city', array('state_id' => $state_id), 'city_id', 'DESC');
		$this->load->view('phpmu-one/view_city', $data);
	}

	public function register()
	{
		if (isset($_POST['submit'])) {
			$cek = $this->db->get_where('rb_konsumen', array('username' => $this->input->post('username')));
			if($cek->num_rows() > 0) {
				$data['hasil'] = false;
				$data['pesan'] = 'Username sudah terdaftar, silahkan gunakan username yang lain.';
			} else {

				$data = array(
					'username' => $this->input->post('username'),
					'password' => hash("sha512", md5($this->input->post('password'))),
					'nama_lengkap' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'tanggal_lahir' => '0000-00-00',
					'alamat_lengkap' => '',
					'kota_id' => '',
					'no_hp' => '',
					'tanggal_daftar' => date('Y-m-d H:i:s'),
					'tipe'	=> 'Konsumen'
				);
				$this->Model_app->insert('rb_konsumen', $data);
				$id = $this->db->insert_id();
				$this->session->set_userdata(array('id_konsumen' => $id, 'level' => 'Konsumen'));
				$data['hasil'] = true;
				$data['pesan'] = 'Success';
			}
			
			echo json_encode($data);
		} else {
			$data['title'] = 'Formulir Pendaftaran';
			$data['kota'] = $this->Model_app->view_ordering('rb_kota', 'kota_id', 'ASC');
			$this->template->load('phpmu-one/template', 'phpmu-one/view_register', $data);
		}
	}

	public function login()
	{
		if (isset($_POST['login'])) {
			$username = strip_tags($this->input->post('username'));
			$password = hash("sha512", md5(strip_tags($this->input->post('password'))));
			$cek = $this->db->query("SELECT * FROM rb_konsumen where username='" . $this->db->escape_str($username) . "' AND password='" . $this->db->escape_str($password) . "'");
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				$cek_pembeli = $this->Model_app->view_where('rb_penjualan_temp', array('id_pembeli' => $row['id_konsumen'], 'status' => 'pending'));
				$cek_pembeli = $cek_pembeli->row_array();
				$this->session->set_userdata(array('idp' => $cek_pembeli['session']));
				$this->session->set_userdata(array('id_konsumen' => $row['id_konsumen'], 'level' => $row['tipe']));
				$data['hasil'] = true;
				$data['pesan'] = 'Success';
				echo json_encode($data);
			} else {
				$data['hasil'] = false;
				$data['pesan'] = 'Incorrect Username or Password';
				echo json_encode($data);
			}
		} else {
			$data['title'] = 'User Login';
			$data['module'] = 'login';
			$this->template->load('phpmu-one/template', 'phpmu-one/view_login', $data);
		}
	}

	public function lupass()
	{
		if (isset($_POST['lupa'])) {
			$email = strip_tags($this->input->post('a'));
			$cek = $this->db->query("SELECT * FROM rb_konsumen where email='" . $this->db->escape_str($email) . "'");
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				$identitas = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
				$randompass = generateRandomString(10);
				$passwordbaru = hash("sha512", md5($randompass));
				$this->db->query("UPDATE rb_konsumen SET password='$passwordbaru' where email='" . $this->db->escape_str($email) . "'");

				if ($row['jenis_kelamin'] == 'Laki-laki') {
					$panggill = 'Bpk.';
				} else {
					$panggill = 'Ibuk.';
				}
				$email_tujuan = $row['email'];
				$tglaktif = date("d-m-Y H:i:s");
				$subject      = 'Permintaan Reset Password ...';
				$message      = "<html><body>Halooo! <b>$panggill " . $row['nama_lengkap'] . "</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan Permintaan untuk Reset Password
					<table style='width:100%; margin-left:25px'>
		   				<tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi akun Anda : </b></td></tr>
						<tr><td><b>Nama Lengkap</b></td>			<td> : " . $row['nama_lengkap'] . "</td></tr>
						<tr><td><b>Alamat Email</b></td>			<td> : " . $row['email'] . "</td></tr>
						<tr><td><b>No Telpon</b></td>				<td> : " . $row['no_hp'] . "</td></tr>
						<tr><td><b>Jenis Kelamin</b></td>			<td> : " . $row['jenis_kelamin'] . " </td></tr>
						<tr><td><b>Tempat Lahir</b></td>				<td> : " . $row['tempat_lahir'] . " </td></tr>
						<tr><td><b>Tanggal Lahir</b></td>			<td> : " . $row['tanggal_lahir'] . " </td></tr>
						<tr><td><b>Alamat Lengkap</b></td>			<td> : " . $row['alamat_lengkap'] . " </td></tr>
						<tr><td><b>Waktu Daftar</b></td>			<td> : " . $row['tanggal_daftar'] . "</td></tr>
					</table>
					<br> Username Login : <b style='color:red'>$row[username]</b>
					<br> Password Login : <b style='color:red'>$randompass</b>
					<br> Silahkan Login di : <a href='$identitas[url]'>$identitas[url]</a> <br>
					Admin, $identitas[nama_website] </body></html> \n";

				$this->email->from($identitas['email'], $identitas['nama_website']);
				$this->email->to($email_tujuan);
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype("html");
				$this->email->send();

				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				$data['email'] = $email;
				$data['title'] = 'Permintaan Reset Password Sudah Terkirim...';
				$this->template->load('phpmu-one/template', 'phpmu-one/view_lupass_success', $data);
			} else {
				$data['email'] = $email;
				$data['title'] = 'Email Tidak Ditemukan...';
				$this->template->load('phpmu-one/template', 'phpmu-one/view_lupass_error', $data);
			}
		}
	}
}
