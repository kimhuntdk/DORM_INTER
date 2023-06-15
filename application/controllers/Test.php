<?php
Class Test extends CI_Controller{

	public function index(){

		$z = 'a372c4e4202bd554ed7c8371f8051e7f';
		for($i=1;$i<=20;$i++){
			$j = sprintf("%03d",$i);
			//echo md5(md5(md5(md5(md5($j)))))."<br>";
		}

		//echo md5(md5(md5(md5(md5(utf8_decode($z)))))); 

	}

}