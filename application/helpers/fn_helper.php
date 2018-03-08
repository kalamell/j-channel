<?php

getVote($member_id)
{
	$ci =& get_instance();
	$sql = "SELECT *,(SELECT COUNT(vote_id) FROM vote WHERE vote.movie_id = movie.movie_id AND vote.member_id = ?) FROM movie";
	$rs = $ci->db->query($sql, array($member_id));

	return $rs->result();
}