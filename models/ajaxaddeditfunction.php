<?php
include_once '../controller/mysql_crud.php';
include_once '../controller/residentfunction.php';
include_once '../controller/brgy_sitiofunction.php';

$action="";
if(isset($_GET['action'])){
	$action=$_GET['action'];
}
//adding new pig
if($action=="addbarangay"){
	$crud = new CRUD();
	$crud->connect();
	$replace = str_replace(' ', '', $_GET['brgy_name']);
	if(checkbarangay($_GET['brgy_name']) == 0){
		$crud -> insert("brgy_tbl", array("brgy_id"=>'STA-CRUZ-'.$replace.'-'.randomCode(), "brgy_name"=>$_GET['brgy_name']));
		$rs = $crud -> getResult();
		if($rs){
			echo 1;
		}else{
			echo 0;
		}
	}
	
	
	$crud->disconnect();
}
//barangay check if existing or not
if($action=="checkbrgydetails"){
	$crud = new CRUD();
	$crud->connect();
	
	$crud -> sql("SELECT * FROM brgy_tbl WHERE brgy_name = '".$_GET['brgy_name']."'");
	$rs = $crud -> getResult();
	$row = $crud -> numRows();
	
	
	echo $row;
	$crud->disconnect();
}
//adding new pig
if($action=="editbarangay"){
	include_once '../controller/connection.php';
	$sql = "UPDATE brgy_tbl SET brgy_name='".$_GET['brgy_namecc']."' WHERE brgy_id='".$_GET['brgy_idedit']."'";
	$qry = $mysqli->query($sql) or die($mysqli->error);
	if($qry){
		echo 1;
	}else{
		echo 0;
	}

	$mysqli->close();
}

if($action=="updateAgeofResident"){

		$crud = new CRUD();
		$crud->connect();
		$crud->sql("SELECT * FROM resident_tbl");
		$r = $crud->getResult();
		$age = array();
		if(count($r)> 0){
			foreach($r as $rval){
				if($rval['bday']!=NULL){
					$resident_id = $rval['resident_id'];
					$compute_age = getNumberOfDays($rval['bday'], date('m/d/Y'));
					$age = array("age"=>$compute_age);
					
					$crud -> update("resident_tbl", array("age"=>$compute_age), "resident_id='{$rval['resident_id']}'");
					$rs = $crud -> getResult();

				}
			}
		}
		return $age;

}

//get the sitio ID of the residence
if($action=="checkSitioIDofResident"){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT * FROM resident_tbl WHERE resident_id = '".$_GET['resident_id_find']."'");
	$row_f = $crud -> numRows();
	$rs = $crud->getResult();
	if($row_f>0){
		foreach($rs as $rsval){
			echo $rsval['sitio_id_fk_resident'];
		}
	}else{
		echo 0;
	}

	$crud->disconnect();
}


if($action=="checkSitioIDofResidentComplainant"){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT * FROM resident_tbl WHERE resident_id = '".$_GET['resident_id_find2']."'");
	$row_f = $crud -> numRows();
	$rs = $crud->getResult();
	if($row_f>0){
		foreach($rs as $rsval){
			echo $rsval['sitio_id_fk_resident'];
		}
	}else{
		echo 0;
	}

	$crud->disconnect();
}

function checkbarangay($brgy_name){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select * from brgy_tbl where brgy_name='". $brgy_name. "'");
	$rsf = $crud->getResult();
	$rowf = $crud->numRows();
	return $rowf;

	$crud->disconnect();
}



?>
