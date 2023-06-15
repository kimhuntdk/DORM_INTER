<?php
Class Welcome_model extends CI_Model{

	public function get_setting(){
		return $this->db->where('s_id',1)
						->get('tbl_setting');
	}

	public function get_modal_welcome(){
		return $this->db->where('g_id',1)
						->get('tbl_genaral');
	}

	public function get_news(){
		return $this->db->get('tbl_data_news');
	}

	public function get_data_pay($c_id,$d_id){
		return $this->db->where('c_id',$c_id)
						->where('d_id',$d_id)
						->where('me_status','ยังไม่จ่าย')
						->get('tbl_meter');
	}

	public function get_data_confirm(){
		return $this->db->where('g_id','5')
						->get('tbl_genaral');
	}

	public function get_dorm_byId($d_id){
		return $this->db->where('d_id',$d_id)
	                	//->where('rooms_type','2')
						->get('tbl_dorm');
	}

	public function get_register_dorm($d_id){
		return $this->db->where('d_id',$d_id)
						->where('re_status','1')
						->get('tbl_register_dorm');
	}

	public function get_facuty_byId($fac_id){
		return $this->db->where('fac_id',$fac_id)
						->get('tbl_facuty');
	}

	public function get_dorm(){
		return $this->db->get('tbl_dorm');
	}

	public function get_alert_text(){
		return $this->db->where('s_id','1')->get('tbl_setting');
	}

	public function get_data_dorm($position){
		return $this->db->where('d_position',$position)
		                ->where('rooms_type','2')
						->get('tbl_dorm');
	}

}