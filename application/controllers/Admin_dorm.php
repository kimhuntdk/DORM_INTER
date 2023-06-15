<?php
date_default_timezone_set("Asia/Bangkok");
Class Admin_dorm extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_dorm_model');
		$this->load->model('admin_room_model');
		$this->load->model('employee_model');
	}

	public function list_dorm(){

		if(@$_COOKIE['level'] == 0){
			$dorm1 = $this->admin_dorm_model->get_dorm1();
			$dorm2 = $this->admin_dorm_model->get_dorm2();

			$male_dorm1 = $this->admin_dorm_model->get_male_dorm1();
			$female_dorm1 = $this->admin_dorm_model->get_female_dorm1();

			$male_dorm2 = $this->admin_dorm_model->get_male_dorm2();
			$female_dorm2 = $this->admin_dorm_model->get_female_dorm2();

			$row_dorm1 = $dorm1->num_rows();
			$row_dorm2 = $dorm2->num_rows();
			$data = array(
				'row_dorm1' => $row_dorm1,
				'row_dorm2' => $row_dorm2,
				'result_male1' => $male_dorm1->result(),
				'result_female1' => $female_dorm1->result(),
				'result_male2' => $male_dorm2->result(),
				'result_female2' => $female_dorm2->result()
			);
		}else{
			$q = $this->admin_dorm_model->get_all_dorm();
			$row = $q->num_rows();
			$data = array(
				'rs' => $q->result(),
				'row' => $row
			);
		}

		$this->load->view('admin/list-dorm',$data);

	}

	public function class_dorm(){

		if(!empty($_GET['d_id'])){

			$d_id = base64_decode($_GET['d_id']);
			$q = $this->admin_dorm_model->get_where_dorm($d_id);

			$data = array(
				'rs_dorm' => $q
			);
			$this->load->view('admin/class-dorm',$data);	
		}
		
	}

	public function edit_dorm(){

		$d_id = base64_decode($_GET['d_id']);
		$result = $this->admin_dorm_model->get_where_dorm($d_id);

		$data = array(
			'result' => $result
		);
		$this->load->view('admin/edit-dorm',$data);

	}

	public function update_dorm(){

		$d_id = $_POST['d_id'];
		$data = array(
			'd_name' => $_POST['d_name'],
			'd_number_bed' => $_POST['d_number_bed'],
			'd_type' => $_POST['d_type'],
			'd_price' => $_POST['d_price'],
			'd_location' => $_POST['d_location'],
			'd_position' => $_POST['d_position'],
			'd_type_gender' => $_POST['d_type_gender'],
			'url_image_view' => $_POST['url_image_view'],
			'd_side' => $_POST['d_side'],
			'd_bathroom' => $_POST['d_bathroom']
		);

		$this->admin_dorm_model->update_dorm($d_id,$data);
		//header("location: admin-edit-dorm?d_id=".base64_encode($d_id));
		echo "<script>window.history.back();</script>";

	}

	public function delete_dorm(){

		$d_id = base64_decode($_GET['d_id']);
		$this->admin_dorm_model->delete_dorm($d_id);
		header("location: admin-list-dorm");

	}

	public function add_room(){

		if(!empty($_GET['d_id'])){
			$d_id = base64_decode($_GET['d_id']);
			$q = $this->admin_dorm_model->get_where_dorm($d_id);

			$data = array(
				'rs_dorm' => $q
			);
			$this->load->view('admin/add-room',$data);
		}

	}

	public function insert_room(){

		if(!empty($_POST)){
			$data = array(
				'd_id' => $_POST['d_id'],
				'c_code' => $_POST['c_code'],
				'c_bed' => $_POST['c_bed'],
				'c_status' => $_POST['c_status']
			);

			$check_data = array(
				'c_code' => $_POST['c_code'],
				'd_id' => $_POST['d_id']
			);
			$q=$this->admin_room_model->check_room($check_data);
			$row = $q->num_rows();

			if($row == 0){
				$this->admin_room_model->insert_room($data);
			}
			$d_id = base64_encode($data['d_id']);
			header("location: admin-class-dorm?d_id=".$d_id);
		}

	}

	public function data_room(){

		if(!empty($_GET['c_id'])){

			$c_id = base64_decode($_GET['c_id']);
			$room = $this->admin_room_model->get_room($c_id);
			$student = $this->admin_room_model->get_student($c_id);

			$data = array(
				'result' => $room->result(),
				'student' => $student->result(),
				'row_student' => $student->num_rows()
			);
			$this->load->view('admin/data-room',$data);
		}

	}

	public function get_where_room($d_side){
		$q = $this->admin_dorm_model->get_where_room($d_side);
	}

	public function update_room(){
		if(!empty($_POST)){
			$c_id = $_POST['c_id'];
			$d_id = base64_encode($_POST['d_id']);
			$data = array(
				'c_code' => $_POST['c_code'],
				'c_bed' => $_POST['c_bed'],
				'c_status' => $_POST['c_status']
			);
			$this->admin_room_model->update_room($c_id,$data);
			header("location: admin-class-dorm?d_id=".$d_id);
		}
	}

	public function del_room_byID(){
		if(!empty($_GET['c_id'])){
			$c_id = base64_decode($_GET['c_id']);
			$d_id = $_GET['d_id'];
			$this->admin_room_model->del_room_byID($c_id);
			header("location: admin-class-dorm?d_id=".$d_id);
		}
	}

	public function import_room(){
		//if(!empty($_FILES['fileEx']['name'])){

		 	$inputFileName = $_FILES['fileEx']['tmp_name'];
			require_once 'PHPExcel/Classes/PHPExcel.php';
			include 'PHPExcel/Classes/PHPExcel/IOFactory.php';
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setReadDataOnly(true);
			$objPHPExcel = $objReader->load($inputFileName); 

			$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
			$highestRow = $objWorksheet->getHighestRow();
			$highestColumn = $objWorksheet->getHighestColumn();

			$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
			$headingsArray = $headingsArray[1];

			$r = -1;
			$namedDataArray = array();
			for ($row = 2; $row <= $highestRow; ++$row) {
			    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
			    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
			        ++$r;
			        foreach($headingsArray as $columnKey => $columnHeading) {
			            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
			        }
			    }
			}

			$d_id = base64_decode($_POST['d_id']);
			foreach ($namedDataArray as $result) {

				if(@$result['CODE'] == ""){
					echo "Null";
				}else{
					$data = array(
						'c_code' => @$result['CODE'],
						'c_bed' => @$result['BED'],
						'd_id' => $d_id,
						'c_status' => @$result['STATUS']
					);

					$row_ = $this->admin_dorm_model->check_code_room($d_id,$result['CODE']);

					if($row_ == 0){
						$this->admin_room_model->insert_room($data);
					}
					
				}

			}

			header("location: admin-class-dorm?d_id=".$_POST['d_id']);

		// }else{
		// 	header("location: admin-class-dorm?d_id=".$_POST['d_id']);
		// }
	}

	public function dataItem(){
		if(!empty($_POST)){
			$d_id = base64_decode($this->input->post('d_id'));
			$q = $this->admin_dorm_model->dataItem($d_id);
			$data = array(
				'rs' => $q->result(),
				'row' => $q->num_rows()
			);
			$this->load->view('admin/data-item',$data);
		}
		
	}

	public function deleteAll(){
		if(!empty($_POST)){
			$d_id = $this->input->post('d_id');
			foreach ($this->input->post('selected') as $key => $value) {
				$this->admin_dorm_model->get_delete_all($d_id,$value);
			}
		}
	}

	public function delete_byId(){
		if(!empty($_POST)){
			$d_id = $this->input->post('d_id');
			$c_code = $this->input->post('c_code');
			$this->admin_dorm_model->delete_byId($d_id,$c_code);
		}
	}

}