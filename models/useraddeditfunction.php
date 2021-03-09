<?php
include_once '../controller/mysql_crud.php';
include_once '../controller/userfunction.php';
$action="";
if(isset($_GET['action'])){
	$action=$_GET['action'];
}
//adding for barangay captain
if($action=="addUserBarangayCaptain"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> insert("users_tbl", array("user_id"=>'STA-CRUZ-'.generateCode(), "fullname"=>$_GET['fname'], "username"=>$_GET['username'], "password"=>md5($_GET['password']), "usertype"=>$_GET['restriction'], "brgy_id_fk"=>$_GET['brgy_id'], "useractive"=>'1'));
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}

//adding for barangay captain
if($action=="addUserBarangayCaptainUnder"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> insert("users_tbl", array("user_id"=>'STA-CRUZ-'.generateCode(), "fullname"=>$_GET['fname_bc'], "username"=>$_GET['username_bc'], "password"=>md5($_GET['password_bc']), "usertype"=>$_GET['restriction_bc'], "brgy_id_fk"=>$_GET['brgy_id_bc'], "sitio_id_fk"=>$_GET['sitio_id_bc'], "useractive"=>'1'));
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}


if($action=="DeactivateUser"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> update("users_tbl", array("useractive"=>'0'), "user_id='{$_GET['user_id']}'");
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();

}
if($action=="ActivateUserS"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> update("users_tbl", array("useractive"=>'1'), "user_id='{$_GET['user_id']}'");
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}


if($action=="Updateusers"){
	$crud = new CRUD();
	$crud->connect();
	$strnow = date('m/d/Y h:i:s a');
	$crud -> update("users_tbl", array("fullname"=>$_GET['fname'], "username"=>$_GET['uname'], "password"=>md5($_GET['pword']), "date_updated"=>$strnow), "user_id=".$_GET['id']);
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}



if($action=="removeDesignation"){
	date_default_timezone_set("Asia/Manila");
	$crud = new CRUD();
	$crud->connect();
	$res = "";
	
	if(isset($_GET['user_id']) && isset($_GET['sitio_id_fk_user']) && isset($_GET['userfname'])){
		foreach($_GET['user_id'] as $key => $val){
			$crud -> insert("historybrgyofficial_tbl",array("history_id"=>'HISTORY-'.$_GET['brgy_id_fk_users'].'-'.generateCode(), "history_userid"=>$_GET['user_id'][$key], "history_brgy_id_fk"=>$_GET['brgy_id_fk_users'], "history_sitio_id_fk"=>$_GET['sitio_id_fk_user'][$key], "history_usetype"=>$_GET['utype'][$key], "history_name"=>$_GET['userfname'][$key]));
			$res = $crud -> getResult();
			
			$crud -> update("users_tbl",array("sitio_id_fk"=>'' ,"useractive"=>'0') , "user_id='{$_GET['user_id'][$key]}'");
			$result = $crud -> getResult();
		
		}
	}

	if($res && $result){
		echo 1;
	}
	
	else{
		echo 0;
	}
		
	$crud->disconnect();
}

if($action=="activateDesignation"){
	date_default_timezone_set("Asia/Manila");
	$crud = new CRUD();
	$crud->connect();
	
	$crud -> update("users_tbl",array("sitio_id_fk"=>$_GET['designation_id'], "useractive"=>'1') , "user_id='{$_GET['u_id']}'");
	$res = $crud -> getResult();
	if($res){
		echo 1;
	}else{
		echo 0;
	}
		
	$crud->disconnect();
}


?>
