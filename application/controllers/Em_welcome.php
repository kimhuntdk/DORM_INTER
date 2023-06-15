<?php
date_default_timezone_set("Asia/Bangkok");
Class Em_welcome extends CI_Controller{

	public function __construct(){
		parent::__construct();

	}

	public function index(){
		$this->load->view('employee/welcome');
	}

}