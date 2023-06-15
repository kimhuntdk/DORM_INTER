<?php
Class Admin_meter_model extends CI_Model{
	public function get_where_dorm($d_id){
		$q = $this->db->where('d_id',$d_id)
						->get('tbl_dorm');
		$result = $q->result();
		foreach ($result as $key => $value) {
			$d_id = $value->d_id;
			$d_name = $value->d_name;
			$d_number_bed = $value->d_number_bed;
			$d_type = $value->d_type;
			$d_price = $value->d_price;
			$d_location = $value->d_location;
			$d_position = $value->d_position;
			$d_type_gender = $value->d_type_gender;
			$d_number_dorm = $value->d_number_dorm;
			$d_side = $value->d_side;
			$d_bathroom = $value->d_bathroom;
			$d_status_meter = $value->d_status_meter;
			$data = array(
				'd_id' => $d_id,
				'd_name' => $d_name,
				'd_number_bed' => $d_number_bed,
				'd_type' => $d_type,
				'd_price' => $d_price,
				'd_location' => $d_location,
				'd_position' => $d_position,
				'd_type_gender' => $d_type_gender,
				'd_number_dorm' => $d_number_dorm,
				'd_side' => $d_side,
				'd_bathroom' => $d_bathroom,
				'd_status_meter' => $d_status_meter
			);
			return $data;
		}
	}

	public function get_student($d_id){
		return $this->db->where('re_status','1')
					    ->where('d_id',$d_id)
					    ->group_by('re_time')
					    ->get('tbl_register_dorm');
	}

	public function get_unit($u_id){
		return $this->db->where('u_id',$u_id)
						->get('tbl_unit_meter');
	}

	public function save_meter($data){
		$this->db->insert('tbl_meter',$data);
	}

	public function get_meter_byId($me_id){
		return $this->db->where('me_id',$me_id)
						->get('tbl_meter');
	}

	public function pay_meter($me_id,$data){
		$this->db->where('me_id',$me_id)
				 ->update('tbl_meter',$data);
	}

	public function get_data_pay($c_id,$d_id){
		return $this->db->where('c_id',$c_id)
						->where('d_id',$d_id)
						->get('tbl_meter');
	}
}