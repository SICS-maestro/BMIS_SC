<?PHP
//get full name
function getFullName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM users_tbl WHERE user_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['fullname'];
	}
	$crud->disconnect();
}
function getRestriction($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM users_tbl WHERE user_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['usertype'];
	}
	$crud->disconnect();
}

?>
