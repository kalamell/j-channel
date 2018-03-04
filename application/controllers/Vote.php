<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('vote_model', 'vote');
	}

	public function index()
	{
		redirect('');
	}

	public function id($id)
	{
		$id = (int)$id;
		if ($id < 1 && $id > 4) redirect('');

		$this->session->set_userdata('current_url', current_url());
		if ($this->facebook->is_authenticated()) {
			
			if ($this->session->userdata('id')) {
				$this->vote->setVote($id, $this->session->userdata('id'));
			} 
			
			redirect('movie/id/'.$id);
		} else {
			redirect($this->facebook->login_url());
		}
	}
}
