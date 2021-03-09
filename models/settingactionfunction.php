<?php
include_once '../controller/mysql_crud.php';

$action="";
if(isset($_GET['action'])){
	$action=$_GET['action'];
}
//adding business
if($action=="addbusinesstype"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> insert("businesstype_tbl",array("businesstype_name"=>$_GET['business_name']));
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}
//sitio check if existing or not
if($action=="checkbusinesstypedetails"){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT * FROM businesstype_tbl WHERE businesstype_name = '".$_GET['business_name']."'");
	$rs = $crud -> getResult();
	$row = $crud -> numRows();
	echo $row;
	$crud->disconnect();
}
//EDIT BUSINESS TYPE
if($action=="editbusinesstype"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> update("businesstype_tbl",array("businesstype_name"=>$_GET['businesstype_name']), "businesstype_id=".$_GET['businesstype_ids']);
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}


//adding Religion
if($action=="addreligion"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> insert("religion_tbl",array("religion_name"=>$_GET['religion_name']));
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}
//check
if($action=="checkreligion"){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT * FROM religion_tbl WHERE religion_name = '".$_GET['religion_name']."'");
	$rs = $crud -> getResult();
	$row = $crud -> numRows();
	echo $row;
	$crud->disconnect();
}
//edit
if($action=="editreligion"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> update("religion_tbl",array("religion_name"=>$_GET['religion_namess']), "religion_id=".$_GET['religion_ids']);
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}

?>
