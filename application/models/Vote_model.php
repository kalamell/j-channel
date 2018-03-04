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
		return true;
	}
}