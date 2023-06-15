<?php
date_default_timezone_set("Asia/Bangkok");
Class Ajax extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('ajax_model');
		$this->load->model('admin_dorm_model');
	}

	public function content_register(){

		//if(!empty($_POST)){
			$gender = "";
			if($_GET['gender'] == 'male'){
				$gender = 'ชาย';
			}else if($_GET['gender'] == 'female'){
				$gender = "หญิง";
			}

			$facuty = $this->ajax_model->get_facuty();
			$dorm = $this->ajax_model->get_dorm($_GET['gender'],$_GET['position']);
			$data = array(
				'gender' => $gender,
				'position' => $_GET['position'],
				'perfix_img' => $_GET['gender'],
				'facuty' => $facuty->result(),
				'dorm' => $dorm->result(),
				'time' => time()
			);
			$this->load->view('ajax/register',$data);

		//}

	}

	public function form_register(){

		if(!empty($_POST)){

			$gender = "";
			if($_POST['gender'] == 'male'){
				$gender = 'ชาย';
			}else if($_POST['gender'] == 'female'){
				$gender = "หญิง";
			}

			$facuty = $this->ajax_model->get_facuty();
			$dorm = $this->ajax_model->get_dorm($_POST['gender'],$_POST['position']);

			$data = array(
				'gender' => $gender,
				'position' => $_POST['position'],
				'perfix_img' => $_POST['gender'],
				'facuty' => $facuty->result(),
				'dorm' => $dorm->result(),
				'time' => time()
			);

			$this->load->view('ajax/form-register',$data);
		}
	}

	public function search_dorm(){
		$keyword = $_POST['keyword'];
		$q = $this->ajax_model->get_search_dorm($keyword);
		$data = array(
			'rs' => $q->result(),
			'row' => $q->num_rows()
		);
		$this->load->view('ajax/search_dorm',$data);
	}

	public function chk_register_class_dorm(){
		if($this->input->post('d_id') != ''){
			$d_id = $this->input->post('d_id');

			$q = $this->db->where('d_id',$d_id)
                                  ->select_sum('c_bed')
                                  ->get('tbl_class_dorm');
                    $qs1 = $q->result();
                    $number_bed = $qs1[0]->c_bed;
                    
                    $q2 = $this->db->where('d_id',$d_id)
                                   //->where('re_status',1)
                                   ->get('tbl_register_dorm');
                    $row2_ = $q2->num_rows();

                    $remain = $number_bed - $row2_;

                    if($remain <= 0){
                    	echo "<br>";
                    	echo "<span class='label label-danger'>ไม่สามารถสมัครหอพักนี้ได้ เนื่องจากมีนิสิตสมัครมาเกินจำนวน กรุณาเลือกหอพักใหม่</span>";
                    	echo '<script>
                              $(function(){
                              	$("#d_id").val("");
                              });
                    	      </script>';
                    }else{
                    	echo "";
                    }

		}
	}

}