<?php
Class Admin_report extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('admin_report_model');
	}

	public function report_register(){
		$q = "";
		if(@$_COOKIE['level'] == 1){
			$m_code = $_COOKIE['m_code'];
			$q = $this->admin_report_model->get_manager_onus($m_code);
		}else if(@$_COOKIE['level'] == 0){
			$q = $this->admin_report_model->get_dorm();
		}
		$data = array(
			'rs_dorm' => $q->result()
		);
		$this->load->view('admin/report-register',$data);
	}

	public function search_register(){

		$date_start = $_GET['date_start'];
		$date_end = $_GET['date_end'];
		$d_id = $_GET['d_id'];

			$sql = "SELECT * FROM tbl_register_dorm WHERE ";
			if($date_start != ""){
				$sql .= " re_date_success BETWEEN '$date_start' AND '$date_end' ";
				if($date_end != ""){
					$sql .= " AND re_date_success BETWEEN '$date_start' AND '$date_end' ";
				}
				if($d_id != ""){
					if($d_id != '0'){
						$sql .= " AND d_id = '$d_id' ";
					}
				}
			}else if($date_end != ""){
				$sql .= " re_date_success BETWEEN '$date_start' AND '$date_end' ";
				if($d_id != ""){
					if($d_id != "0"){
						$sql .= " AND d_id = '$d_id' ";
					}
				}
			}else if($d_id != ""){
				if($d_id != '0'){
					$sql .= " d_id = '$d_id' ";
				}
			}

			$sql .= " AND re_status = '1' ";

			$q = "";
			if(@$_COOKIE['level'] == 1){
				$m_code = $_COOKIE['m_code'];
				$q = $this->admin_report_model->get_manager_onus($m_code);
			}else if(@$_COOKIE['level'] == 0){
				$q = $this->admin_report_model->get_dorm();
			}

			$q2 = $this->db->query($sql);
			$data = array(
				'rs' => $q2->result(),
				'rs_dorm' => $q->result()
			);

			$this->load->view('admin/report-register',$data);
		

		
	}

}