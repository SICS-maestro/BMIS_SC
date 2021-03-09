<?php
include_once '../controller/mysql_crud.php';
include_once '../controller/residentfunction.php';
include_once '../controller/brgy_sitiofunction.php';


$crud = new CRUD();
$crud->connect();
$replace = str_replace(' ', '', 'ALOBO');
if(checkbarangay('ALOBO') > 0){
	$crud -> insert("brgy_tbl", array("brgy_id"=>'STA-CRUZ-'.$replace.'-'.randomCode(), "brgy_name"=>'ALOBO'));
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	echo "HAVE!";
}
else{
	echo "None!";
}
	
	$crud->disconnect();


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