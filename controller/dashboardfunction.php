<?php
function dashboardCountBusiness($id){
	$crud = new CRUD();

	$crud->connect();
	$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(business_id) FROM businesspermit_tbl WHERE brgy_id_fk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(business_id)'];
	}
	$crud->disconnect();

}

function dashboardCountResident($id){
	$crud = new CRUD();

	$crud->connect();
	$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(resident_id) FROM resident_tbl WHERE brgy_id_fk_resident='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(resident_id)'];
	}
	$crud->disconnect();

}
function dashboardCountSettledBlotter($id){
	$crud = new CRUD();

	$crud->connect();
	$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(blotter_id) FROM blotter_tbl WHERE brgy_id_fk='{$id}' && status='SETTLED'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(blotter_id)'];
	}
	$crud->disconnect();

}
function dashboardCountOngoingBlotter($id){
	$crud = new CRUD();

	$crud->connect();
	$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(blotter_id) FROM blotter_tbl WHERE brgy_id_fk='{$id}' && status='ONGOING'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(blotter_id)'];
	}
	$crud->disconnect();

}

function dashboardCountClearance($id){
	$crud = new CRUD();

	$crud->connect();
	//$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(resident_id) FROM barangay_clearance_tbl WHERE brgy_Id_fk_clerance='{$id}'");
	$rs = $crud->getResult();
	//$rs = $crud->numRow()

	foreach($rs as $rsval){
		return $rsval['COUNT(resident_id)'];
	}
	$crud->disconnect();

}


function dashboardCountBusinesses($id){
	$crud = new CRUD();

	$crud->connect();
	$now = date('m/d/Y');
	$crud -> sql("SELECT *, COUNT(business_id) FROM businesspermit_tbl WHERE brgy_id_fk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(business_id)'];
	}
	$crud->disconnect();

}


function arrayMonth(){
	return array('01'=>'January', '02'=>'February', '03'=>'March', '04'=>'April', '05'=>'May', '06'=>'June', '07'=>'July', '08'=>'August', '09'=>'September', '10'=>'October', '11'=>'November', '12'=>'December');
}
function arrayMonthNumber(){
	return array('01','02','03','04','05','06','07','08','09','10','11','12');
}

function countClerancebyGraph($num,$id){
	$crud = new CRUD();

	$crud->connect();
	$crud -> sql("SELECT *, COUNT(brgy_clearance_id) FROM barangay_clearance_tbl WHERE date_created LIKE '%-".$num."-%' AND brgy_id_fk_clerance='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(brgy_clearance_id)'];
	}
	$crud->disconnect();

}

function countBlotterByGraph($num,$id){
	$crud = new CRUD();

	$crud->connect();
	$crud -> sql("SELECT *, COUNT(blotter_id) FROM blotter_tbl WHERE date_created LIKE '%-".$num."-%' AND brgy_id_fk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(blotter_id)'];
	}
	$crud->disconnect();

}
function countBusinessByGraph($num,$id){
	$crud = new CRUD();

	$crud->connect();
	$crud -> sql("SELECT *, COUNT(business_id) FROM businesspermit_tbl WHERE date_apply LIKE '".$num."/%/%' AND brgy_id_fk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(business_id)'];
	}
	$crud->disconnect();

}

//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard
//all computation and count in the dashboard

// function countDILGPop($count_id,$tbl){
	// $crud = new CRUD();

	// $crud->connect();
	// $crud -> sql("SELECT *, COUNT($count_id) FROM $tbl");
	// $r = $crud->getResult();
	// foreach($r as $rs){
		// return $rs['COUNT($count_id)'];
	// }
	// $crud->disconnect();

// }

function countDILGPops($tbl){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}
//Count with double parameter
function countDILGTblRes($tbl, $pk, $id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countDILGTblResCitizenless($tbl, $pk, $id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk<='$id'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}
//count indigent per sitio
function countDILGTblResCitizenlessPerSitio($tbl, $pk, $id, $a, $b){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk<='$id' AND $a='{$b}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;
	$crud->disconnect();
}

function countDILGTblResCitizen($tbl, $pk, $id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk>='$id'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

//per barangay count
function countDILGTblResCitizenPerBarangay($tbl, $pk, $id, $com, $com1){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk>='$id' AND $com='{$com1}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


//this is for the count of residential and commercial building
function countResidential(){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_type='RESIDENTIAL'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countCommercial(){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_type='COMMERCIAL'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}
//resident employeed and unemployeed
function countEmployeedResident(){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation!=''");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countUnEmployeedResident(){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation=''");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}
//count religion
function countReligion($religion){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE religion='{$religion}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}
//count age admin dashboard
function countAgeAdmin($age, $gender){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age='{$age}' AND gender='$gender'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countAgeAdminAbove($gender){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='67' AND gender='$gender'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countDILGTblResults($tbl, $pk, $id, $com1, $comresult){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $com1='{$comresult}' AND $pk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countDILGTblResultsVoter($tbl, $pk, $id, $com1, $comresult, $voter, $result){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $com1='$comresult' AND $pk='{$id}' AND $voter='$result'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();

}

function countDILGTblResultsValueReport($tbl, $pk, $id, $com1, $comresult){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $com1!='$comresult' AND $pk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countDILGTblResultsValueReportsFinal($tbl, $pk, $id, $com1, $comresult){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $com1!='$comresult' AND $pk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


function countDILGTblResultsValueReportsTotal($tbl, $pk, $id, $com1, $comresult, $field, $val1, $val2){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $com1='$comresult' AND $pk='{$id}'  && $field IN('$val1', '$val2')");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


function countDILGTblResultsSenior($tbl, $pk, $id, $com1, $comresult, $voter, $result){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk='{$id}' AND $com1='$comresult' AND $voter>='$result'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countDILGTblResultsIndigent($tbl, $pk, $id, $com1, $comresult, $voter, $result){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk='{$id}' AND $com1='$comresult' AND $voter<='$result'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}






//this is for the per sitio and barangay count
function countResidentialPersitio($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_type='RESIDENTIAL' AND brgy_id_fk_house='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countCommercialPersitio($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_type='COMMERCIAL' AND brgy_id_fk_house='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countEmployeedResidentPersitio($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation!='' AND brgy_id_fk_resident='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countUnEmployeedResidentPersitio($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation='' AND brgy_id_fk_resident='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countReligionPersitio($religion, $id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE religion='{$religion}' AND brgy_id_fk_resident='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

//count age admin dashboard
function countAgeAdminPersitio($age, $gender, $id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age='{$age}' AND gender='$gender' AND brgy_id_fk_resident='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countAgeAdminAbovePersitio($gender, $id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='67' AND gender='$gender' AND brgy_id_fk_resident='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

//this is for kagawad

function countDILGTblResultKagawad($tbl, $pk, $id ,$c1 ,$c2){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk='{$id}' AND $c1='{$c2}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countDILGTblResultKagawadthreeID($tbl, $pk, $id ,$c1 ,$c2 ,$c3 ,$c4){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk='{$id}' AND $c1='{$c2}' && $c3='{$c4}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countDILGTblResCitizenPerBarangayKagawad($tbl, $pk, $id, $com, $com1 ,$com2 ,$com3){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk>='$id' AND $com='{$com1}' && $com2='{$com3}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


function countDILGTblResCitizenPerBarangayKagawadLessthan($tbl, $pk, $id, $com, $com1 ,$com2 ,$com3){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk<='$id' AND $com='{$com1}' && $com2='{$com3}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

//kagawad
function countResidentialPersitioKagawad($id, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_type='RESIDENTIAL' AND brgy_id_fk_house='{$id}' && sitio_id_fk_house='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countCommercialPersitioKagawad($id, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_type='COMMERCIAL' AND brgy_id_fk_house='{$id}' && sitio_id_fk_house='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


function countEmployeedResidentPersitioKagawad($id, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation!='0' AND brgy_id_fk_resident='{$id}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countUnEmployeedResidentPersitioKagawad($id, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation='0' AND brgy_id_fk_resident='{$id}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countReligionPersitioKagawad($religion, $id, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE religion='{$religion}' AND brgy_id_fk_resident='{$id}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


//count age admin dashboard
function countAgeAdminPersitioKagawad($age, $gender, $id ,$fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age='{$age}' AND gender='$gender' AND brgy_id_fk_resident='{$id}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countAgeAdminAbovePersitioKagawad($gender, $id ,$fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='67' AND gender='$gender' AND brgy_id_fk_resident='{$id}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


function countClerancebyGraphKagawad($num,$id,$fk){
	$crud = new CRUD();

	$crud->connect();
	$crud -> sql("SELECT *, COUNT(brgy_clearance_id) FROM barangay_clearance_tbl WHERE date_created LIKE '%-".$num."-%' AND brgy_id_fk_clerance='{$id}' && sitio_id_fk_clearance='{$fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(brgy_clearance_id)'];
	}
	$crud->disconnect();

}

function countBlotterByGraphKagawad($num,$id,$fk){
	$crud = new CRUD();

	$crud->connect();
	$crud -> sql("SELECT *, COUNT(blotter_id) FROM blotter_tbl WHERE date_created LIKE '%-".$num."-%' AND brgy_id_fk='{$id}' && complainant_sitio_fk='{$fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(blotter_id)'];
	}
	$crud->disconnect();

}
function countBusinessByGraphKagawad($num,$id,$fk){
	$crud = new CRUD();

	$crud->connect();
	$crud -> sql("SELECT *, COUNT(business_id) FROM businesspermit_tbl WHERE date_apply LIKE '".$num."/%/%' AND brgy_id_fk='{$id}' && sitio_id_fk_bus='{$fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(business_id)'];
	}
	$crud->disconnect();

}


function countEmployeedResidentPersitioKagawadEmployed($id ,$gender, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation!='' AND brgy_id_fk_resident='{$id}' AND gender='{$gender}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countUnEmployeedResidentPersitioKagawadUnemployed($id ,$gender, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation='' AND brgy_id_fk_resident='{$id}' AND gender='{$gender}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


function ReportFunctionDistributionAge($tbl, $age, $age1, $pk, $id, $a, $b){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $age>=$age1 AND $pk<'$id' && $a='{$b}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function ReportFunctionDistributionAgeGender($tbl, $age, $age1, $pk, $id, $a, $b ,$c ,$d){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $age>='$age1' AND $pk<'$id' AND $a='$b' && $c='{$d}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function ReportFunctionDistributionAgeGenderAbove($tbl, $pk, $id, $g1, $g2, $com, $com1){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk>='$id' AND $g1='$g2' && $com='{$com1}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function ReportFunctionDistributionAgeGenderAboveTotal($tbl, $pk, $id, $com, $com1){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk>='$id' AND $com='{$com1}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


function countDILGTblResultsKagawadCountAll($tbl, $pk, $id, $id1, $com1, $comresult){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tbl WHERE $pk IN('$id', '$id1')  AND $com1='{$comresult}' ");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

//function to compute total population of resident_id
function countAllPopulation($pk, $id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE $pk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();

}
//function to count other religion
function countReligionOthers($pk,$id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE religion='0' AND $pk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();

}


// this function is to get the name of the corresponding field into the database and show the results
function getTblResValDashboard($result, $tablename, $pk, $id){ //result to return, table name, primary key, primary key value
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * from $tablename where $pk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs[$result];
	}

	$crud->disconnect();
}
// to call condition function
function getTblResValDashboardBC($result, $tablename, $pk, $id, $first, $second){ //result to return, table name, primary key, primary key value
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tablename WHERE $pk='{$id}' AND $first='{$second}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs[$result];
	}

	$crud->disconnect();
}

// THIS FUNCTION IS TO COUNT THE NUMBER OF INDIGENT PER BARANGAY AND PER sitio
 // this function is for barangay captain

function countNumberOfIndigent($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM revenue_tbl WHERE amount<=5000 AND brgy_id_fk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

// this function is for kagawad
function countNumberOfIndigentKagawad($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM revenue_tbl WHERE amount<=5000 AND sitio_id_fk='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

// end of kagawad function
// FUNCTION ADMIN OF THE SYSTEM
function countNumberOfIndigentAdmin(){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM revenue_tbl WHERE amount<=5000");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

// END OF THE FUNCTION



?>
