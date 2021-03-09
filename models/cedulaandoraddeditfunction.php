<?php
include_once '../controller/mysql_crud.php';
include_once '../controller/userfunction.php';
$action="";
if(isset($_GET['action'])){
	$action=$_GET['action'];
}
//adding cedula and or
if($action=="addcedulaor"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> insert("or_tbl", array("or_id"=>'OR-'.$_GET['orcedula_id'].'-'.generateCode(), "or_number"=>$_GET['or_number'], "brgy_id_fk_or"=>$_GET['orcedula_id'], "or_price"=>$_GET['or_price']));
	$rs = $crud -> getResult();
	$crud -> insert("cedula_tbl", array("cedula_id"=>'OR-'.$_GET['orcedula_id'].'-'.generateCode(), "cedula_no"=>$_GET['cedula_number'], "brgy_id_fk_cedula"=>$_GET['orcedula_id'], "cedula_price"=>$_GET['cedula_price']));
	$rss = $crud -> getResult();
	
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}

//edit or 
if($action=="oredit"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> update("or_tbl", array("or_number"=>$_GET['or_number_edit'], "brgy_id_fk_or"=>$_GET['brgy_or'], "or_price"=>$_GET['or_price_edit']), "or_id='{$_GET['orcedula_idedit']}'");
	$rs = $crud -> getResult();
	
	
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}

//edit or 
if($action=="cedulaedit"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> update("cedula_tbl", array("cedula_no"=>$_GET['cedula_number_edit'], "brgy_id_fk_cedula"=>$_GET['brgy_cedula'], "cedula_price"=>$_GET['cedula_price_edit']), "cedula_id='{$_GET['cedulaedit']}'");
	$rs = $crud -> getResult();
	
	
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}

?>