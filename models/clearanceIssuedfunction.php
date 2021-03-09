<?php
include_once '../controller/mysql_crud.php';
include_once '../controller/userfunction.php';

$action="";
if(isset($_GET['action'])){
	$action=$_GET['action'];
}
//adding cedula and or
	if($action=="addNewBarangayClearanceNow"){
	$crud = new CRUD();
	$crud->connect();
	
	$computeor = $_GET['or'];
	$resultor = $computeor + 1;
	
	$computecedula = $_GET['cedula'];
	$resultcedula = $computecedula + 1;
	
	$crud -> insert("barangay_clearance_tbl", array("brgy_clearance_id"=>"CLEA-".$_GET['brgy_idclearance']."-".generateCode(),
													"resident_id"=>$_GET['resident_id'],
													"brgy_id_fk_clerance"=>$_GET['brgy_idclearance'],
													"sitio_id_fk_clearance"=>$_GET['sitio_idclearancess'],
													"or_number"=>$_GET['or'],
													"cedula_number"=>$_GET['cedula'],
													"date_issued_or"=>$_GET['or_date'],
													"date_issued_cedula"=>$_GET['cedula_date'],
													"purpose"=>$_GET['purpose']));
	$rs = $crud -> getResult();
	
	if($rs){
		$crud -> update("or_tbl", array("or_number"=>$resultor), "brgy_id_fk_or='{$_GET['brgy_idclearance']}'");
		$resor = $crud -> getResult();
			
		$crud -> update("cedula_tbl", array("cedula_no"=>$resultcedula), "brgy_id_fk_cedula='{$_GET['brgy_idclearance']}'");
		$rescedula = $crud -> getResult();
		
		echo 1;
		
	}else{
		echo 0;
	}
	$crud->disconnect();
}

?>
