<?php
date_default_timezone_set("Asia/Bangkok");
Class Provider{

	public function dorm_status($status){

		$text = "";
		if($status == 0){
			$text = "หอพักว่าง";
		}else if($status == 1){
			$text = "หอพักไม่ว่าง";
		}
		return $text;

	}

	public function status_register($status){

		$text = "";
		if($status == 0){
			$text = "รอตรวจสอบจากเจ้าหน้าที่";
		}else if($status == 1){
			$text = "เข้าหอพักเรียบร้อย";
		}
		return $text;

	}	

	public function level_manager($level){
		$text = "";
		if($level == 0){
			$text = "ผู้ดูแลระบบ";
		}else if($level == 1){
			$text = "เจ้าหน้าที่ดูแลหอพัก";
		}
		return $text;
	}

	public function status_room($status){
		$text = "";
		if($status == 0){
			$text = "ห้องพักไม่ว่าง";
		}else if($status == 1){
			$text = "ห้องพักว่าง";
		}else if($status == 3){
			$text = "ห้องพักไม่พร้อมให้บริการ";
		}
		return $text;
	}

}