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
		$rs = $this->db->query("SELECT * FROM `vote` WHERE vote_id = ? AND member_id = ? AND vote_timestamp <= CURRENT_TIMESTAMP - INTERVAL 60 MINUTE order by vote_timestamp DESC LIMIT 1", array(
			$id, $member_id
		));

		if ($rs->num_rows() == 0) {
			$this->db->set('vote_date', 'NOW()', false)->insert('vote', array(
				'member_id' => $member_id,
				'movie_id' => $id
			));
		}
		return true;
	}
}