<?php
date_default_timezone_set("Asia/Bangkok");
Class Admin_student extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_student_model');
		$this->load->model('admin_dorm_model');
		$this->load->model('employee_model');
		$this->load->library('../controllers/provider');
	}

	public function list_student(){

		$this->load->view('admin/list-student');
	}

	public function del_register_byID(){

		if(!empty($_GET['re_id'])){

			$c_id = $_GET['c_id'];
			$re_id = base64_decode($_GET['re_id']);

			echo $re_id;
			
			$this->admin_student_model->del_register_byID($re_id,base64_decode($c_id));
			if($_GET['c_data'] == 'c_data'){
				header("location: admin-data-room?c_id=".$c_id);
			}else{
				header("location: admin-list-student");
			}
			
			
		}
	}

	public function del_register(){

		if(!empty($_GET['re_code'])){

			$re_code = base64_decode($_GET['re_code']);
			$this->admin_student_model->del_register($re_code);
			header("location: admin-list-student");

		}

	}

	public function modal_confirm(){

		if(!empty($_POST['d_id'])){
			$d_id = $_POST['d_id'];
			$re_code = $_POST['re_code'];
			$dorm = $this->admin_dorm_model->get_where_dorm($d_id);

			$data = array(
				'rs' => $dorm,
				're_code' => $re_code
			);
			$this->load->view('modal/modal-confirm',$data);
		}
	}

	public function confirm_checkIn(){
		if(!empty($_GET)){
			$re_code = base64_decode($_GET['re_code']);
			$data = array(
				'c_id' => base64_decode($_GET['c_id']),
				're_date_success' => date("Y-m-d"),
				're_status' => '1'
			);
			$this->admin_student_model->update_checkIn($data['c_id'],$re_code,$data);
		}
	}

	public function modal_other_student(){

		$fac = $this->admin_student_model->get_facuty();
		$data = array(
			'facuty' => $fac->result()
		);
		$this->load->view('modal/modal-other-student',$data);
	}

	public function save_other_student(){
		if(!empty($_POST)){
			$data = array(
				're_fname' => $_POST['re_fname'],
				're_lname' => $_POST['re_lname'],
				're_code' => $_POST['re_code'],
				're_level_class' => $_POST['re_level_class'],
				're_gender' => $_POST['re_gender'],
				'fac_id' => $_POST['fac_id'],
				're_subject' => $_POST['re_subject'],
				're_tel' => $_POST['re_tel'],
				're_email' => $_POST['re_email'],
				'd_id' => $_POST['d_id'],
				'c_id' => $_POST['c_id'],
				're_date' => $_POST['re_date'],
				're_date_success' => date("Y-m-d"),
				're_time' => $_POST['re_time'],
				're_status' => $_POST['re_status']
			);
			$this->admin_student_model->save_other_student($data['re_code'],$data);

		}
	}

	public function modal_move_room(){
		if(!empty($_POST['re_gender'])){
			$re_gender = $_POST['re_gender'];
			$q = $this->admin_student_model->get_dorm($re_gender);
			$data = array(
				'result' => $q->result(),
				'd_id' => $_POST['d_id'],
				're_id' => $_POST['re_id'],
				're_time' => $_POST['re_time'],
				'c_id' => $_POST['c_id']
			);
			$this->load->view('modal/modal-move-room',$data);
		}
	}

	public function select_dorm(){
		if(!empty($_POST['d_id'])){
			$d_id = $_POST['d_id'];
			$re_gender = $_POST['re_gender'];

			$dorm = $this->admin_dorm_model->get_where_dorm($d_id);
			$data = array(
				'd_id' => $d_id,
				're_gender' => $re_gender,
				're_id' => $_POST['re_id'],
				'rs' => $dorm,
				're_time' => $_POST['re_time'],
				'c_id' => $_POST['c_id']
			);
			$this->load->view('ajax/select_dorm',$data);
		}
		
	}

	public function change_move_room(){
		if(!empty($_POST)){
			$c_id = base64_decode($_POST['c_id']);
			$d_id = base64_decode($_POST['d_id']);
			$re_id = base64_decode($_POST['re_id']);
			$re_time = $_POST['re_time'];
			$re_date_move = date("Y-m-d");
			$old_d_id = $_POST['old_d_id'];
			$old_c_id = $_POST['old_c_id'];

			$data = array(
				'c_id' => $c_id,
				'd_id' => $d_id,
				're_date_move' => $re_date_move
			);
			$this->admin_student_model
				 ->change_move_room($old_c_id,$re_time,$re_id,$data);
		}
	}

	public function edit_student(){

		if(!empty($_GET['re_id'])){
			$re_id = base64_decode($_GET['re_id']);
			$q = $this->admin_student_model
					  ->get_student_byID($re_id);

			$fac = $this->admin_student_model->get_facuty();
			$data = array(
				'rs' => $q->result(),
				'facuty' => $fac->result()
			);
			$this->load->view('admin/edit-student',$data);
		}

	}

	public function update_student(){
		if(!empty($_POST)){
		
		$c_id = $_POST['c_id'];
		$re_id = $_POST['re_id'];
		$data = array(
			're_fname' => $_POST['re_fname'],
			're_lname' => $_POST['re_lname'],
			're_code' => $_POST['re_code'],
			're_level_class' => $_POST['re_level_class'],
			'fac_id' => $_POST['fac_id'],
			're_subject' => $_POST['re_subject'],
			're_tel' => $_POST['re_tel'],
			're_email' => $_POST['re_email']
		);
		$this->admin_student_model->update_student($re_id,$data);
		header("location: admin-data-room?c_id=".$c_id);
		}
	}

}