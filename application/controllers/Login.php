<?php
date_default_timezone_set("Asia/Bangkok");
Class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('../controllers/provider');
		$this->load->helper('url');
	}

	public function frm_login(){
		if(@$_COOKIE['level'] == ''){
			$this->load->view('login');
		}else{
			header("location: admin-list-student");
		}
	}

	public function check_login(){

		if($this->input->post() != ""){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$chek = array(
				'm_username' => $username,
				'm_password' => md5(md5(md5(md5(md5($password)))))
			);
			$q = $this->login_model->get_manager($chek);
			$row = $q->num_rows();

			if($row > 0){
				$result = $q->result();
				foreach ($result as $key => $value) {
					$m_code = $value->m_code;
					$m_id = $value->m_id;
					$m_level = $value->m_level;
					$m_username = $value->m_username;
					$m_password = $value->m_password;
					$sc = md5($m_username.$m_password.$m_code);
					$time = time()+3600*24*365;
					setcookie('level',$m_level,$time);
					setcookie('m_id',$m_id,$time);
					setcookie('m_code',$m_code,$time);
					setcookie('sc',$sc,$time);
					
					if($m_level == 0){
						header("location: admin-list-student");
					}else if($m_level == 1){
						header("location: admin-list-student");
					}
				}
			}else{
				$error = "<div class='alert alert-danger'>";
				$error .= "<i class='fa fa-exclamation'></i> ";
				$error .= "Username หรือ Password ไม่ถูกต้อง";
				$error .= "</div>";
				$data = array(
					'error' => $error
				);
				$this->load->view('login',$data);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function check_logout(){

		setcookie("level", "", 1);
		setcookie("m_code", "", 1);
		setcookie("m_id", "", 1);
		setcookie("sc", "", 1);
		header("location: backend-login");
	}

}