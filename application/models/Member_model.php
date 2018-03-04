<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function checkUser($data = array()) {
		if (count($data)>0) {
			$rs = $this->db->where(arary(
				'provider' => $data['provider'],
				'uid' => $data['uid'],
			))->get('member');

			if ($rs->num_rows() == 0) {
				$this->db->set('created_date', 'NOW()', false)->insert('member', array(
					'provider' => $data['provider'],
					'uid' => $data['uid'],
					'email' => $data['email'],
					'firstname' => $data['firstname'],
					'lastname' => $data['lastname'],
					'gender' => $data['gender'],
					'locale' => $data['locale'],
					'profile_url' => $data['profile_url'],
					'picture_url' => $data['picture_url'], 
					'ip' => $this->input->ip_address(),
				));
				$this->session->set_userdata('id', $this->db->insert_id());
				
			} else {
				$this->db->set('updated_date', 'NOW()', false)->where('id', $rs->row()->id)->update('member', array(
					'email' => $data['email'],
					'firstname' => $data['firstname'],
					'lastname' => $data['lastname'],
					'gender' => $data['gender'],
					'locale' => $data['locale'],
					'profile_url' => $data['profile_url'],
					'picture_url' => $data['picture_url'], 
				));
				$this->session->set_userdata('id', $rs->row()->id);
			}

			return true;
		}

		return false;
	}
}