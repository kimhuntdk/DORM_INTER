<?php
Class Admin_system_model extends CI_Model{

	public function insert_upload($data){
		$this->db->insert('tbl_file_system',$data);
	}

	public function get_file_system(){
		return $this->db->get('tbl_file_system');
	}

	public function del_file_byID($f_id){
		$this->db->where('f_id',$f_id)
				 ->delete('tbl_file_system');
	}

	public function insert_news($data){
		$this->db->insert('tbl_data_news',$data);
	}

	public function list_news(){
		return $this->db->get('tbl_data_news');
	}

	public function get_news_byID($n_id){
		return $this->db->where('n_id',$n_id)
						->get('tbl_data_news');
	}

	public function update_news($n_id,$data){
		$this->db->where('n_id',$n_id)
				 ->update('tbl_data_news',$data);
	}

	public function del_news_byID($n_id){
		$this->db->where('n_id',$n_id)
				 ->delete('tbl_data_news');
	}

	public function get_setting(){
		return $this->db->where('s_id',1)
						->get('tbl_setting');
	}

	public function update_setting($data){
		$this->db->where('s_id',1)
				 ->update('tbl_setting',$data);
	}

	public function get_genaral(){
		return $this->db->get('tbl_genaral');
	}

	public function update_genaral($g_id,$data){
		$this->db->where('g_id',$g_id)
				 ->update('tbl_genaral',$data);
	}

	public function get_help(){
		return $this->db->where('g_id',2)->get('tbl_genaral');
	}

	public function get_print(){
		return $this->db->where('g_id',6)->get('tbl_genaral');
	}

	public function get_lop(){
		return $this->db->where('g_id',7)->get('tbl_genaral');
	}

	public function get_about(){
		return $this->db->where('g_id',4)->get('tbl_genaral');
	}

	public function get_contact(){
		return $this->db->where('g_id',3)->get('tbl_genaral');
	}

	public function get_unit_water(){
		return $this->db->where('u_id','1')
						->get('tbl_unit_meter');
	}

	public function get_unit_elec(){
		return $this->db->where('u_id','2')
						->get('tbl_unit_meter');
	}

	public function update_water($data){
		$this->db->where('u_id','1')
				 ->update('tbl_unit_meter',$data);
	}

	public function update_elec($data){
		$this->db->where('u_id','2')
				 ->update('tbl_unit_meter',$data);
	}

}