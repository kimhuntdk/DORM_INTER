<?php
Class Dorm_model extends CI_Model{

	public function up_status_dorm($data,$d_id){
		$this->db->where('d_id',$d_id)
				 ->update('tbl_dorm',$data);
	}

}