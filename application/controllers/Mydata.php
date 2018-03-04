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
		
		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.movie_id = movie.movie_id) as c FROM movie';
		$this->movie = $this->db->query($sql)->result();

		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.member_id = member.id) as c FROM member';
		$this->member = $this->db->query($sql)->result();
		$this->load->view('mydata/index', $this);
	}


	public function mv($id)
	{
		$this->_login();
		
		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.movie_id = movie.movie_id) as c FROM movie';
		$this->movie = $this->db->query($sql)->result();

		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.member_id = member.id and vote.movie_id = movie.movie_id) as c FROM member JOIN vote ON member.id = vote.member_id WHERE vote.movie_id = ? group by member.id';
		$this->member = $this->db->query($sql, array(
			$id
		))->result();
		$this->load->view('mydata/mv', $this);
	}

	public function login()
	{
		$this->load->view('mydata/login');
	}

	public function do_login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->input->post('username') == 'admin' && $this->input->post('password') == 'admin') {
				$this->session->set_userdata('admin', 1);
			}
		}	

		redirect('mydata');
	}


	private function _login()
	{
		if (!$this->session->userdata('admin')) {
			redirect('mydata/login');
		}
	}

	
}
