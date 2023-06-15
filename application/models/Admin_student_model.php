<?php
Class Admin_student_model extends CI_Model{

	public function get_register(){
		return $this->db->where('re_status','0')
						->get('tbl_register_dorm');
	}

	public function del_register_byID($re_id,$c_id){
		
		$this->db->where('re_id',$re_id)
				 ->delete('tbl_register_dorm');

		$q = $this->db->where('c_id',$c_id)
					  ->get('tbl_register_dorm');
		$row=$q->num_rows();

		if($row == 0){
			$data3 = array('c_status' => 1);
		}else{
			$data3 = array('c_status' => 0);
		}

		$this->db->where('c_id',$c_id)
				 ->update('tbl_class_dorm',$data3);


	}

	public function del_register($re_code){
		$this->db->where('re_code',$re_code)
				 ->delete('tbl_register_dorm');
	}

	public function update_checkIn($c_id,$re_code,$data){
		$this->db->where('re_code',$re_code)
				 ->update('tbl_register_dorm',$data);

		$data2 = array('c_status' => '0');
		$this->db->where('c_id',$c_id)
				 ->update('tbl_class_dorm',$data2);
	}

	public function get_facuty(){
		return $this->db->get('tbl_facuty');
	}

	public function save_other_student($re_code,$data){
		$q = $this->db->where('re_code',$re_code)
					  ->get('tbl_register_dorm');
		$row = $q->num_rows();
		if($row == 0){
			$this->db->insert('tbl_register_dorm',$data);
		}
	}

	public function get_dorm($re_gender){
		return $this->db->where('d_type_gender',$re_gender)
						->get('tbl_dorm');
	}

	public function change_move_room($old_c_id,$re_time,$re_id,$data){
		$this->db->where('re_id',$re_id)
				 ->update('tbl_register_dorm',$data);

		$q = $this->db->where('c_id',$old_c_id)
					  ->get('tbl_register_dorm');
		$row=$q->num_rows();

		
		if($row == 0){
			$data3 = array('c_status' => 1);
		}else{
			$data3 = array('c_status' => 0);
		}
		

		$this->db->where('c_id',$old_c_id)
				 ->update('tbl_class_dorm',$data3);

		$data2 = array('c_status' => 0);
		$this->db->where('c_id',$data['c_id'])
				 ->update('tbl_class_dorm',$data2);

		
	}

	public function get_student_byID($re_id){
		return $this->db->where('re_id',$re_id)
						->get('tbl_register_dorm');
	}

	public function update_student($re_id,$data){
		$this->db->where('re_id',$re_id)
				 ->update('tbl_register_dorm',$data);
	}

}