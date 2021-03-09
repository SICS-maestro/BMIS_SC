<?php 

function getResidentFullname($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE resident_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['fname'].' '.$rs['mname'].' '.$rs['lname'];
	}
	$crud->disconnect();
}

function getNumberOfDays($date1, $date2)
	{
		$datetime1 = date($date1);
		$datetime2 = date($date2);
		$diff = date_diff(date_create($date1), date_create($date2));
		return $diff->format('%y');
	}

function getNumberOfSchedule($id){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(blotter_id) FROM blotter_tbl WHERE brgy_id_fk='{$id}' AND status='ONGOING' AND schedule_date='{$now}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(blotter_id)'];
	}
	$crud->disconnect();

}



function getCountMaleResident($id){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(sitio_id_fk_resident) FROM resident_tbl WHERE sitio_id_fk_resident='{$id}' AND gender='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(sitio_id_fk_resident)'];
	}
	$crud->disconnect();

}

function getCountFemaleResident($id){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(sitio_id_fk_resident) FROM resident_tbl WHERE sitio_id_fk_resident='{$id}' AND gender='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(sitio_id_fk_resident)'];
	}
	$crud->disconnect();

}

function getHouseHoldCount($id){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(house_no) FROM houseno_tbl WHERE sitio_id_fk_house='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(house_no)'];
	}
	$crud->disconnect();

}
//count number of families in one household number
function getFamiliesHousehold($id){
	$crud = new CRUD();
	
	$crud->connect();
	$crud -> sql("SELECT *, COUNT(resident_id) FROM resident_tbl WHERE sitio_id_fk_resident='{$id}' AND civil_status='2' && gender='2'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(resident_id)'];
	}
	$crud->disconnect();

}

function getResident040($id, $count){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND age='{$count}' AND gender='1'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}
function getResident040Female($id, $count){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND age='{$count}' AND gender='2'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident040Sum($id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='1'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident040SumFemale($id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='2'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}




function getResident4180Male($id, $count){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND age='{$count}' AND gender='1'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident4180Female($id, $count){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND age='{$count}' AND gender='2'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident4180MaleSum($id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='1'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident4180FemaleSum($id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='2'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident4180MaleSumabove($id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='1' AND age>=41");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident4180FemaleSumabove($id){
	$crud = new CRUD();
	
	$crud->connect();
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='2' AND age>=41");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getNumberofRenewalBusiness($id){
	$crud = new CRUD();
	
	$crud->connect();
	$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(business_id) FROM businesspermit_tbl WHERE brgy_id_fk='{$id}' AND date_apply>='{$now}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(business_id)'];
	}
	$crud->disconnect();

}



//this is to count the number of pop per sitio_id_fk_house
function getResident040Sitio($id, $count, $s_id){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND age='{$count}' AND gender='1' && sitio_id_fk_resident='{$s_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}
function getResident040SitioFemale($id, $count, $s_id){
	$crud = new CRUD();
	//date_default_timezone_set("Asia/Manila");
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND age='{$count}' AND gender='2' && sitio_id_fk_resident='{$s_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident040SitioMaleSum($id, $s_id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='1' AND age<=40 && sitio_id_fk_resident='{$s_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}
function getResident040SitioFemaleSum($id, $s_id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='2' AND age<=40 && sitio_id_fk_resident='{$s_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}

function getResident81SitioMaleSum($id, $s_id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='1' AND age>=41 && sitio_id_fk_resident='{$s_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}
function getResident81SitioFemaleSum($id, $s_id){
	$crud = new CRUD();
	
	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(age) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}' AND gender='2' AND age>=41 && sitio_id_fk_resident='{$s_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(age)'];
	}
	$crud->disconnect();

}



?>