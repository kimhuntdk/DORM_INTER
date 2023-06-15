<?php
Class Admin_profile_model extends CI_Model{

	public function get_profile_byID($m_code){
		return $this->db->where('m_code',$m_code)
						->get('tbl_manager');
	}

	public function update_profile($m_id,$data){
		$this->db->where('m_id',$m_id)
				 ->update('tbl_manager',$data);
	}

	public function ch_old_pass($m_code,$old_password){
		$q = $this->db->where('m_code',$m_code)
						->where('m_password',$old_password)
						->get('tbl_manager');
		$row = $q->num_rows();
		return $row;
	}

	public function update_password($m_code,$data){
		$this->db->where('m_code',$m_code)
				 ->update('tbl_manager',$data);
	}

}