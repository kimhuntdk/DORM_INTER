<?php
date_default_timezone_set("Asia/Bangkok");
Class Register extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('dorm_model');
	}

	public function save_register(){

		if(!empty($_POST)){

			$d_id = $_POST['d_id'];
			$re_gender = $_POST['gender'];
			$re_date = date("Y-m-d");
			$re_time = date("H:i:s");
			if(@$_POST['re_code'] == ''){

			}else{
			foreach (@$_POST['re_code'] as $key => $v) {

				$re_fname = $_POST['re_fname'][$key];
				$re_lname = $_POST['re_lname'][$key];
				$re_code = $_POST['re_code'][$key];
				$re_level_class = $_POST['re_level_class'][$key];
				$re_passport = $_POST['re_passport'][$key];
				$re_visa_id = $_POST['re_visa_id'][$key];
				$re_check_in = $_POST['re_check_in'][$key];
				$fac_id = $_POST['fac_id'][$key];
				$re_subject = $_POST['re_subject'][$key];
				$re_tel = $_POST['re_tel'][$key];
				$re_country = $_POST['re_country'][$key];
				$re_email = $_POST['re_email'][$key];
				$re_wechat = $_POST['re_wechat'][$key];
				$row = $this->register_model->check_register($re_code);

				if($row == 1){

					$html = "<div class='alert alert-danger'>";
					$html .= "<i class='fa fa-exclamation-circle fa-2x'></i>";
					$html .= " รหัสนิสิต $re_code ไม่สามารถสมัครเข้าห้องพักได้ เนื่องจากรหัสนี้ได้สมัครแล้ว หากมีข้อสงสัยกรุณาติดต่อเจ้าหน้าที่ 043-754418,043-754305 ";
					$html .= "</div>";

					echo "  <script>
							var re_code = document.getElementById('re_code');
							re_code.focus();
							$('#re_code').css({
								'border' : '2px solid red'
							});
							$('#re_code').click(function(){
								$('#re_code').css({
									'border' : '1px solid #ccc'
								});
							});
							</script>
						 ";
					echo $html;

				}else if($row == 0){

					$data = array(
						're_code' => $re_code,
						're_fname' => $re_fname,
						're_lname' => $re_lname,
						're_level_class' => $re_level_class, 
						're_passport' => $re_passport, 
						're_visa_id' => $re_visa_id, 
						're_check_in' => $re_check_in, 
						're_gender' => $re_gender,
						'fac_id' => $fac_id,
						're_subject' => $re_subject,
						're_tel' => $re_tel,
						're_country' => $re_country,
						're_email' => $re_email,
						're_wechat' => $re_wechat,
						'd_id' => $d_id,
						're_date' => $re_date,
						're_time' => $re_time,
						're_status' => 0
					);
					$this->register_model->insert_register($data);

					$html = "<div class='alert alert-success'>";
					$html .= "<i class='fa fa-check fa-2x'></i>";
					$html .= "ขอแสดงความยินดีกับ รหัสนิสิต $re_code คุณได้จองห้องพักสำเร็จแล้ว กรุณารอตรวจสอบความถูกต้องจากเจ้าหน้าที่อีกครั้ง คุณสามารถตรวจสอบสถานะได้ที่ <a href='search?q=$re_code'>คลิกเพื่อตรวจสอบ</a> หรือหากมีข้อสงสัยเพิ่มเติม กรุณาติดต่อ 043-754418,043-754305,043-970695 ";
					$html .= "</div>";

					echo "<script>
							document.getElementById('frm_register').reset();
						 </script>";
					echo $html;

				}

			}
			}

		}

	}

}