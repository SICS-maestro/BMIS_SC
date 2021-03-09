<?php
//get id of User to compare in barangay selection function



function getUserID($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM users_tbl WHERE brgy_id_fk='{$id}' AND usertype='BarangayCaptain' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['brgy_id_fk'];
	}
	$crud->disconnect();
}

function getUserID_Sitio_id($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM users_tbl WHERE sitio_id_fk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['sitio_id_fk'];
	}
	$crud->disconnect();
}


function getBarangayCaptain($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM users_tbl WHERE brgy_id_fk='{$id}' AND usertype='BarangayCaptain'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['fullname'];
	}
	$crud->disconnect();
}

function generateCode($length=8){
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		// $set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, $length);
		return $code;
	}
	
?>
