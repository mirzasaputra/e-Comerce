<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	function index(){
		redirect(base_url());
	}
}
