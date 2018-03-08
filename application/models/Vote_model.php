<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function setVote($id, $member_id)
	{
		$check = $this->db->where(array(
			'member_id' => $member_id,
			'movie_id' => $id
		))->get('vote');
		
		if ($check->num_rows() == 0) {
			$this->db->set('vote_date', 'NOW()', false)->insert('vote', array(
				'member_id' => $member_id,
				'movie_id' => $id
			));
		} else {

			$rs = $this->db->query("SELECT *, (CURRENT_TIMESTAMP) as curr , (vote_timestamp + INTERVAL 60 MINUTE)as m60  FROM `vote` WHERE movie_id = ? AND member_id = ? having m60 > curr", array(
				$id, $member_id
			));

			if ($rs->num_rows() == 0) {
				$this->db->set('vote_date', 'NOW()', false)->insert('vote', array(
					'member_id' => $member_id,
					'movie_id' => $id
				));
				$this->session->set_flashdata('save', 1);
			} else {
				$this->session->set_flashdata('expire', 1);
			}
		}
		return true;
	}
}