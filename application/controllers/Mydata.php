<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mydata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('fn_helper');
	}

	public function index()
	{
		$this->_login();
		
		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.movie_id = movie.movie_id) as c FROM movie';
		$this->movie = $this->db->query($sql)->result();

		$w = '';
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			

			$w = " WHERE firstname LIKE '%".$txt."%' OR lastname LIKE '%".$txt."%' OR email LIKE '%".$txt."%' ";
		}

		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.member_id = member.id) as c FROM member'.$w;

		echo $sql;
		exit();
		$this->member = $this->db->query($sql)->result();

		$this->load->view('mydata/index', $this);
	}

	public function movie()
	{
		
		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.movie_id = movie.movie_id) as c FROM movie';
		$this->movie = $this->db->query($sql)->result();
		$this->load->view('mydata/movie', $this);

	}


	public function mv($id)
	{
		$this->_login();
		
		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.movie_id = movie.movie_id) as c FROM movie';
		$this->movie = $this->db->query($sql)->result();

		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.member_id = member.id and vote.movie_id = ?) as c FROM member JOIN vote ON member.id = vote.member_id WHERE vote.movie_id = ? group by member.id';
		$this->member = $this->db->query($sql, array(
			$id, $id
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

	public function export_member()
	{
		header("Content-Disposition: attachment; filename=export_member_okinawa.xls");
		header("Content-Type: application/vnd.ms-excel");

		$sql = 'SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.member_id = member.id) as c FROM member';
		$this->member = $this->db->query($sql)->result();
		$this->load->view('mydata/export_member', $this);

	}

	public function export_mv($id)
	{
		header("Content-Disposition: attachment; filename=export_movie_".$id."_okinawa.xls");
		header("Content-Type: application/vnd.ms-excel");

		$this->mv = $this->db->where('movie_id', $id)->get('movie')->row();

		$sql = 'SELECT *  FROM member JOIN vote ON member.id = vote.member_id WHERE vote.movie_id = ?';
		$this->member = $this->db->query($sql, array(
			$id
		))->result();

		$this->load->view('mydata/export_mv', $this);
	}

	
}
