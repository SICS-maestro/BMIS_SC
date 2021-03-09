<?php
session_start();
date_default_timezone_set("Asia/Manila");
include '../controller/functions.php';
include '../controller/mysql_crud.php';
include '../controller/connection.php';
//include '../controller/userfunction.php';
$now = date('m/d/Y h:i:s a');

$action = "";
$sql="";

if(isset($_GET['action'])){
	$action = $_GET['action'];
}



		// $now = date('Y-m-d H:i:s');
		// session_unset();
		// if (isset($_SESSION['attempts']) && $_SESSION['attempts']>=3) {
			// $session_time = $_SESSION['time'];
			// $seconds = $functions->computeTime("seconds", $session_time, $now);
			// $sec = 60 - $seconds;
			// echo json_encode(['errors'=>$_SESSION['attempts'].' attempts reached. Try again after '.$sec.' seconds.']);
		// }else{
		// $nows = date('Y-m-d H:i:s');
		// //session_unset();
		// if (isset($_SESSION['attempts']) && $_SESSION['attempts']>=3) {
			// $session_time = $_SESSION['time'];
			// $seconds = computeTime("seconds", $session_time, $nows);
			// $sec = 60 - $seconds;
			// echo json_encode(['errors'=>$_SESSION['attempts'].' attempts reached. Try again after '.$sec.' seconds.']);
		// }else{


		$username = $_GET['username'];
		$password = $_GET['password'];
		$pass = md5($password);
		$sql = "SELECT * FROM users_tbl WHERE username = BINARY '{$username}' and password = BINARY '{$pass}' and useractive='1'";
		$qry = $mysqli->query($sql);
		$rows = $qry->num_rows;
		$rs = $qry->fetch_array();

		if($action=="checkdata"){
			if($rows > 0){
			echo 1;
			}else{
				//if(isset($_SESSION['attempts']) && $_SESSION['attempts']){ 
				// $_SESSION['attempts']++;
				// $_SESSION['time'] = date("Y-m-d H:i:s");
				// echo  json_encode($_SESSION['attempts']);
				//['attempt'=>$_SESSION['attempts']]
				//}
			echo 0;	
			}	
			
			
		}elseif($action=="login"){

		$_SESSION['user_id'] = $rs['user_id'];
		$_SESSION['username'] = $rs['username'];
		$_SESSION['usertype'] = $rs['usertype'];
		$_SESSION['fullname'] = $rs['fullname'];
		$_SESSION['password'] = $rs['password'];
		$_SESSION['brgy_id_fk'] = $rs['brgy_id_fk'];
		$_SESSION['sitio_id_fk'] = $rs['sitio_id_fk'];
		$_SESSION['status'] = 'ONLINE';
		// $_SESSION['status'] = $rs['status'];
		$crud = new CRUD();
		$crud->connect();
		$crud -> insert("userslog_tbl", array("brgy_id_fk"=>$_SESSION['brgy_id_fk'], "log_name"=>$_SESSION['fullname'], "log_type"=>$_SESSION['usertype'], "log_status"=>'ONLINE'));
		$rs = $crud -> getResult();
		//$_SESSION['log_id'] = $rs['log_id'];
		header('location:../views/index.php');
		}
		 //}
?>
