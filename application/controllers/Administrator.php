<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Administrator extends CI_Controller
{
	function index()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->db->query("SELECT * FROM users where username='" . $this->db->escape_str($username) . "' AND password='" . $this->db->escape_str($password) . "'");
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				$this->session->set_userdata('upload_image_file_manager', true);
				$this->session->set_userdata(array(
					'id_users' => $row['id_users'],
					'username' => $row['username'],
					'level' => $row['level'],
					'id_session' => $row['id_session']
				));
				redirect('administrator/home');
			} else {
				$data['title'] = 'Administrator &rsaquo; Log In';
				$data['identitas_web'] = $this->Model_main->identitas()->row_array();
				$this->load->view('administrator/view_login', $data);
			}
		} else {
			$data['title'] = 'Administrator &rsaquo; Log In';
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->load->view('administrator/view_login', $data);
		}
	}

	function home()
	{
		if ($this->session->id_session) {
			$data['title'] = "Dashboard";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/view_home', $data);
		} else {
			redirect('administrator');
		}
	}

	function identitaswebsite()
	{
		cek_session_akses('identitaswebsite', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_main->identitas_update();
			redirect('administrator/identitaswebsite');
		} else {
			$data['record'] = $this->Model_main->identitas()->row_array();
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$data['title'] = "Identitas Website";
			$this->template->load('administrator/template', 'administrator/mod_identitas/view_identitas', $data);
		}
	}

	function keterangan()
	{
		cek_session_akses('keterangan', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_main->keterangan_update();
			redirect('administrator/keterangan');
		} else {
			$data['record'] = $this->Model_main->keterangan()->row_array();
			$data['title'] = "Keterangan";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_keterangan/view_keterangan', $data);
		}
	}

	// Controller Modul Menu Website

	function menuwebsite()
	{
		cek_session_akses('menuwebsite', $this->session->id_session);
		$data['record'] = $this->Model_menu->menu_website();
		$data['title'] = "Menu Website";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_menu/view_menu', $data);
	}

	function tambah_menuwebsite()
	{
		cek_session_akses('menuwebsite', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_menu->menu_website_tambah();
			redirect('administrator/menuwebsite');
		} else {
			$data['record'] = $this->Model_menu->menu_utama();
			$data['title'] = "Tambah Menu Website";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_menu/view_menu_tambah', $data);
		}
	}

	function edit_menuwebsite()
	{
		cek_session_akses('menuwebsite', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_menu->menu_website_update();
			redirect('administrator/menuwebsite');
		} else {
			$data['record'] = $this->Model_menu->menu_utama();
			$data['rows'] = $this->Model_menu->menu_edit($id)->row_array();
			$data['title'] = "Edit Menu Website";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_menu/view_menu_edit', $data);
		}
	}

	function delete_menuwebsite()
	{
		cek_session_akses('menuwebsite', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_menu->menu_delete($id);
		redirect('administrator/menuwebsite');
	}


	// Controller Modul Halaman Baru

	function halamanbaru()
	{
		cek_session_akses('halamanbaru', $this->session->id_session);
		$data['record'] = $this->Model_halaman->halamanstatis();
		$data['title'] = "Halaman Baru";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_halaman/view_halaman', $data);
	}

	function tambah_halamanbaru()
	{
		cek_session_akses('halamanbaru', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_halaman->halamanstatis_tambah();
			redirect('administrator/halamanbaru');
		} else {
			$data['title'] = "Tambah Halaman Baru";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_halaman/view_halaman_tambah', $data);
		}
	}

	function edit_halamanbaru()
	{
		cek_session_akses('halamanbaru', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_halaman->halamanstatis_update();
			redirect('administrator/halamanbaru');
		} else {
			$data['rows'] = $this->Model_halaman->halamanstatis_edit($id)->row_array();
			$data['title'] = "Edit Halaman Baru";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_halaman/view_halaman_edit', $data);
		}
	}

	function delete_halamanbaru()
	{
		cek_session_akses('halamanbaru', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_halaman->halamanstatis_delete($id);
		redirect('administrator/halamanbaru');
	}



	// Controller Modul Download

	function download()
	{
		cek_session_akses('download', $this->session->id_session);
		$data['record'] = $this->Model_download->index();
		$data['title'] = "Download";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_download/view_download', $data);
	}

	function tambah_download()
	{
		cek_session_akses('download', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_download->download_tambah();
			redirect('administrator/download');
		} else {
			$data['title'] = "Tambah Download";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_download/view_download_tambah', $data);
		}
	}

	function edit_download()
	{
		cek_session_akses('download', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_download->download_update();
			redirect('administrator/download');
		} else {
			$data['rows'] = $this->Model_download->download_edit($id)->row_array();
			$data['title'] = "Edit Download";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_download/view_download_edit', $data);
		}
	}

	function delete_download()
	{
		cek_session_akses('download', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_download->download_delete($id);
		redirect('administrator/download');
	}

	public function download_file()
	{
		$name = $this->uri->segment(3);
		$data = file_get_contents("asset/bukti_transfer/" . $name);
		force_download($name, $data);
	}




	// Controller Modul Image Slider

	function imagesslider()
	{
		cek_session_akses('imagesslider', $this->session->id_session);
		$data['record'] = $this->Model_main->slide();
		$data['title'] = "Images Slider";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_slider/view_slider', $data);
	}

	function tambah_imagesslider()
	{
		cek_session_akses('imagesslider', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_main->slide_tambah();
			redirect('administrator/imagesslider');
		} else {
			$data['title'] = "Tambah Images Slider";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_slider/view_slider_tambah', $data);
		}
	}

	function edit_imagesslider()
	{
		cek_session_akses('imagesslider', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_main->slide_update();
			redirect('administrator/imagesslider');
		} else {
			$data['rows'] = $this->Model_main->slide_edit($id)->row_array();
			$data['title'] = "Edit Images Slider";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_slider/view_slider_edit', $data);
		}
	}

	function delete_imagesslider()
	{
		cek_session_akses('imagesslider', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_main->slide_delete($id);
		redirect('administrator/imagesslider');
	}



	// Controller Modul Album

	function album()
	{
		cek_session_akses('album', $this->session->id_session);
		$data['record'] = $this->Model_gallery->album();
		$data['title'] = "Album";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_album/view_album', $data);
	}

	function tambah_album()
	{
		cek_session_akses('album', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_gallery->album_tambah();
			redirect('administrator/album');
		} else {
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$data['title'] = "Tambah Album";
			$this->template->load('administrator/template', 'administrator/mod_album/view_album_tambah', $data);
		}
	}

	function edit_album()
	{
		cek_session_akses('album', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_gallery->album_update();
			redirect('administrator/album');
		} else {
			$data['rows'] = $this->Model_gallery->album_edit($id)->row_array();
			$data['title'] = "Edit Album";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_album/view_album_edit', $data);
		}
	}

	function delete_album()
	{
		cek_session_akses('album', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_gallery->album_delete($id);
		redirect('administrator/album');
	}


	// Controller Modul Gallery

	function gallery()
	{
		cek_session_akses('gallery', $this->session->id_session);
		$data['record'] = $this->Model_gallery->gallery();
		$data['title'] = "Gallery";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_gallery/view_gallery', $data);
	}

	function tambah_gallery()
	{
		cek_session_akses('gallery', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_gallery->gallery_tambah();
			redirect('administrator/gallery');
		} else {
			$data['row'] = $this->Model_gallery->album();
			$data['title'] = "Tambah Gallery";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_gallery/view_gallery_tambah', $data);
		}
	}

	function edit_gallery()
	{
		cek_session_akses('gallery', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_gallery->gallery_update();
			redirect('administrator/gallery');
		} else {
			$data['row'] = $this->Model_gallery->album();
			$data['rows'] = $this->Model_gallery->gallery_edit($id)->row_array();
			$data['title'] = "Edit Gallery";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_gallery/view_gallery_edit', $data);
		}
	}

	function delete_gallery()
	{
		cek_session_akses('gallery', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_gallery->gallery_delete($id);
		redirect('administrator/gallery');
	}


	// Controller Modul Testimoni

	function testimoni()
	{
		cek_session_akses('testimoni', $this->session->id_session);
		$data['record'] = $this->Model_testimoni->testimoni();
		$data['title'] = "Testimoni";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_testimoni/view_testimoni', $data);
	}

	function edit_testimoni()
	{
		cek_session_akses('testimoni', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_testimoni->testimoni_update();
			redirect('administrator/testimoni');
		} else {
			$data['rows'] = $this->Model_testimoni->testimoni_edit($id)->row_array();
			$data['title'] = "Edit Testimoni";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_testimoni/view_testimoni_edit', $data);
		}
	}

	function delete_testimoni()
	{
		cek_session_akses('testimoni', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_testimoni->testimoni_delete($id);
		redirect('administrator/testimoni');
	}


	// Controller Modul List Berita

	function listberita()
	{
		cek_session_akses('listberita', $this->session->id_session);
		$data['record'] = $this->Model_berita->list_berita();
		$data['title'] = "List Berita";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_berita/view_berita', $data);
	}

	function tambah_listberita()
	{
		cek_session_akses('listberita', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_berita->list_berita_tambah();
			redirect('administrator/listberita');
		} else {
			$data['tag'] = $this->Model_berita->tag_berita();
			$data['record'] = $this->Model_berita->kategori_berita();
			$data['title'] = "Tambah Berita";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_berita/view_berita_tambah', $data);
		}
	}

	function cepat_listberita()
	{
		cek_session_akses('listberita', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_berita->list_berita_cepat();
			redirect('administrator/listberita');
		} else {
			redirect('administrator/listberita');
		}
	}

	function edit_listberita()
	{
		cek_session_akses('listberita', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_berita->list_berita_update();
			redirect('administrator/listberita');
		} else {
			$data['tag'] = $this->Model_berita->tag_berita();
			$data['record'] = $this->Model_berita->kategori_berita();
			$data['rows'] = $this->Model_berita->list_berita_edit($id)->row_array();
			$data['title'] = "Edit Berita";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_berita/view_berita_edit', $data);
		}
	}

	function delete_listberita()
	{
		cek_session_akses('listberita', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_berita->list_berita_delete($id);
		redirect('administrator/listberita');
	}


	// Controller Modul Kategori Berita

	function kategoriberita()
	{
		cek_session_akses('kategoriberita', $this->session->id_session);
		$data['record'] = $this->Model_berita->kategori_berita();
		$data['title'] = "Kategori Berita";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_kategori/view_kategori', $data);
	}

	function tambah_kategoriberita()
	{
		cek_session_akses('kategoriberita', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_berita->kategori_berita_tambah();
			redirect('administrator/kategoriberita');
		} else {
			$data['title'] = "Tambah Kategori Berita";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kategori/view_kategori_tambah', $data);
		}
	}

	function edit_kategoriberita()
	{
		cek_session_akses('kategoriberita', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_berita->kategori_berita_update();
			redirect('administrator/kategoriberita');
		} else {
			$data['rows'] = $this->Model_berita->kategori_berita_edit($id)->row_array();
			$data['title'] = "Edit Kategori Berita";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kategori/view_kategori_edit', $data);
		}
	}

	function delete_kategoriberita()
	{
		cek_session_akses('kategoriberita', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_berita->kategori_berita_delete($id);
		redirect('administrator/kategoriberita');
	}



	// Controller Modul Tag Berita

	function tagberita()
	{
		cek_session_akses('tagberita', $this->session->id_session);
		$data['record'] = $this->Model_berita->tag_berita();
		$data['title'] = "Tag Berita";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_tag/view_tag', $data);
	}

	function tambah_tagberita()
	{
		cek_session_akses('tagberita', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_berita->tag_berita_tambah();
			redirect('administrator/tagberita');
		} else {
			$data['title'] = "Tambah Tag Berita";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_tag/view_tag_tambah', $data);
		}
	}

	function edit_tagberita()
	{
		cek_session_akses('tagberita', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_berita->tag_berita_update();
			redirect('administrator/tagberita');
		} else {
			$data['rows'] = $this->Model_berita->tag_berita_edit($id)->row_array();
			$data['title'] = "Edit Tag Berita";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_tag/view_tag_edit', $data);
		}
	}

	function delete_tagberita()
	{
		cek_session_akses('tagberita', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_berita->tag_berita_delete($id);
		redirect('administrator/tagberita');
	}



	// Controller Modul Iklan Home

	function iklanhome()
	{
		cek_session_akses('iklanhome', $this->session->id_session);
		$data['record'] = $this->Model_iklan->iklan_tengah();
		$data['title'] = "Iklan Home";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_iklanhome/view_iklanhome', $data);
	}

	function tambah_iklanhome()
	{
		cek_session_akses('iklanhome', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_iklan->iklan_tengah_tambah();
			redirect('administrator/iklanhome');
		} else {
			$data['title'] = "Tambah Iklan Home";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_iklanhome/view_iklanhome_tambah');
		}
	}

	function edit_iklanhome()
	{
		cek_session_akses('iklanhome', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_iklan->iklan_tengah_update();
			redirect('administrator/iklanhome');
		} else {
			$data['title'] = "Edit Iklan Home";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$data['rows'] = $this->Model_iklan->iklan_tengah_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_iklanhome/view_iklanhome_edit', $data);
		}
	}

	function delete_iklanhome()
	{
		cek_session_akses('iklanhome', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_iklan->iklan_tengah_delete($id);
		redirect('administrator/iklanhome');
	}



	// Controller Modul Iklan Sidebar

	function iklansidebar()
	{
		cek_session_akses('iklansidebar', $this->session->id_session);
		$data['record'] = $this->Model_iklan->iklan_sidebar();
		$data['title'] = "Iklan Sidebar";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_iklansidebar/view_iklansidebar', $data);
	}

	function tambah_iklansidebar()
	{
		cek_session_akses('iklansidebar', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_iklan->iklan_sidebar_tambah();
			redirect('administrator/iklansidebar');
		} else {
			$data['title'] = "Tambah Iklan Sidebar";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_iklansidebar/view_iklansidebar_tambah', $data);
		}
	}

	function edit_iklansidebar()
	{
		cek_session_akses('iklansidebar', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_iklan->iklan_sidebar_update();
			redirect('administrator/iklansidebar');
		} else {
			$data['title'] = "Edit Iklan Sidebar";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$data['rows'] = $this->Model_iklan->iklan_sidebar_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_iklansidebar/view_iklansidebar_edit', $data);
		}
	}

	function delete_iklansidebar()
	{
		cek_session_akses('iklansidebar', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_iklan->iklan_sidebar_delete($id);
		redirect('administrator/iklansidebar');
	}



	// Controller Modul Logo

	function logowebsite()
	{
		cek_session_akses('logowebsite', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_main->logo_update();
			redirect('administrator/logowebsite');
		} else {
			$data['record'] = $this->Model_main->logo();
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$data['title'] = "Logo Website";
			$this->template->load('administrator/template', 'administrator/mod_logowebsite/view_logowebsite', $data);
		}
	}


	// Controller Modul Template Website

	function templatewebsite()
	{
		cek_session_akses('templatewebsite', $this->session->id_session);
		$data['record'] = $this->Model_main->template();
		$data['title'] = "Template Website";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_template/view_template', $data);
	}

	function tambah_templatewebsite()
	{
		cek_session_akses('templatewebsite', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_main->template_tambah();
			redirect('administrator/templatewebsite');
		} else {
			$data['title'] = "Tambah Template Website";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_template/view_template_tambah', $data);
		}
	}

	function edit_templatewebsite()
	{
		cek_session_akses('templatewebsite', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_main->template_update();
			redirect('administrator/templatewebsite');
		} else {
			$data['title'] = "Edit Template Website";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$data['rows'] = $this->Model_main->template_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_template/view_template_edit', $data);
		}
	}



	function delete_templatewebsite()
	{
		cek_session_akses('templatewebsite', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_main->template_delete($id);
		redirect('administrator/templatewebsite');
	}



	// Controller Modul Pesan Masuk

	function pesanmasuk()
	{
		cek_session_akses('pesanmasuk', $this->session->id_session);
		$data['record'] = $this->Model_main->pesan_masuk();
		$data['title'] = "Pesan Masuk";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_pesanmasuk/view_pesanmasuk', $data);
	}

	function detail_pesanmasuk()
	{
		cek_session_akses('pesanmasuk', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->db->query("UPDATE hubungi SET dibaca='Y' where id_hubungi='$id'");
		if (isset($_POST['submit'])) {
			$this->Model_main->pesan_masuk_kirim();
			$data['rows'] = $this->Model_main->pesan_masuk_view($id)->row_array();
			$data['title'] = "Detail Pesan";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_pesanmasuk/view_pesanmasuk_detail', $data);
		} else {
			$data['rows'] = $this->Model_main->pesan_masuk_view($id)->row_array();
			$data['title'] = "Detail Pesan";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_pesanmasuk/view_pesanmasuk_detail', $data);
		}
	}

	function delete_pesanmasuk()
	{
		cek_session_akses('pesanmasuk', $this->session->id_session);
		$id = array('id_hubungi' => $this->uri->segment(3));
		$this->Model_app->delete('hubungi', $id);
		redirect($this->uri->segment(1) . '/pesanmasuk');
	}




	// Controller Modul User

	function manajemenuser()
	{
		cek_session_akses('manajemenuser', $this->session->id_session);
		$data['record'] = $this->Model_app->view_ordering('users', 'username', 'DESC');
		$data['title'] = "Manajemen Users";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_users/view_users', $data);
	}

	function tambah_manajemenuser()
	{
		cek_session_akses('manajemenuser', $this->session->id_session);
		$id = $this->session->username;
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'password' => hash("sha512", md5($this->input->post('b'))),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'level' => $this->db->escape_str($this->input->post('g')),
					'blokir' => 'N',
					'id_session' => md5($this->input->post('a')) . '-' . date('YmdHis')
				);
			} else {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'password' => hash("sha512", md5($this->input->post('b'))),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'foto' => $hasil['file_name'],
					'level' => $this->db->escape_str($this->input->post('g')),
					'blokir' => 'N',
					'id_session' => md5($this->input->post('a')) . '-' . date('YmdHis')
				);
			}
			$this->Model_app->insert('users', $data);

			$mod = count($this->input->post('modul'));
			$modul = $this->input->post('modul');
			$sess = md5($this->input->post('a')) . '-' . date('YmdHis');
			for ($i = 0; $i < $mod; $i++) {
				$datam = array(
					'id_session' => $sess,
					'id_modul' => $modul[$i]
				);
				$this->Model_app->insert('users_modul', $datam);
			}

			redirect('administrator/edit_manajemenuser/' . $this->input->post('a'));
		} else {
			$proses = $this->Model_app->view_where_ordering('modul', array('publish' => 'Y', 'status' => 'user'), 'id_modul', 'DESC');
			$data = array('record' => $proses);
			$data['title'] = "Tambah User";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_users/view_users_tambah', $data);
		}
	}

	function edit_manajemenuser()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '' and $this->input->post('b') == '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'blokir' => $this->db->escape_str($this->input->post('h'))
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') == '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'foto' => $hasil['file_name'],
					'blokir' => $this->db->escape_str($this->input->post('h'))
				);
			} elseif ($hasil['file_name'] == '' and $this->input->post('b') != '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'password' => hash("sha512", md5($this->input->post('b'))),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'blokir' => $this->db->escape_str($this->input->post('h'))
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') != '') {
				$data = array(
					'username' => $this->db->escape_str($this->input->post('a')),
					'password' => hash("sha512", md5($this->input->post('b'))),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'foto' => $hasil['file_name'],
					'blokir' => $this->db->escape_str($this->input->post('h'))
				);
			}
			$where = array('username' => $this->input->post('id'));
			$this->Model_app->update('users', $data, $where);

			$mod = count($this->input->post('modul'));
			$modul = $this->input->post('modul');
			for ($i = 0; $i < $mod; $i++) {
				$datam = array(
					'id_session' => $this->input->post('ids'),
					'id_modul' => $modul[$i]
				);
				$this->Model_app->insert('users_modul', $datam);
			}

			redirect('administrator/edit_manajemenuser/' . $this->input->post('id'));
		} else {
			if ($this->session->username == $this->uri->segment(3) or $this->session->level == 'admin') {
				$proses = $this->Model_app->edit('users', array('username' => $id))->row_array();
				$akses = $this->Model_app->view_join_where('users_modul', 'modul', 'id_modul', array('id_session' => $proses['id_session']), 'id_umod', 'DESC');
				$modul = $this->Model_app->view_where_ordering('modul', array('publish' => 'Y', 'status' => 'user'), 'id_modul', 'DESC');
				$data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
				$data['title'] = "Edit User";
				$data['identitas_web'] = $this->Model_main->identitas()->row_array();
				$this->template->load('administrator/template', 'administrator/mod_users/view_users_edit', $data);
			} else {
				redirect('administrator/edit_manajemenuser/' . $this->session->username);
			}
		}
	}

	function delete_manajemenuser()
	{
		cek_session_akses('manajemenuser', $this->session->id_session);
		$id = array('username' => $this->uri->segment(3));
		$this->Model_app->delete('users', $id);
		redirect('administrator/manajemenuser');
	}

	function delete_akses()
	{
		cek_session_admin();
		$id = array('id_umod' => $this->uri->segment(3));
		$this->Model_app->delete('users_modul', $id);
		redirect('administrator/edit_manajemenuser/' . $this->uri->segment(4));
	}




	// Controller Modul Modul

	function manajemenmodul()
	{
		cek_session_akses('manajemenmodul', $this->session->id_session);
		$data['record'] = $this->Model_modul->modul();
		$data['title'] = "Manajemen Modul";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_modul/view_modul', $data);
	}

	function tambah_manajemenmodul()
	{
		cek_session_akses('manajemenmodul', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_modul->modul_tambah();
			redirect('administrator/manajemenmodul');
		} else {
			$data['title'] = "Tambah Modul";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_modul/view_modul_tambah', $data);
		}
	}

	function edit_manajemenmodul()
	{
		cek_session_akses('manajemenmodul', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_modul->modul_update();
			redirect('administrator/manajemenmodul');
		} else {
			$data['rows'] = $this->Model_modul->modul_edit($id)->row_array();
			$data['title'] = "Edit Modul";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_modul/view_modul_edit', $data);
		}
	}

	function delete_manajemenmodul()
	{
		cek_session_akses('manajemenmodul', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_modul->modul_delete($id);
		redirect('administrator/manajemenmodul');
	}


	// Controller Modul Konsumen

	function konsumen()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$data['record'] = $this->db->query('SELECT * FROM rb_konsumen WHERE kota_id != "Umum"')->result_array();
		$data['title'] = "Konsumen";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_konsumen/view_konsumen', $data);
	}

	function edit_konsumen()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_members->profile_update($this->input->post('id'));
			redirect('administrator/konsumen');
		} else {
			$data['row'] = $this->Model_app->profile_konsumen($id)->row_array();
			$data['kota'] = $this->Model_app->view('rb_kota');
			$data['title'] = "Edit Konsumen";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_konsumen/view_konsumen_edit', $data);
		}
	}

	public function add_konsumen()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_members->add_konsumen();
			redirect('administrator/konsumen');
		} else {
			$data['row'] = $this->Model_app->profile_konsumen($id)->row_array();
			$data['kota'] = $this->Model_app->view('rb_kota');
			$data['title'] = "Tambah Konsumen Baru";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_konsumen/view_konsumen_tambah', $data);
		}
	}

	function detail_konsumen()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$id = $this->uri->segment(3);
		$record = $this->Model_app->orders_report($id);
		$edit = $this->Model_app->profile_konsumen($id)->row_array();
		$data = array('rows' => $edit, 'record' => $record);
		$data['title'] = "Detail Konsumen";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_konsumen/view_konsumen_detail', $data);
	}

	function delete_konsumen()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$id = array('id_konsumen' => $this->uri->segment(3));
		$this->Model_app->delete('rb_konsumen', $id);
		redirect('administrator/konsumen');
	}


	// Controller Modul Kategori Produk

	function kategori_produk()
	{
		cek_session_akses('kategori_produk', $this->session->id_session);
		$data['title'] = "Kategori Produk";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$data['record'] = $this->Model_app->view_ordering('rb_kategori_produk', 'id_kategori_produk', 'DESC');
		$this->template->load('administrator/template', 'administrator/mod_kategori_produk/view_kategori_produk', $data);
	}

	function tambah_kategori_produk()
	{
		cek_session_akses('kategori_produk', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$data = array('nama_kategori' => $this->input->post('a'), 'kategori_seo' => seo_title($this->input->post('a')));
			$this->Model_app->insert('rb_kategori_produk', $data);
			redirect('administrator/kategori_produk');
		} else {
			$data['title'] = "Tammbah Kategori Produk";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kategori_produk/view_kategori_produk_tambah', $data);
		}
	}

	function edit_kategori_produk()
	{
		cek_session_akses('kategori_produk', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array('nama_kategori' => $this->input->post('a'), 'kategori_seo' => seo_title($this->input->post('a')));
			$where = array('id_kategori_produk' => $this->input->post('id'));
			$this->Model_app->update('rb_kategori_produk', $data, $where);
			redirect('administrator/kategori_produk');
		} else {
			$edit = $this->Model_app->edit('rb_kategori_produk', array('id_kategori_produk' => $id))->row_array();
			$data = array('rows' => $edit);
			$data['title'] = "Edit Kategori Produk";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kategori_produk/view_kategori_produk_edit', $data);
		}
	}

	function delete_kategori_produk()
	{
		cek_session_akses('kategori_produk', $this->session->id_session);
		$id = array('id_kategori_produk' => $this->uri->segment(3));
		$this->Model_app->delete('rb_kategori_produk', $id);
		redirect('administrator/kategori_produk');
	}


	// Controller Modul Produk

	function produk()
	{
		cek_session_akses('produk', $this->session->id_session);
		$data['record'] = $this->Model_app->view_ordering('rb_produk', 'id_produk', 'DESC');
		$data['title'] = "Produk";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_produk/view_produk', $data);
	}

	function tambah_produk()
	{
		cek_session_akses('produk', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '5000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('g');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->db->escape_str($this->input->post('b')),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_reseller' => $this->input->post('e'),
					'harga_konsumen' => $this->input->post('f'),
					'berat' => $this->input->post('berat'),
					'keterangan' => $this->input->post('ff'),
					'username' => $this->session->username,
					'waktu_input' => date('Y-m-d H:i:s'),
					'stok' => 0
				);
			} else {
				$data = array(
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->input->post('b'),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_reseller' => $this->input->post('e'),
					'harga_konsumen' => $this->input->post('f'),
					'berat' => $this->input->post('berat'),
					'gambar' => $hasil['file_name'],
					'keterangan' => $this->input->post('ff'),
					'username' => $this->session->username,
					'waktu_input' => date('Y-m-d H:i:s'),
					'stok' => 0,
				);
			}
			$this->Model_app->insert('rb_produk', $data);
			redirect('administrator/produk');
		} else {
			$data['title'] = "Tambah Produk";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$data['record'] = $this->Model_app->view_ordering('rb_kategori_produk', 'id_kategori_produk', 'DESC');
			$this->template->load('administrator/template', 'administrator/mod_produk/view_produk_tambah', $data);
		}
	}

	function edit_produk()
	{
		cek_session_akses('produk', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'asset/foto_produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '5000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('g');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->input->post('b'),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_reseller' => $this->input->post('e'),
					'harga_konsumen' => $this->input->post('f'),
					'berat' => $this->input->post('berat'),
					'keterangan' => $this->input->post('ff'),
					'username' => $this->session->username
				);
			} else {
				$data = array(
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->input->post('b'),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_reseller' => $this->input->post('e'),
					'harga_konsumen' => $this->input->post('f'),
					'berat' => $this->input->post('berat'),
					'gambar' => $hasil['file_name'],
					'keterangan' => $this->input->post('ff'),
					'username' => $this->session->username
				);
			}
			$where = array('id_produk' => $this->input->post('id'));
			$this->Model_app->update('rb_produk', $data, $where);
			redirect('administrator/produk');
		} else {
			$data['record'] = $this->Model_app->view_ordering('rb_kategori_produk', 'id_kategori_produk', 'DESC');
			$data['rows'] = $this->Model_app->edit('rb_produk', array('id_produk' => $id))->row_array();
			$data['title'] = "Edit Produk";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_produk/view_produk_edit', $data);
		}
	}

	function delete_produk()
	{
		cek_session_akses('produk', $this->session->id_session);
		$id = array('id_produk' => $this->uri->segment(3));
		$this->Model_app->delete('rb_produk', $id);
		redirect('administrator/produk');
	}


	// Controller Modul Rekening

	function rekening()
	{
		cek_session_akses('rekening', $this->session->id_session);
		$data['record'] = $this->Model_rekening->rekening();
		$data['title'] = "Rekening";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_rekening/view_rekening', $data);
	}

	function tambah_rekening()
	{
		cek_session_akses('rekening', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$this->Model_rekening->rekening_tambah();
			redirect('administrator/rekening');
		} else {
			$data['title'] = "Tambah Rekening";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_rekening/view_rekening_tambah');
		}
	}

	function edit_rekening()
	{
		cek_session_akses('rekening', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_rekening->rekening_update();
			redirect('administrator/rekening');
		} else {
			$data['title'] = "Edit Rekening";
			$data['rows'] = $this->Model_rekening->rekening_edit($id)->row_array();
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_rekening/view_rekening_edit', $data);
		}
	}

	function delete_rekening()
	{
		cek_session_akses('rekening', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_rekening->rekening_delete($id);
		redirect('administrator/rekening');
	}



	// Controller Modul Pembelian

	function pembelian()
	{
		cek_session_akses('pembelian', $this->session->id_session);
		$this->session->unset_userdata('idp');
		$data['record'] = $this->Model_app->view_join_one('rb_pembelian', 'rb_supplier', 'id_supplier', 'id_pembelian', 'DESC');
		$data['title'] = "Daftar Pembelian";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_pembelian/view_pembelian', $data);
	}

	function detail_pembelian()
	{
		cek_session_akses('pembelian', $this->session->id_session);
		$data['rows'] = $this->Model_app->view_join_rows('rb_pembelian', 'rb_supplier', 'id_supplier', array('id_pembelian' => $this->uri->segment(3)), 'id_pembelian', 'DESC')->row_array();
		$data['record'] = $this->Model_app->view_join_where('rb_pembelian_detail', 'rb_produk', 'id_produk', array('id_pembelian' => $this->uri->segment(3)), 'id_pembelian_detail', 'DESC');
		$data['title'] = "Detail Pembelian";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_pembelian/view_pembelian_detail', $data);
	}

	function tambah_pembelian()
	{
		cek_session_akses('pembelian', $this->session->id_session);
		if (isset($_POST['submit1'])) {
			if ($this->session->idp == '') {
				$user = $this->db->get_where('users', ['username' => $this->session->username])->row_array();
				$data = array(
					'kode_pembelian' => $this->input->post('a'),
					'id_supplier' => $this->input->post('b'),
					'waktu_beli' => date('Y-m-d H:i:s'),
					'id_user'	=> $user['id_users']
				);
				$this->Model_app->insert('rb_pembelian', $data);
				$idp = $this->db->insert_id();
				$this->session->set_userdata(array('idp' => $idp));
				redirect('administrator/tambah_pembelian');
			} else {
				$kembalian = $this->input->post('kembali');
				$bayar = $this->input->post('bayar');
				$metode = $this->input->post('metode');

				if ($kembalian < 0) {
					$kembalian = 0;
				}
				// $data = array(
				// 	'kode_pembelian' => $this->input->post('a'),
				// 	'id_supplier' => $this->input->post('b')
				// );
				// $where = array('id_pembelian' => $this->session->idp);
				// $this->Model_app->update('rb_pembelian', $data, $where);
				$data = array(
					'method'	=> $metode,
					'bayar'		=> $bayar,
					'kembali'	=> $kembalian,
				);
				$where = array('id_pembelian' => $this->session->idp);
				$this->Model_app->update('rb_pembelian', $data, $where);
				$this->Model_kas->addKasFromPembelian($kembalian, $bayar);
				$this->Model_hutang->addHutang($metode, $this->session->idp);
				redirect('administrator/pembelian');
			}
		} elseif (isset($_POST['submit'])) {
			if ($this->input->post('idpd') == '') {
				$data = array(
					'id_pembelian' => $this->session->idp,
					'id_produk' => $this->input->post('aa'),
					'harga_pesan' => $this->input->post('bb'),
					'jumlah_pesan' => $this->input->post('cc'),
					'satuan' => $this->input->post('dd')
				);
				$this->Model_app->insert('rb_pembelian_detail', $data);
				$produk = $this->db->get_where('rb_produk', ['id_produk ' => $this->input->post('aa')])->row_array();
				$stok = $produk['stok'] + $this->input->post('cc');
				$this->db->set('stok', $stok)->where('id_produk', $this->input->post('aa'))->update('rb_produk');
			} else {
				$data = array(
					'id_produk' => $this->input->post('aa'),
					'harga_pesan' => $this->input->post('bb'),
					'jumlah_pesan' => $this->input->post('cc'),
					'satuan' => $this->input->post('dd')
				);

				$detailBeli = $this->db->get_where('rb_pembelian_detail', ['id_pembelian_detail ' => $this->input->post('idpd')])->row_array();
				$produk = $this->db->get_where('rb_produk', ['id_produk ' => $this->input->post('aa')])->row_array();
				$jumlah = $this->input->post('cc') - $detailBeli['jumlah_pesan'];

				if ($jumlah < 0) {

					$qty = abs($jumlah);
					$stokBrg = $produk['stok'] - $qty;
				} else {

					$stokBrg = $produk['stok'] + $jumlah;
				}
				$this->db->set(array('stok' => $stokBrg))->where('id_produk', $this->input->post('aa'))->update('rb_produk');
				$where = array('id_pembelian_detail' => $this->input->post('idpd'));
				$this->Model_app->update('rb_pembelian_detail', $data, $where);
			}
			redirect('administrator/tambah_pembelian');
		} else {
			$data['rows'] = $this->Model_app->view_join_rows('rb_pembelian', 'rb_supplier', 'id_supplier', array('id_pembelian' => $this->session->idp), 'id_pembelian', 'DESC')->row_array();
			$data['record'] = $this->Model_app->view_join_where('rb_pembelian_detail', 'rb_produk', 'id_produk', array('id_pembelian' => $this->session->idp), 'id_pembelian_detail', 'DESC');
			$data['barang'] = $this->Model_app->view_ordering('rb_produk', 'id_produk', 'ASC');
			$data['supplier'] = $this->Model_app->view_ordering('rb_supplier', 'id_supplier', 'ASC');
			if ($this->uri->segment(3) != '') {
				$data['row'] = $this->Model_app->view_where('rb_pembelian_detail', array('id_pembelian_detail' => $this->uri->segment(3)))->row_array();
			}
			$data['title'] = "Tambah Pembelian";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_pembelian/view_pembelian_tambah', $data);
		}
	}


	function delete_pembelian_tambah_detail()
	{
		cek_session_akses('pembelian', $this->session->id_session);
		$id = array('id_pembelian_detail' => $this->uri->segment(3));
		$data = $this->db->get_where('rb_pembelian_detail', ['id_pembelian_detail' => $id['id_pembelian_detail']])->row_array();
		$produk = $this->db->get_where('rb_produk', ['id_produk' => $data['id_produk']])->row_array();
		$stok = $produk['stok'] - $data['jumlah_pesan'];
		$this->db->set('stok', $stok)->where('id_produk', $produk['id_produk'])->update('rb_produk');
		$this->Model_app->delete('rb_pembelian_detail', $id);
		redirect('administrator/tambah_pembelian');
	}

	function tracking()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		if ($this->uri->segment(3) != '') {
			$kode_transaksi = filter($this->uri->segment(3));
			$data['title'] = 'Tracking Order ' . $kode_transaksi;
			$data['rows'] = $this->db->query("SELECT * FROM rb_penjualan a JOIN rb_konsumen b ON a.id_pembeli=b.id_konsumen JOIN rb_kota c ON b.kota_id=c.kota_id where a.kode_transaksi='$kode_transaksi'")->row_array();
			$data['record'] = $this->db->query("SELECT a.kode_transaksi, b.*, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'");
			$data['total'] = $this->db->query("SELECT a.resi, a.id_penjualan, a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'")->row_array();
			$data['title'] = "Tracking";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_penjualan/view_tracking', $data);
		}

		if (isset($_POST['submit'])) {
			$data = array('resi' => $this->input->post('resi'));
			$where = array('id_penjualan' => $this->uri->segment('4'));
			$this->Model_app->update('rb_penjualan', $data, $where);
			redirect('administrator/tracking/' . $this->uri->segment('3'));
		}
	}

	// Controller Modul Supplier

	function supplier()
	{
		cek_session_akses('supplier', $this->session->id_session);
		$data['record'] = $this->Model_app->view_ordering('rb_supplier', 'id_supplier', 'DESC');
		$data['title'] = "Supplier";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_supplier/view_supplier', $data);
	}

	function tambah_supplier()
	{
		cek_session_akses('supplier', $this->session->id_session);
		if (isset($_POST['submit'])) {
			$data = array(
				'nama_supplier' => $this->input->post('a'),
				'kontak_person' => $this->input->post('b'),
				'alamat_lengkap' => $this->input->post('c'),
				'no_hp' => $this->input->post('d'),
				'alamat_email' => $this->input->post('e'),
				'kode_pos' => $this->input->post('f'),
				'no_telpon' => $this->input->post('g'),
				'fax' => $this->input->post('h'),
				'katerangan' => $this->input->post('i')
			);
			$this->Model_app->insert('rb_supplier', $data);
			redirect('administrator/supplier');
		} else {
			$data['title'] = "Tambah Supplier";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_supplier/view_supplier_tambah', $data);
		}
	}

	function edit_supplier()
	{
		cek_session_akses('supplier', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'nama_supplier' => $this->input->post('a'),
				'kontak_person' => $this->input->post('b'),
				'alamat_lengkap' => $this->input->post('c'),
				'no_hp' => $this->input->post('d'),
				'alamat_email' => $this->input->post('e'),
				'kode_pos' => $this->input->post('f'),
				'no_telpon' => $this->input->post('g'),
				'fax' => $this->input->post('h'),
				'katerangan' => $this->input->post('i')
			);
			$where = array('id_supplier' => $this->input->post('id'));
			$this->Model_app->update('rb_supplier', $data, $where);
			redirect('administrator/supplier');
		} else {
			$proses = $this->Model_app->edit('rb_supplier', array('id_supplier' => $id))->row_array();
			$data = array('rows' => $proses);
			$data['title'] = "Edit Supplier";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_supplier/view_supplier_edit', $data);
		}
	}

	function delete_supplier()
	{
		cek_session_akses('supplier', $this->session->id_session);
		$id = array('id_supplier' => $this->uri->segment(3));
		$this->Model_app->delete('rb_supplier', $id);
		redirect('administrator/supplier');
	}

	// Controller Modul Kas

	public function kas()
	{
		cek_session_akses('kas', $this->session->id_session);
		$data['record'] = $this->Model_kas->getAllKas();
		$data['total_kas'] = $this->Model_kas->getTotalKas();
		$data['title'] = "Data Kas";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_kas/view_kas', $data);
	}

	public function add_kas()
	{
		cek_session_akses('kas', $this->session->id_session);
		$this->Model_kas->addKas();
		redirect('administrator/kas');
	}

	public function delete_kas($id)
	{
		cek_session_akses('kas', $this->session->id_session);
		$id = array('id_kas' => $this->uri->segment(3));
		$this->Model_app->delete('kas', $id);
		redirect('administrator/kas');
	}

	public function detail_kas($id = '')
	{
		$data = $this->db->get_where('kas', ['id_kas' => $id])->row_array();
		echo json_encode($data);
	}

	public function edit_kas()
	{
		cek_session_akses('kas', $this->session->id_session);
		$this->Model_kas->editKas();
		redirect('administrator/kas');
	}

	// Modul Stok In Out

	public function stok()
	{
		cek_session_akses('stok', $this->session->id_session);
		$data['record'] = $this->Model_stok->getAllStok();
		$data['title'] = "Data Stok In / Out";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_stok/view_stok', $data);
	}

	public function detail_stok_produk($params = '')
	{
		$data = $this->db->get_where('rb_produk', ['id_produk' => $params])->row_array();
		echo json_encode($data);
	}

	public function add_stok()
	{
		cek_session_akses('stok', $this->session->id_session);
		if (isset($_POST['submit'])) {

			$this->Model_stok->addStok();
			redirect('administrator/stok');
		} else {
			$data['title'] = "Tambah Stok In / Out";
			$data['produk'] = $this->Model_app->view_ordering('rb_produk', 'id_produk', 'DESC');
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_stok/add_stok', $data);
		}
	}

	public function delete_stok()
	{
		cek_session_akses('stok', $this->session->id_session);
		$id = $this->uri->segment(3);
		$this->Model_stok->Delete($id);
		redirect('administrator/stok');
	}


	// Modul Stok Opname

	public function stok_opname()
	{
		cek_session_akses('stok_opname', $this->session->id_session);
		$data['record'] = $this->Model_stok_opname->getAllData();
		$data['title'] = "Data Stok Opname";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_stok_opname/view_stok_opname', $data);
	}

	public function add_stok_opname()
	{
		cek_session_akses('stok_opname', $this->session->id_session);
		if (isset($_POST['submit'])) {

			$this->Model_stok_opname->Save();
			redirect('administrator/stok_opname');
		} else {
			$data['title'] = "Tambah Stok Opname";
			$data['produk'] = $this->Model_app->view_ordering('rb_produk', 'id_produk', 'DESC');
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_stok_opname/add_stok_opname', $data);
		}
	}

	function edit_stok_opname()
	{
		cek_session_akses('stok_opname', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_stok_opname->Edit($this->input->post('id'));
			redirect('administrator/stok_opname');
		} else {
			$data['record']	= $this->Model_stok_opname->Detail($id);
			$data['produk'] = $this->Model_app->view_ordering('rb_produk', 'id_produk', 'DESC');
			$data['title'] = "Edit Stok Opname";
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_stok_opname/edit_stok_opname', $data);
		}
	}

	public function delete_stok_opname()
	{
		cek_session_akses('stok_opname', $this->session->id_session);
		$id = array('id_stok_opname' => $this->uri->segment(3));
		$this->Model_app->delete('stok_opname', $id);
		redirect('administrator/stok_opname');
	}

	// Modul Hutang

	public function hutang()
	{
		cek_session_akses('hutang', $this->session->id_session);
		$data['record'] = $this->Model_hutang->getAllData();
		$data['title'] = "Data Hutang";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_hutang/view_hutang', $data);
	}

	public function pembayaran_hutang()
	{
		cek_session_akses('hutang', $this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->Model_hutang->addPayment();
			redirect('administrator/pembayaran_hutang/' . $this->input->post('id_hutang'));
		} else {
			$data['record'] = $this->Model_hutang->detailHutang($id);
			$data['title'] = "Pembayaran Hutang";
			$data['detail'] = $this->Model_hutang->detailPembayaran($id);
			$data['identitas_web'] = $this->Model_main->identitas()->row_array();
			$this->template->load('administrator/template', 'administrator/mod_hutang/view_payment_hutang', $data);
		}
	}

	public function delete_detail_hutang($id = '')
	{
		$this->Model_hutang->deleteDetailPembayaran($id);
	}

	public function detail_payment_hutang($id = '')
	{
		$data = $this->Model_hutang->getDetail($id);
		echo json_encode($data);
	}


	// Modul Penjualan

	public function penjualan()
	{
		cek_session_akses('hutang', $this->session->id_session);
		$data['record'] = $this->Model_penjualan->getAllData();
		$data['title'] = "Data Penjualan";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_penjualan/view_penjualan', $data);
	}

	public function tambah_penjualan()
	{
		cek_session_akses('penjualan', $this->session->id_session);
		$data['konsumen'] = $this->db->query('SELECT * FROM rb_konsumen WHERE kota_id != "Umum"')->result_array();
		$data['produk'] = $this->Model_app->view_ordering('rb_produk', 'id_produk', 'DESC');
		$data['title'] = "Entry Penjualan";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_penjualan/view_penjualan_tambah', $data);
	}

	public function detail_produk($id = '')
	{
		$data = $this->db->get_where('rb_produk', ['id_produk' => $id])->row_array();
		echo json_encode($data);
	}

	public function detail_customer($id = '')
	{
		$data = $this->db->get_where('rb_konsumen', ['id_konsumen' => $id])->row_array();
		echo json_encode($data);
	}

	public function addItemJual()
	{
		$this->Model_penjualan->addItemJual();
	}

	public function load_item_jual()
	{
		$this->Model_penjualan->loadItemJual();
	}
	public function del_item_jual($id = '')
	{
		$this->Model_penjualan->deleteItemJual($id);
	}
	public function detail_item_jual($id = '')
	{
		$this->Model_penjualan->detailItemJual($id);
	}
	public function edit_detail_penjualan($id = '')
	{
		$this->Model_penjualan->editDetailPenjualan($id);
	}
	public function data_checkout()
	{
		$this->Model_penjualan->dataCheckout();
	}

	public function simpan_penjualan()
	{
		$this->Model_penjualan->simpanPenjualan();
		redirect('administrator/invoice');
	}
	public function invoice()
	{
		$this->load->view('administrator/mod_penjualan/view_Struk');
	}


	function orders()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$data['title'] = 'Laporan Pesanan Masuk';
		$data['record'] = $this->Model_app->orders_report_all();
		$data['title'] = "Orders";
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_penjualan/view_orders_report', $data);
	}

	function print_orders()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$data['title'] = 'Laporan Pesanan Masuk';
		$data['record'] = $this->Model_app->orders_report_all();
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->load->view('administrator/mod_penjualan/view_orders_report_print', $data);
	}

	function konfirmasi()
	{
		cek_session_akses('konsumen', $this->session->id_session);
		$data['title'] = 'Konfirmasi Pembayaran Pesanan';
		$data['record'] = $this->Model_app->konfirmasi_bayar();
		$data['identitas_web'] = $this->Model_main->identitas()->row_array();
		$this->template->load('administrator/template', 'administrator/mod_penjualan/view_konfirmasi_bayar', $data);
	}

	function orders_status()
	{
		$data = array('proses' => $this->uri->segment(4));
		$where = array('id_penjualan' => $this->uri->segment(3));
		$this->Model_app->update('rb_penjualan', $data, $where);
		redirect('administrator/orders');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('main');
	}
}
