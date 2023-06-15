<?php
Class Employee_model extends CI_Model{

	public function get_dorm(){
		return $this->db->get('tbl_dorm');
	}

	public function check_code($m_code){
		$q = $this->db->where('m_code',$m_code)
						->get('tbl_manager');
		$row = $q->num_rows();
		return $row;
	}

	public function check_user($m_username){
		$q = $this->db->where('m_username',$m_username)
						->get('tbl_manager');
		$row = $q->num_rows();
		return $row;
	}

	public function insert_employee($data){
		$this->db->insert('tbl_manager',$data);
	}

	public function get_manager(){
		return $this->db->where('m_level',1)
						->get('tbl_manager');
	}

	public function get_manager_byID($m_id){
		return $this->db->where('m_id',$m_id)
						->get('tbl_manager');
	}

	public function insert_onus($data){
		$this->db->insert('tbl_onus',$data);
	}

	public function get_onus_byID($m_code,$d_id){
		return $this->db->where('m_code',$m_code)
						->where('d_id',$d_id)
						->get('tbl_onus');
	}

	public function del_onus_byID($m_code){
		$this->db->where('m_code',$m_code)
				 ->delete('tbl_onus');
	}

	public function del_manager_byID($m_id){
		$this->db->where('m_id',$m_id)
				 ->delete('tbl_manager');
	}

	public function update_employee($m_id,$data){
		$this->db->where('m_id',$m_id)
				 ->update('tbl_manager',$data);
	}

	public function get_onus($m_code){
		return $this->db->where('m_code',$m_code)
						->get('tbl_onus');
	}

	public function update_onus_byId($d_id,$data){
		$this->db->where('d_id',$d_id)
				 ->update('tbl_dorm',$data);
	}

	public function create_password($m_code,$data){
		$this->db->where('m_code',$m_code)
				 ->update('tbl_manager',$data);
	}

}