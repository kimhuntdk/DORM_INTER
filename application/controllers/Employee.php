<?php
date_default_timezone_set("Asia/Bangkok");
Class Employee extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('employee_model');
		$this->load->library('../controllers/provider');
	}

	public function list_employee(){
		$q = $this->employee_model->get_manager();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('employee/list-employee',$data);
	}

	public function add_employee(){

		$q = $this->employee_model->get_dorm();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('employee/add-employee',$data);

	}

	public function check_error($text){

		$error = "<br><div class='alert alert-danger'>";
		$error .= "<i class='fa fa-question-circle'></i> ";
		$error .= $text;
		$error .= "</div>";

		$q = $this->employee_model->get_dorm();
		$data = array(
			'error' => $error,
			'rs' => $q->result()
		);
		$this->load->view('employee/add-employee',$data);

	}

	public function save_employee(){

		if(!empty($_POST)){

			$m_code = $_POST['m_code'];
			$m_fullname = $_POST['m_fullname'];
			$m_position = $_POST['m_position'];
			$m_username = $_POST['m_username'];
			$m_password = $_POST['m_password'];
			$m_re_password = $_POST['m_re_password'];

			$row_code = $this->employee_model
							   ->check_code($m_code);

			$row_user = $this->employee_model
				               ->check_user($m_username);

			foreach (@$_POST['d_id'] as $key => $value) {
				$d_id = @$_POST['d_id'][$key];
				$data = array(
					'm_code' => $m_code,
					'd_id' => $d_id
				);
				$this->employee_model->insert_onus($data);
			}

			if($row_code > 0){
				
				$text = "รหัสเจ้าหน้าที่ <strong>$m_code</strong> ไม่สามารถบันทึกได้";
				$this->check_error($text);

			}
			else if($row_user > 0){
				$text = "Username <strong>$m_username</strong> ไม่สามารถบันทึกได้";
				$this->check_error($text);
			}
			else if($m_password != $m_re_password){
				$text = "Password ไม่ตรงกัน ไม่สามารถบันทึกได้";
				$this->check_error($text);
			}else{

				if($_FILES['m_profile']['name'] != ""){
					$m_profile = $_FILES['m_profile']['name'];
					$tmp = $_FILES['m_profile']['tmp_name'];
					move_uploaded_file($tmp, "images-manager/".$m_profile);
				}else{
					$m_profile = "";
				}

				$data = array(
					'm_profile' => $m_profile,
					'm_code' => $m_code,
					'm_fullname' => $m_fullname,
					'm_position' => $m_position,
					'm_username' => $m_username,
					'm_password' => md5(md5(md5(md5(md5($m_password))))),
					'm_level' => 1
				);

				$this->employee_model->insert_employee($data);
				header("location: admin-list-employee");
			}

		}else{
			$q = $this->employee_model->get_dorm();
			$data = array(
				'rs' => $q->result()
			);
			$this->load->view('employee/add-employee',$data);
		}

	}

	public function edit_employee(){
		if(!empty($_GET)){
			$m_id = base64_decode($_GET['m_id']);

			$edit = $this->employee_model->get_manager_byID($m_id);
			$edit = $edit->result();
			$q = $this->employee_model->get_dorm();
			$data = array(
				'rs' => $q->result(),
				'result' => $edit[0]
			);
			$this->load->view('employee/edit-employee',$data);
		}
	}

	public function update_employee(){
		if(!empty($_POST)){

			$m_id = $_POST['m_id'];
			$m_code = $_POST['m_code'];
			$m_fullname = $_POST['m_fullname'];
			$m_position = $_POST['m_position'];

			if(@$_POST['m_status_meter'] == ''){
				$m_status_meter = 'false';
				$q = $this->employee_model->get_onus($m_code);
				foreach ($q->result() as $key => $value) {
					$d_id = $value->d_id;
					$data = array(
						'd_status_meter' => 'false'
					);
					$this->employee_model->update_onus_byId($d_id,$data);
				}
			}else{

				$m_status_meter = $_POST['m_status_meter'];
				$q = $this->employee_model->get_onus($m_code);
				foreach ($q->result() as $key => $value) {
					$d_id = $value->d_id;
					$data = array(
						'd_status_meter' => 'true'
					);
					$this->employee_model->update_onus_byId($d_id,$data);
				}
			}

			if($_FILES['m_profile']['name'] != ""){
				$m_profile = $_FILES['m_profile']['name'];
				$tmp = $_FILES['m_profile']['tmp_name'];
				move_uploaded_file($tmp, "images-manager/".$m_profile);
			}else{
				$m_profile = $_POST['old_profile'];
			}

			$data = array(
				'm_profile' => $m_profile,
				'm_fullname' => $m_fullname,
				'm_position' => $m_position,
				'm_status_meter' => $m_status_meter
			);

			$this->employee_model->update_employee($m_id,$data);

			$this->employee_model->del_onus_byID($m_code);

			foreach ($_POST['d_id'] as $key => $value) {
				$d_id = $_POST['d_id'][$key];

				$data = array(
					'd_id' => $d_id,
					'm_code' => $m_code
				);
				$this->employee_model->insert_onus($data);
				
			}

			if($this->input->post('new_password') != ""){
				$new_password = $this->input->post('new_password');
				$data_pass = array(
					'm_password' => md5(md5(md5(md5(md5($new_password)))))
				);
				$this->employee_model->create_password($m_code,$data_pass);
			}

			header("location: edit-employee?m_id=".base64_encode($m_id));

		}
	}

	public function del_manager_byID($m_id){
		if(!empty($_GET)){
			$m_id = base64_decode($_GET['m_id']);
			$this->employee_model->del_manager_byID($m_id);
			header("location: admin-list-employee");
		}
	}

}