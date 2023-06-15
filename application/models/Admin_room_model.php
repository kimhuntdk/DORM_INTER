<?php
Class Admin_room_model extends CI_Model{

	public function insert_room($data){
		$this->db->insert('tbl_class_dorm',$data);
	}

	public function check_room($data){
		return $this->db->where($data)
						->get('tbl_class_dorm');
	}

	public function get_room($c_id){
		return $this->db->where('c_id',$c_id)
					  ->join('tbl_dorm','tbl_dorm.d_id=tbl_class_dorm.d_id')
					  ->get('tbl_class_dorm');

	}

	public function update_room($c_id,$data){
		$this->db->where('c_id',$c_id)
				 ->update('tbl_class_dorm',$data);
	}

	public function get_student($c_id){
		return $this->db->where('c_id',$c_id)
						->join('tbl_facuty','tbl_facuty.fac_id=tbl_register_dorm.fac_id')
						->get('tbl_register_dorm');
	}

	public function del_room_byID($c_id){
		$this->db->where('c_id',$c_id)
				 ->delete('tbl_class_dorm');
	}

	public function import_room($data){
		$this->db->insert('tbl_class_dorm',$data);
	}

}