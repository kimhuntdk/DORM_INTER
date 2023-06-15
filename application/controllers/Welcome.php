<?php
date_default_timezone_set("Asia/Bangkok");
Class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('welcome_model');
		$this->load->library('../controllers/provider');
		$this->load->model('admin_dorm_model');
		$this->load->model('admin_system_model','asm');
	}

	public function index(){
		
		$q = $this->welcome_model->get_setting();
		$news = $this->welcome_model->get_news();
		$data_confirm = $this->welcome_model->get_data_confirm();
		$dorm1 = $this->welcome_model->get_data_dorm('ม.เก่า');
		$dorm2 = $this->welcome_model->get_data_dorm('ม.ใหม่');
		$data = array(
			'rs' => $q->result(),
			'rs_news' => $news->result(),
			'data_confirm' => $data_confirm->result(),
			'dorm1' => $dorm1->result(),
			'dorm2' => $dorm2->result()
		);
		$this->load->view('welcome',$data);
		
	}

	

	public function search_student(){

		$q = $_GET['q'];
		$set_search = array(
			're_code' => $q,
			're_fname' => $q,
			're_lname' => $q
		);
		$get_search = $this->register_model->search_register($set_search);
		$row = $get_search->num_rows();
		$result = $get_search->result();

		$data = array(
			'result' => $result,
			'row' => $row,
			'q' => $q
		);

		$this->load->view('search',$data);
		
	}

	public function register(){
		$set = $this->welcome_model->get_alert_text();
		$q = $this->welcome_model->get_setting();
		$news = $this->welcome_model->get_news();
		$data_confirm = $this->welcome_model->get_data_confirm();
		$data = array(
			'set' => $set->result(),
			'rs' => $q->result(),
			'rs_news' => $news->result(),
			'data_confirm' => $data_confirm->result()
		);
		$this->load->view('register',$data);
	}

	public function check_dorm(){

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
			$this->load->view('check-dorm',$data);
	}

	public function modal_check_list_dorm(){
		$d_id = $_POST['d_id'];
		$q = $this->welcome_model->get_dorm_byId($d_id);
		$q2 = $this->welcome_model->get_register_dorm($d_id);
		$data = array(
			'rs_dorm' => $q->result(),
			'rs_student' => $q2->result()
		);
		$this->load->view('modal/modal-check-list-dorm',$data);
	}

	public function modal_welcome(){
		$q = $this->welcome_model->get_modal_welcome();
		$set = $this->asm->get_setting();
		$data = array(
			'rs' => $q->result(),
			'set' => $set->result()
		);
		$this->load->view('modal/modal-welcome',$data);
	}

	/*


	public function modal_pay(){
		$c_id = $_POST['c_id'];
		$d_id = $_POST['d_id'];
		$q = $this->welcome_model->get_data_pay($c_id,$d_id);
		$data = array(
			'rs' => $q->result()
		);
		$this->load->view('modal/modal-data-pay',$data);
	}


	public function modal_view_image_dorm(){
		$d_id = $_POST['d_id'];
		$dorm = $this->welcome_model->get_dorm_byId($d_id);
		$data = array(
			'rs_dorm' => $dorm->result()[0]
		);
		$this->load->view('modal/modal-view-image-dorm',$data);
	}
	*/

}
