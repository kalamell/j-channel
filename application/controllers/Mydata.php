<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mydata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_login();
	}

	public function login()
	{
		$this->load->view('mydata/login');
	}

	public function do_login()
	{
		
	}


	private function _login()
	{
		if (!$this->session->userdata('admin')) {
			redirect('mydata/login');
		}
	}

	
}
