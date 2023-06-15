<?php
date_default_timezone_set("Asia/Bangkok");
Class Admin_welcome extends CI_Controller{

	public function index(){
		if(@$_COOKIE['level'] != ''){
			$this->load->view('admin/welcome');
		}else{
			echo "<script>history.go(-1);</script>";
		}

	}

}