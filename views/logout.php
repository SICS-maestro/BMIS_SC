<?php
include_once '../controller/mysql_crud.php';
$crud = new CRUD();
$crud->connect();

session_start();
session_destroy();
//$now = date('m/d/Y h:i:s a');
			
			// $crud -> sql("SELECT * FROM userslog_tbl WHERE log_type='{$_SESSION['usertype']}' AND log_status='ONLINE' ORDER BY log_id");
			// $row_b = $crud -> numRows();
			// $rs_b = $crud -> getResult();			
			// if($row_b>0){
			// foreach($rs_b as $rsval){
				
				$crud -> update("userslog_tbl", array("log_status"=>'OFFLINE'), "brgy_id_fk='{$_SESSION['brgy_id_fk']}'" && "log_status='{$_SESSION['status']}'");
				$rs = $crud -> getResult();																				
			// }
		// }



header('location: ..\index.php');
if(empty($_SESSION['user_id'])){
  header('location: ..\index.php');
}
?>
