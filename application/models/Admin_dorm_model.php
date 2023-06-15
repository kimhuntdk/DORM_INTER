<?php
Class Admin_dorm_model extends CI_Model{

	public function get_dorm1(){
		return $this->db->where('d_position','ม.เก่า')
						->get('tbl_dorm');
	}

	public function get_dorm2(){
		return $this->db->where('d_position','ม.ใหม่')
						->get('tbl_dorm');
	}

	public function get_male_dorm1(){
		$data = array(
			'd_position' => 'ม.เก่า',
			'd_type_gender' => 'male'
		);
		return $this->db->where($data)
						->get('tbl_dorm');
	}

	public function get_female_dorm1(){
		$data = array(
			'd_position' => 'ม.เก่า',
			'd_type_gender' => 'female'
		);
		return $this->db->where($data)
						->get('tbl_dorm');
	}

	public function get_male_dorm2(){
		$data = array(
			'd_position' => 'ม.ใหม่',
			'd_type_gender' => 'male'
		);
		return $this->db->where($data)
						->get('tbl_dorm');
	}

	public function get_female_dorm2(){
		$data = array(
			'd_position' => 'ม.ใหม่',
			'd_type_gender' => 'female'
		);
		return $this->db->where($data)
						->get('tbl_dorm');
	}

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
			$url_image_view = $value->url_image_view;
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
				'url_image_view' => $url_image_view,
				'd_status_meter' => $d_status_meter
			);
			return $data;
		}
	}

	public function update_dorm($d_id,$data){
		$this->db->where('d_id',$d_id)
				 ->update('tbl_dorm',$data);
	}

	public function delete_dorm($d_id){
		$this->db->where('d_id',$d_id)
				 ->delete('tbl_dorm');
	}

	public function get_where_room($d_side){
		return $this->db->where('d_side',$d_side)
						->get('tbl_class_dorm');
	}

	public function get_all_dorm(){
		return $this->db->get('tbl_dorm');
	}

	public function get_class_byID($d_id,$c_status){
		return $this->db->where('d_id',$d_id)
						->where('c_status',$c_status)
						->get('tbl_class_dorm');
	}

	public function check_code_room($d_id,$c_code){
		$q = $this->db->where('d_id',$d_id)
					  ->where('c_code',$c_code)
					  ->get('tbl_class_dorm');
		$row = $q->num_rows();
		return $row;
	}

	public function dataItem($d_id){
		return $this->db->where('d_id',$d_id)->get('tbl_class_dorm');
	}

	public function get_delete_all($d_id,$c_code){
		$this->db->where('d_id',$d_id)
				 ->where('c_code',$c_code)
				 ->delete('tbl_class_dorm');
	}

	public function delete_byId($d_id,$c_code){
		$this->db->where('d_id',$d_id)
				 ->where('c_code',$c_code)
				 ->delete('tbl_class_dorm');
	}


}