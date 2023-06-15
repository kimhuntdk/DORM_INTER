<?php
date_default_timezone_set("Asia/Bangkok");
Class Admin_meter extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('admin_meter_model');
	}

	public function index(){
		$d_id = base64_decode($_GET['d_id']);
		$q = $this->admin_meter_model->get_where_dorm($d_id);

		$q2 = $this->admin_meter_model->get_student($d_id);
		$data = array(
			'rs_dorm' => $q,
			'rs_student' => $q2->result()
		);
		$this->load->view('admin/meter',$data);
	}

	public function add_meter(){
		$d_id = base64_decode($_GET['d_id']);
		$q = $this->admin_meter_model->get_where_dorm($d_id);

		$q2 = $this->admin_meter_model->get_student($d_id);

		$water = $this->admin_meter_model->get_unit('1');
		$elec = $this->admin_meter_model->get_unit('2');
		$data = array(
			'rs_dorm' => $q,
			'rs_student' => $q2->result(),
			'water' => $water->result(),
			'elec' => $elec->result(),
		);
		$this->load->view('admin/add-meter',$data);
	}

	public function save_meter(){

		$me_date = $_POST['me_date'];
		
		foreach ($_POST['c_id'] as $key => $value) {
			$c_id = $_POST['c_id'][$key];
			$d_id = $_POST['d_id'][$key];

			$water_meter_ago = $_POST['water_meter_ago'][$key];
			$water_number_meter = $_POST['water_number_meter'][$key];
			$water_unit = $_POST['water_unit'][$key];

			$elec_meter_ago = $_POST['elec_meter_ago'][$key];
			$elec_number_meter = $_POST['elec_number_meter'][$key];
			$elec_unit = $_POST['elec_unit'][$key];

			$data = array(
				'c_id' => $c_id,
				'd_id' => $d_id,
				'water_meter_ago' => $water_meter_ago,
				'water_number_meter' => $water_number_meter,
				'water_unit' => $water_unit,
				'status_water' => 'ยังไม่จ่าย',
				'elec_meter_ago' => $elec_meter_ago,
				'elec_number_meter' => $elec_number_meter,
				'elec_unit' => $elec_unit,
				'status_elec' => 'ยังไม่จ่าย',
				'me_date' => $me_date,
				'me_status' => 'ยังไม่จ่าย'
			);
			$this->admin_meter_model->save_meter($data);

		}
		header("location: admin-meter?d_id=".base64_encode($d_id));

	}

	public function pay_meter(){
		$me_id = $_POST['me_id'];
		$me_type = $_POST['me_type'];
		$status = 'จ่ายแล้ว';

		$q = $this->admin_meter_model->get_meter_byId($me_id);
		$rs = $q->result();

		if($rs->status_water == 'ยังไม่จ่าย' and $rs->status_elec == 'จ่ายแล้ว'){
			$me_status = 'จ่ายค่าน้ำ/ไฟแล้ว';
		}
		else if($rs->status_water == 'จ่ายแล้ว' and $rs->status_elec == 'ยังไม่จ่าย'){
			$me_status = 'จ่ายค่าน้ำ/ไฟแล้ว';
		}else{
			$me_status = 'ยังไม่จ่าย';
		}

		$data = array();
		if($me_type == 'water'){
			$data = array(
				'status_water' => $status,
				'me_status' => $me_status
			);
		}
		if($me_type == 'elec'){
			$data = array(
				'status_elec' => $status,
				'me_status' => $me_status
			);
		}
		$this->admin_meter_model->pay_meter($me_id,$data);



	}

	public function data_pay(){
		$c_id = base64_decode($_GET['c_id']);
		$d_id = base64_decode($_GET['d_id']);
		$q = $this->admin_meter_model->get_data_pay($c_id,$d_id);
		$q2 = $this->admin_meter_model->get_where_dorm($d_id);
		$data = array(
			'rs' => $q->result(),
			'rs_dorm' => $q2
		);
		$this->load->view('admin/data-pay',$data);
	}

}