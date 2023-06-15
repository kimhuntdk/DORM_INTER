<?php
Class Register_model extends CI_Model{

	public function check_register($re_code){
		$c = $this->db->where('re_code',$re_code)
					  ->get('tbl_register_dorm');
		$row = $c->num_rows();
		return $row;
	}

	public function insert_register($data){
		$this->db->insert('tbl_register_dorm',$data);
	}

	public function search_register($data){
		return $this->db->or_like($data)
						->join('tbl_dorm','tbl_register_dorm.d_id=tbl_dorm.d_id')
						->get('tbl_register_dorm');
	}

	public function convert_date($date){

		$thai_month_arr_short=array("0"=>"","1"=>"ม.ค.","2"=>"ก.พ.","3"=>"มี.ค.","4"=>"เม.ย.","5"=>"พ.ค.","6"=>"มิ.ย.","7"=>"ก.ค.","8"=>"ส.ค.","9"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");

		$thai_date_return = "";
	    $thai_date_return.=date("j",$date);
	    $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$date)];
	    $thai_date_return.= " ".(date("Y",$date)+543);
	    return $thai_date_return;

	}

}