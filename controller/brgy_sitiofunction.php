<?php
//random code
function randomCode($length = 5){
	/* $characters = '0123456789ABCDEFGHJKMNOPQRSTUVWXYZ'; */
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}


//get brgy name
function getbrgyname($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM brgy_tbl WHERE brgy_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['brgy_name'];
	}
	$crud->disconnect();
}

//get sitio name
function sitio_namesitio_name($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM sitio_tbl WHERE sitio_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['sitio_name'];
	}
	$crud->disconnect();
}

// //getSitio name user tbl
function getSitioName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM sitio_tbl WHERE sitio_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['sitio_name'];
	}
	$crud->disconnect();
}

//get sitio name
function gethousenumber($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['house_no'];
	}
	$crud->disconnect();
}

//get sitio name
function gethouse_id($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM houseno_tbl WHERE house_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['sitio_id_fk_house'];
	}
	$crud->disconnect();
}

function getCountofResidentMale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(house_no_fk) FROM resident_tbl WHERE house_no_fk='{$id}' AND gender='Male'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(house_no_fk)'];
	}
	$crud->disconnect();

}
function getCountofResidentFemale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(house_no_fk) FROM resident_tbl WHERE house_no_fk='{$id}' AND gender='Female'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(house_no_fk)'];
	}
	$crud->disconnect();

}

function countEmployeedResidentPersitioKagawadEmployedResidentList($id, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation!='' AND house_no_fk='{$id}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function countEmployeedResidentPersitioKagawadUnemployedResidentList($id, $fk){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM resident_tbl WHERE age>='18' AND occupation='' AND house_no_fk='{$id}' && sitio_id_fk_resident='{$fk}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}


//get or name
function getOrId($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM or_tbl WHERE brgy_id_fk_or='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['brgy_id_fk_or'];
	}
	$crud->disconnect();
}
//get or name
function getOrNumber($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM or_tbl WHERE brgy_id_fk_or='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['or_number'];
	}
	$crud->disconnect();
}

//get or name
function getOrIdReal($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM or_tbl WHERE brgy_id_fk_or='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['or_id'];
	}
	$crud->disconnect();
}

//get cedula name
function getCedulaId($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM cedula_tbl WHERE brgy_id_fk_cedula='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['cedula_no'];
	}
	$crud->disconnect();
}


function getTblResVal($result, $tablename, $pk, $id){ //result to return, table name, primary key, primary key value
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM $tablename WHERE $pk=$id");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs[$result];
	}

	$crud->disconnect();
}
//this function is to get the religion of every citizen in sta cruz
function getReligionName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM religion_tbl WHERE religion_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['religion_name'];
	}
	$crud->disconnect();
}

function getRevenue($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM revenue_tbl WHERE house_id_fk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['amount'];
	}
	$crud->disconnect();
}




function EmploymentStatus(){
	return array('Regular or Permanent'=>'Regular or Permanent',
				'Temporary'=>'Temporary',
				'Casual'=>'Casual',
				'Contractual'=>'Contractual',
				'Self-Employed'=>'Self-Employed');
}

function PlaceofWork(){
	return array('Locally'=>'Locally', 'Abroad'=>'Abroad');
}

// function Language(){
	// return array('Filipino', 'Tagalog', 'Bicolano', 'Ilocano', 'Ilonggo', 'Waray', 'Cebuano', 'Language_other');
// }

// function Education(){
	// return array('Pre-School/Day Care', 'Primary/Elementary', 'Secondary/High School', 'Vocational/Technical', 'College/University', 'Post Graduate', 'No Education Attained');
// }
//OK
function gender(){
	return array('1'=>'Male', '2'=>'Female');
}
//OK
function civilstatus(){
	return array('1'=>'Single',
				 '2'=>'Married',
				 '3'=>'Separated/Divorced',
				 '4'=>'Widowed/Widower',
				 '5'=>'Single Parent born a child but not married',
				 '6'=>'Married but not living with spouse');
}
//OK
function status(){
	return array('1'=>'Father (Tatay)',
				 '2'=>'Mother (Nanay)',
				 '3'=>'Daughter (Anak na babae)',
				 '4'=>'Son (Anak na Lalaki)',
				 '5'=>'Sister (Kapatid na babae ng Tatay or Nanay)',
				 '6'=>'Brother (Kapatid na lalaki ng Tatay or Nanay)',
				 '7'=>'Niece (pamangkin na babae)',
				 '8'=>'Nephew (pamangkin na lalaki)',
				 '9'=>'Cousin (Female)',
				 '10'=>'Cousin (Male)',
				 '11'=>'Grandmother (Lola)',
				 '12'=>'Grandfather (lolo)',
				 '13'=>'Sister in Law',
				 '14'=>'Brother in Law',
				 '15'=>'Stepson',
				 '16'=>'Stepdaughter',
				 '17'=>'Stepmother',
				 '18'=>'Stepfather',
				 '19'=>'Mother-in-Law (biyanang babae)',
				 '20'=>'Father-in-Law (biyanang lalaki)',
				 '21'=>'Son-In-Law (Manugang na Lalaki)',
				 '22'=>'Daughter-In-Law (Manugang na Babae)');
}
//ok
function languagestatus(){
	return array('1'=>'Filipino',
				 '2'=>'Tagalog',
				 '3'=>'Bicolano',
				 '4'=>'Ilocano',
				 '5'=>'Ilonggo',
				 '6'=>'Waray',
				 '7'=>'Cebuana');
}
//OK
function EducationAttain(){
	return array('1'=>'Pre-School/Day Care',
				 '2'=>'Primary/Elementary',
				 '3'=>'Secondary/High School',
				 '4'=>'Vocational/Technical',
				 '5'=>'College/University',
				 '6'=>'Post Graduate',
				 '7'=>'No Education Attained');
}
//ok
function OccupationProfile(){
	return array('1'=>'Officials of Government and Special-Interest Organizations',
				'2'=>'Professionals',
				'3'=>'Technicians and Associate Professionals',
				'4'=>'Clerks',
				'5'=>'Service workers and Shop and Market Sales Workers',
				'6'=>'Farmers Fish Forestry',
				'7'=>'Trades and Related Workers',
				'8'=>'Plant and machine Operators and Assemblers',
				'9'=>'Laborers and Unskilled Workers',
				'10'=>'Special Occupation');
}
//ok
function OccupationStatus(){
	return array('1'=>'Regular or Permanent',
				'2'=>'Temporary',
				'3'=>'Casual',
				'4'=>'Contractual',
				'5'=>'Self-Employed');
}


//this function is for the permit for the building and other resources clearance
function BuildingPermit(){
	return array('1'=>'Building',
				 '2'=>'Electrical',
				 '3'=>'Sanitary',
				 '4'=>'Plumbing',
				 '5'=>'Fencing');
}

function PurposeBuilding(){
	return array('1'=>'Construction or Repair of Residential House',
				 '2'=>'Business Establishment',
				 '3'=>'Fence',
				 '4'=>'House Electrical Installation');
}
//end of building permit function
//this function is to get the key and the result of permit and purpose of building permit
function getBuildingPermit($id){
	foreach(BuildingPermit() as $key => $val){
		if($id==$key){
			return $val;
		}
	}
}

function getPurposeBuilding($id){
	foreach(PurposeBuilding() as $key => $val){
		if($id==$key){
			return $val;
		}
	}
}

//end of the function and other for building permit clearance

function getOccstatus($id){
	foreach(OccupationStatus() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}

function getOccProfile($id){
	foreach(OccupationProfile() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}

function getidentityofAll($id){
	foreach(gender() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}

function getCivilStatus($id){
	foreach(civilstatus() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}
function getFamilyRole($id){
	foreach(status() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}
function getEducationAttain($id){
	foreach(EducationAttain() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}

function getLanguage($id){
	foreach(languagestatus() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}

?>
