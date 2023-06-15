<?php
CLass Ajax_model extends CI_Model{

	public function get_facuty(){
		return $this->db->get('tbl_facuty');
	}

	public function get_dorm($type_gender,$position){
		return $this->db->where('d_type_gender',$type_gender)
						->where('d_position',$position)
						->where('rooms_type',2)
						->get('tbl_dorm');
	}

	public function get_search_dorm($keyword){
		return $this->db->like('d_name',$keyword)
					->or_like('d_type',$keyword)
					->or_like('d_location',$keyword)
					->or_like('d_position',$keyword)
					->get('tbl_dorm');
	}


}