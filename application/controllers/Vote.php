<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('vote_model', 'vote');
	}

	public function index($id)
	{
		$this->session->set_userdata('current_url', current_url());
		if ($this->facebook->is_authenticated()) {
			if ($this->session->userdata('id')) {
				$this->vote->setVote($id, $this->session->userdata('id'));
			} 
			redirect($this->session->userdata('current_url'));
		} else {
			redirect($this->facebook->login_url());
		}
	}
}
