<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('');
	}

	public function id($id)
	{
		if ($id< 1 && $id >4) redirect('');
		$this->load->view('movie/t'.$id);
	}
}
