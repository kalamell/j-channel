<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->facebook->is_authenticated()) {

		} else {
			redirect($this->facebook->login_url());
		}
	}
}
