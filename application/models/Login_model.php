<?php
Class Login_model extends CI_Model{

	public function get_manager($data){
		return $this->db->where($data)
						->get('tbl_manager');
	}

}