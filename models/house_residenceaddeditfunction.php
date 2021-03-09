<?php
include_once '../controller/mysql_crud.php';
include_once '../controller/userfunction.php';
$action="";
if(isset($_GET['action'])){
	$action=$_GET['action'];
}
//adding new house no
if($action=="addhousenumber"){
	$crud = new CRUD();
	$crud->connect();

	$house_id  = 'HOUSENO-'.$_GET['brgyhouse_id'].'-'.generateCode();

	if(isset($_GET['businesstypeID'])=='0'){
		$_GET['businesstypeID']='0';
	}
	$crud -> insert("houseno_tbl", array("house_id"=>$house_id, "house_no"=>$_GET['house_no'], "brgy_id_fk_house"=>$_GET['brgyhouse_id'], "sitio_id_fk_house"=>$_GET['sitiohouse_id'], "house_type"=>$_GET['house_type'], "business_type"=>$_GET['businesstypeID']));
	$rs = $crud -> getResult();
	$crud -> insert("revenue_tbl", array("revenue_id"=>'REV-'.$_GET['brgyhouse_id'].'-'.generateCode(), "brgy_id_fk"=>$_GET['brgyhouse_id'], "house_id_fk"=>$house_id, "sitio_id_fk"=>$_GET['sitiohouse_id'], "amount"=>'0'));
	$rss = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}
//sitio check if existing or not
if($action=="checkhousenodetails"){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT * FROM houseno_tbl WHERE house_no = '".$_GET['house_no']."'");
	$rs = $crud -> getResult();
	$row = $crud -> numRows();
	echo $row;
	$crud->disconnect();
}

//add a new residence per sitio and barangaylist
if($action=="addResident"){
	$crud = new CRUD();
	$crud->connect();


	$age_results = (isset($_GET['age_result'])) ? $_GET['age_result'] : (string) 0;
	$occupationstat = (isset($_GET['occupationdrop'])) ? $_GET['occupationdrop'] : (string) "No";

// this get is for the function for the income revenue of the family
	$amountAll = $_GET['amount'];
	if($_GET['income']==""){
		$incomeindividual = 0;
	}	else{
		$incomeindividual = $_GET['income'];
	}
	$totalFamilyIncome = $amountAll + $incomeindividual;

	// this is the end of the function of getting the revenue of every individual residents

	if($occupationstat=="No"){
		$res_occupation = 0;
		$res_occupationprofile = 0;
		$place_work = "";

	}else{
		$res_occupation = $_GET['occupation_status'];
		$res_occupationprofile = $_GET['occupation'];
		$place_work = $_GET['place_of_work'];
	}

	if($age_results<=17){

		$crud -> insert("resident_tbl", array("resident_id"=>'RESIDENT-'.$_GET['resident_id_brgy'].'-'.generateCode(),
										"house_no_fk"=>$_GET['house_id'],
										"brgy_id_fk_resident"=>$_GET['resident_id_brgy'],
										"sitio_id_fk_resident"=>$_GET['sitio_id_fk_resident'],
                    "fname"=>$_GET['fname'],
                    "mname"=>$_GET['mname'],
                    "lname"=>$_GET['lname'],
                    "bday"=>$_GET['bdate'],
										"extention_name"=>$_GET['ex_name'],
										"citizenship"=>$_GET['citizen_ship'],
										"age"=>$_GET['age_result'],
										"senior_id"=>$_GET['senio_id'],
                    "gender"=>$_GET['gender'],
										"civil_status"=>$_GET['cstatus'],
										"family_status"=>$_GET['family_stat'],
										"religion"=>$_GET['religion'],
										"religion_specify"=>$_GET['other_re'],
										"language"=>$_GET['language'],
										"language_specify"=>$_GET['other_lang'],
										"voter"=>'No',
										"placeofbirth"=>$_GET['placeofbirth'],
										"education_attain"=>$_GET['education_attain'],
										"school_type"=>$_GET['school_type'],
										"phone_no"=>$_GET['pnumber'],
										"email"=>$_GET['emailadd']));
	}elseif($age_results>=18){
		$crud -> insert("resident_tbl", array("resident_id"=>'RESIDENT-'.$_GET['resident_id_brgy'].'-'.generateCode(),
										"house_no_fk"=>$_GET['house_id'],
										"brgy_id_fk_resident"=>$_GET['resident_id_brgy'],
										"sitio_id_fk_resident"=>$_GET['sitio_id_fk_resident'],
                    "fname"=>$_GET['fname'],
                    "mname"=>$_GET['mname'],
                    "lname"=>$_GET['lname'],
                    "bday"=>$_GET['bdate'],
										"extention_name"=>$_GET['ex_name'],
										"citizenship"=>$_GET['citizen_ship'],
										"age"=>$_GET['age_result'],
										"senior_id"=>$_GET['senio_id'],
                    "gender"=>$_GET['gender'],
                    "civil_status"=>$_GET['cstatus'],
										"family_status"=>$_GET['family_stat'],
										"religion"=>$_GET['religion'],
										"religion_specify"=>$_GET['other_re'],
										"language"=>$_GET['language'],
										"language_specify"=>$_GET['other_lang'],
										"placeofbirth"=>$_GET['placeofbirth'],
										"education_attain"=>$_GET['education_attain'],
										"school_type"=>$_GET['school_type'],
										"voter"=>$_GET['voter'],
										"phone_no"=>$_GET['pnumber'],
										"email"=>$_GET['emailadd'],
										"occupation"=>$res_occupationprofile,
										"occupation_status"=>$res_occupation,
										"place_of_work"=>$place_work,
                    "income"=>$_GET['income'],
										"current_add_occ"=>$_GET['occupation_address']));
	}

	$rs = $crud -> getResult();
	if($rs){
		$crud ->update("revenue_tbl", array("amount"=>$totalFamilyIncome), "house_id_fk='{$_GET['house_id']}'");
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}

//Edit a new residence per sitio and barangaylist
if($action=="editResident"){
	$crud = new CRUD();
	$crud->connect();
	$strnow = date('m/d/Y h:i:s a');
    $crud -> update("resident_tbl", array("house_no_fk"=>$_GET['house_id'],
										"brgy_id_fk_resident"=>$_GET['resident_id_brgyedit'],
										"sitio_id_fk_resident"=>$_GET['sitio_id_fk_resident'],
                    "fname"=>$_GET['fname'],
										"mname"=>$_GET['mname'],
										"lname"=>$_GET['lname'],
										"bday"=>$_GET['bdate'],
										"gender"=>$_GET['gender'],
										"civil_status"=>$_GET['cstatus'],
										"religion"=>$_GET['religion'],
										"religion_specify"=>$_GET['other_re'],
										"language"=>$_GET['language'],
										"language_specify"=>$_GET['other_lang'],
										"family_status"=>$_GET['family_status'],
										"placeofbirth"=>$_GET['placeofbirth'],
										"education_attain"=>$_GET['education_attain'],
										"school_type"=>$_GET['school_type'],
										"voter"=>$_GET['voter'],
										"phone_no"=>$_GET['pnumber'],
										"email"=>$_GET['emailadd'],
										"occupation"=>$_GET['occupation'],
										"income"=>$_GET['income'],
										"current_add_occ"=>$_GET['occupation_address'],
										"dateupdated"=>$strnow), "resident_id=".$_GET['resident_id']);
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}


if($action=="UpdateWeight"){
	$crud = new CRUD();
	$crud->connect();
	$crud -> update("resident_tbl", array("weight"=>$_GET['Weight'], "height"=>$_GET['Height']), "resident_id='{$_GET['resident_id_weight']}'");
	$rs = $crud -> getResult();
	if($rs){
		echo 1;
	}else{
		echo 0;
	}
	$crud->disconnect();
}

?>
