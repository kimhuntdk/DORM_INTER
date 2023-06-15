<?php
date_default_timezone_set("Asia/Bangkok");
Class Admin_system extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_system_model');
	}

	public function help_register(){
		$q = $this->admin_system_model->get_help();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/help-register',$data);
	}

	public function help_print(){
		$q = $this->admin_system_model->get_print();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/help-print',$data);
	}

	public function help_lop(){
		$q = $this->admin_system_model->get_lop();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/help-lop',$data);
	}

	public function about(){
		$q = $this->admin_system_model->get_about();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/about',$data);
	}

	public function contact(){
		$q = $this->admin_system_model->get_contact();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/contact',$data);
	}

	public function setting(){
		$q = $this->admin_system_model->get_setting();
		$q2 = $this->admin_system_model->get_unit_water();
		$q3 = $this->admin_system_model->get_unit_elec();
		$data = array(
			'rs' => $q->result(),
			'water' => $q2->result(),
			'elec' => $q3->result()
		);
		$this->load->view('system/setting',$data);
	}

	public function update_setting(){
		if(!empty($_POST)){
			$s_status = $_POST['s_status'];
			$day_start = $_POST['day_start'];
			$day_stop = $_POST['day_stop'];
			$alert_text = $_POST['alert_text'];

			if($_POST['u_water_all'] == 0){
				$u_water_status = 'false';
			}else{
				$u_water_status = 'true';
			}

			if($_POST['u_elec_all'] == 0){
				$u_elec_status = 'false';
			}else{
				$u_elec_status = 'true';
			}

			$data1 = array(
				'u_price' => $_POST['u_water'],
				'u_price_all' => $_POST['u_water_all'],
				'u_status' => $u_water_status
			);
			$this->admin_system_model->update_water($data1);


			$data2 = array(
				'u_price' => $_POST['u_elec'],
				'u_price_all' => $_POST['u_elec_all'],
				'u_status' => $u_elec_status
			);
			$this->admin_system_model->update_elec($data2);

			if($s_status == 'true'){
				$status = 1;
			}else{
				$status = 0;
			}
			$data = array(
				's_status' => $status,
				'day_start' => $day_start,
				'day_stop' => $day_stop,
				'alert_text' => $alert_text
			);
			$this->admin_system_model->update_setting($data);
			header("location: setting");
		}
	}

	public function list_news(){
		$q = $this->admin_system_model->list_news();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/list-news',$data);
	}

	public function add_news(){
		$this->load->view('system/add-news');
	}

	public function save_news(){
		if(!empty($_POST)){
			$data_news = $_POST['data_news'];
			$data = array(
				'data_news' => $data_news,
				'n_date' => date("Y-m-d")
			);
			$this->admin_system_model->insert_news($data);
		}
	}

	public function edit_news(){
		if(!empty($_GET['n_id'])){
			$n_id = base64_decode($_GET['n_id']);
			$q = $this->admin_system_model
					  ->get_news_byID($n_id);
			$data = array(
				'rs' => $q->result()
			);
			$this->load->view('system/edit-news',$data);
		}
	}

	public function update_news(){
		if(!empty($_POST)){
			$n_id = $_POST['n_id'];
			$data_news = $_POST['data_news'];
			$data = array(
				'data_news' => $data_news
			);
			$this->admin_system_model
				 ->update_news($n_id,$data);
			
		}
	}

	public function del_news_byID(){
		if(!empty($_GET['n_id'])){
			$n_id = base64_decode($_GET['n_id']);
			$this->admin_system_model->del_news_byID($n_id);
			header("location: list-news");
		}
	}

	public function data_genaral(){
		$q = $this->admin_system_model->get_genaral();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/data-genaral',$data);
	}

	public function update_genaral(){
		if(!empty($_POST)){

			foreach ($_POST['g_data'] as $key => $value) {
				$g_data = $_POST['g_data'][$key];
				$g_id = $_POST['g_id'][$key];
				$data = array(
					'g_data' => $g_data
				);
				$this->admin_system_model->update_genaral($g_id,$data);
				header("location: data-genaral");
			}

		}
	}

	

	public function file_manager(){
		$q = $this->admin_system_model->get_file_system();
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('system/file-manager',$data);
	}

	public function upload(){
		$this->load->view('modal/modal-upload');
	}

	public function save_upload(){

		header('Content-Type: text/html; charset=utf-8');
		foreach ($_FILES['file']['name'] as $key => $value) {
			$path = "file-system/";
			$file = $_FILES['file']['name'][$key];
			$tmp = $_FILES['file']['tmp_name'][$key];
			$f_date = date("Y-m-d");
			$data = array(
				'f_name' => $file,
				'f_date' => $f_date
			);
			if(move_uploaded_file($tmp, $path.$file)){
				$this->admin_system_model
					 ->insert_upload($data);
					 header("location: file-manager");
			}
			
		}
	}

	public function del_file_byID(){
		if(!empty($_GET)){
			$f_id = base64_decode($_GET['f_id']);
			$this->admin_system_model->del_file_byID($f_id);
			header("location: file-manager");
		}
	}


}