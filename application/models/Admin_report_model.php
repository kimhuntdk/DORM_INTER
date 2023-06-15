<?php
Class Admin_report_model extends CI_Model{

	public function get_manager_onus($m_code){
		return $this->db->where('m_code',$m_code)
						->get('tbl_onus');
	}

	public function get_dorm(){
		return $this->db->get('tbl_dorm');
	}

}