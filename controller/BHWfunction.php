<?php 
function countCHILDRENS($tbl, $gender, $gender1, $age, $age1, $com1, $comresult, $pk, $id){
	$crud = new CRUD();
	$crud->connect();
	
	$crud->sql("SELECT * FROM $tbl WHERE $gender='$gender1' AND $age<=$age1 AND $com1='{$comresult}' && $pk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;
	
	$crud->disconnect();
}

?>