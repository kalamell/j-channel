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
		$this->link = site_url('vote/id/'.$id);

		if (!$this->facebook->is_authenticated()) {
			$this->link = $this->facebook->login_url();
		}

		$this->load->view('movie/t'.$id, $this);
	}
}
