<?php
date_default_timezone_set("Asia/Bangkok");
Class Admin_profile extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_profile_model');
	}

	public function profile(){

		if(@$_COOKIE['m_code'] != ''){
			$q = $this->admin_profile_model->get_profile_byID($_COOKIE['m_code'])->result();
			$data = array(
				'profile' => $q[0]
			);
			$this->load->view('profile/profile',$data);
		}

	}

	public function update_profile(){

		if(!empty($_POST)){
			$m_id = $_POST['m_id'];

			if($_FILES['m_profile']['name'] != ""){
				$m_profile = $_FILES['m_profile']['name'];
				$tmp = $_FILES['m_profile']['tmp_name'];
				move_uploaded_file($tmp, "images-manager/".$m_profile);
			}else{
				$m_profile = $_POST['old_profile'];
			}

			$data = array(
				'm_profile' => $m_profile,
				'm_code' => $_POST['m_code'],
				'm_fullname' => $_POST['m_fullname'],
				'm_position' => $_POST['m_position']
			);
			$this->admin_profile_model->update_profile($m_id,$data);
			$this->profile();
		}

	}

	public function reset_password(){
		$this->load->view('profile/edit-password');
	}

	public function error_pass($text){
		$error = "<br><div class='alert alert-danger'>";
		$error .= "<i class='fa fa-close'></i> ";
		$error .= $text;
		$error .= "</div>";

		$data = array(
			'error' => $error
		);
		$this->load->view('profile/edit-password',$data);
		
	}

	public function update_password(){

		if($this->input->post() != ""){
			$m_code = $this->input->post('m_code');
			$old_password = md5(md5(md5(md5(md5($this->input->post('old_password'))))));
			$new_password = $this->input->post('new_password');
			$re_new_password = $this->input->post('re_new_password');

			$row = $this->admin_profile_model
						->ch_old_pass($m_code,$old_password);

			if($row == 0){
				$text = "รหัสผ่านเดิมไม่ถูกต้อง ลองอีกครั้ง";
				$this->error_pass($text);
			}else if($new_password != $re_new_password){
				$text = "รหัสผ่านใหม่ไม่ตรงกัน ลองอีกครั้ง";
				$this->error_pass($text);
			}else if(strlen($new_password) < 5){
				$text = "รหัสผ่านใหม่ Character ไม่ต่ำกว่า 5 อักขระ ลองอีกครั้ง";
				$this->error_pass($text);
			}else{
				$data = array(
					'm_password' => md5(md5(md5(md5(md5($new_password)))))
				);
				$this->admin_profile_model
					 ->update_password($m_code,$data);

				$error = "<br><div class='alert alert-success'>";
				$error .= "<i class='fa fa-check'></i> ";
				$error .= "เปลี่ยนรหัสผ่านเรียบร้อย เพื่อความปลอดภัย กรุณาออกจากระบบแล้วเข้าสู่ระบบใหม่";
				$error .= "</div>";

				$data = array(
					'error' => $error
				);
				$this->load->view('profile/edit-password',$data);

			}
		}else{
			$this->load->view('profile/edit-password');
		}

	}

}