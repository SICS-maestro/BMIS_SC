<?php
//date_default_timezone_set("Asia/Manila");

//Get File Extension.

//this is for  the connection for sending sms messages
function is_connected()
	{
		$connected = @fsockopen("www.google.com", 80); //website, port  (try 80 or 443)
		if ($connected){
		   	$is_conn = true; //action when connected
			fclose($connected);
		}else{
			$is_conn = false; //action in connection failure
		}
		return $is_conn;

	}
function getExtension($str){
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

function computeTime($request, $date_a, $date_b)
	{
		date_default_timezone_set("Asia/Manila");
		
		// $date1 = date('Y-m-d h:i:s', strtotime($date_a));
		// $date2 = date('Y-m-d h:i:s', strtotime($date_b));

		$diff = abs(strtotime($date_b) - strtotime($date_a));
		// $diff = abs($date2 - $date1);

		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

		$hours = floor($diff/(60*60));
		$minutes = floor($diff / 60);
		$seconds = floor($diff % 60);

		if($request=="years"){
			return $years;
		}elseif ($request=="months") {
			return $months;
		}elseif ($request=="days") {
			return $days;
		}elseif ($request=="hours") {
			return $hours;
		}elseif ($request=="minutes") {
			return $minutes;
		}elseif ($request=="seconds") {
			return $seconds;
		}
	}



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

function randomCodeSub($length, $string){
	/* $characters = '0123456789ABCDEFGHJKMNOPQRSTUVWXYZ'; */
	$characters = '0123456789'.$string;
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
function generateCode($length=8){
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		// $set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, $length);
		return $code;
	}

// function livestockName(){
// 	return array("1"=>"cattle", "2"=>"carabao", "3"=>"horse", "4"=>"goat", "5"=>"swine", "6"=>"piglet", "7"=>"native chicken", "8"=>"turkey", "9"=>"duck");
// }

function arrayMonth(){
	return array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
}
//this is to print the current printing page
function printPreviewTitle($printpage){
	if($printpage=="mortality_sales"){
		return "MORTALITY AND SALES REPORTS";
	}elseif($printpage=="farrowing_reports"){
		return "FARROWING RECORDS";
	}elseif($printpage=="breeding_list"){
		return "BREEDING RECORDS";
	}elseif($printpage=="promotionreport"){
		return "PROMOTION RECORDS";
	}elseif($printpage=="calendarreport"){
		return "CALENDAR MONITORING";
	}elseif($printpage=="experimentreport"){
		return "EXPERIMENT RECORDS";
	}elseif($printpage=="morpologyreport"){
		return "GROSS MORPOLOGY RECORDS";
	}elseif($printpage=="morpometricreport"){
		return "MORPOMETRIC RECORDS";
	}elseif($printpage=="slaughtered"){
		return "SLAUGHTERED RECORDS";
	}elseif($printpage=="insemination"){
		return "INSEMINATION RECORDS";
	}elseif($printpage=="inventory"){
		return "LIVESTOCK INVENTORY RECORD";
	}elseif($printpage=="santa_cruz"){
		return "SANTA CRUZ FARMER POPULATION";
	}elseif($printpage=="torrijos"){
		return "TORRIJOS FARMER POPULATION";
	}elseif($printpage=="buenavista"){
		return "BUENAVISTA FARMER POPULATION";
	}elseif($printpage=="gasan"){
		return "GASAN FARMER POPULATION";
	}elseif($printpage=="boac"){
		return "BOAC FARMER POPULATION";
	}elseif($printpage=="mogpog"){
		return "MOGPOG FARMER POPULATION";
	}elseif($printpage=="dailyInventory"){
		return "Native Pig Monthly Inventory";
	}elseif($printpage=="stat"){
		return "Statistical Reports";
	}elseif($printpage=="scprint"){
		return "Native Pig Population in Santa Cruz";
	}elseif($printpage=="torrijosprint"){
		return "Native Pig Population in Torrijos";
	}elseif($printpage=="buenavistaprint"){
		return "Native Pig Population in Buenavista";
	}elseif($printpage=="gasanprint"){
		return "Native Pig Population in Gasan";
	}elseif($printpage=="boacprint"){
		return "Native Pig Population in Boac";
	}elseif($printpage=="mogpogprint"){
		return "Native Pig Population in Mogpog";
	}elseif($printpage=="printfarmerperbarangay"){
		return "PRINT FARMER PER BARANGAY";
	}




}
//this is to show the natural or artificial intelligence
function InseMethod(){
	return array('1'=>'Natural', '2'=>'Artificial Insemination');
}
//this is to show decreases
function Other(){
	return array('1'=>'Sold', '2'=>'Experiment', '3'=>'Promotion', '4'=>'Culled');
}


// function lot_type($type){
// 	if($type==1){
// 		return "Own Lot";
// 	}elseif($type==2){
// 		return "Tenant";
// 	}
// }

// function array_lshstat(){
// 	return array('1'=>'healthy', '2'=>'unhealthy', '3'=>'pregnant', '4'=>'with calf', '5'=>'with calb', '6'=>'with piglets', '7'=>'disposed', '8'=>'replaced', '9'=>'deceased');
// }

function get_lshstat($id){
	foreach(array_lshstat() as $key => $stat){
		if($id==$key){
			return $stat;
		}
	}
}

function getTblResVal($result, $tablename, $pk, $id){ //result to return, table name, primary key, primary key value
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from $tablename where $pk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs[$result];
	}

	$crud->disconnect();
}

function checkExistingRequest($farmer_id, $status){
	$crud = new CRUD();
	$crud->connect();
	date_default_timezone_set("Asia/Manila");
	$yr = date('Y');

	$data = 0;
	$and_stat="";
	if($status=='pending'){
		$and_stat = "and livestockreq_status='pending'";
	}elseif($status=='approved'){
		$and_stat = "and (livestockreq_status='approved' or livestockreq_status='released')";
	}

	$crud->sql("select * from livestockrequests where farmer_id_fk='{$farmer_id}' $and_stat");
	$r = $crud->getResult();
	$rows = $crud->numRows();
	if($rows>0){
		foreach($r as $rs){
			$req_yr = date('Y', $rs['livestockreq_date']);
			if($req_yr==$yr){
				$data=1;
			}else{
				$data=0;
			}
		}
	}
	return $data;

	$crud->disconnect();
}


//existing data
function checkDataExistForUsername($field)
	{
		$crud = new CRUD();
		$crud->connect();

		$crud->sql("select * from users where username='{$field}'");
		$r = $crud->getResult();
		$rowcheck = $crud->numRows();

		return $rowcheck;

		$crud->disconnect();
	}

//username checking for forgot password
function checkUsername($user)
	{
		$crud = new CRUD();
		$crud->connect();

		$crud->sql("select * from users where userid='{$user}'");
		$r = $crud->getResult();
		$rowuser = $crud->numRows();

		return $rowuser;

		$crud->disconnect();
	}
	//number checking for forgot password
	function checkUserNumber($number)
		{
			$crud = new CRUD();
			$crud->connect();

			$crud->sql("select * from users where userid='{$number}'");
			$r = $crud->getResult();
			$rownumber = $crud->numRows();

			return $rownumber;

			$crud->disconnect();
		}

// function getLiveStockName($id){
// 	$crud = new CRUD();
// 	$crud->connect();
//
// 	$crud->sql("select * from livestock where livestock_id='{$id}'");
// 	$r = $crud->getResult();
// 	foreach($r as $rs){
// 		return $rs['livestock_name'];
// 	}
//
// 	$crud->disconnect();
// }
//function for getting data to pigs_tbl
function getEarnotch($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['province']." ".$rs['earnotch'];

	}
	$crud->disconnect();
}
//function for getting data to breeding_tbl
function getBreeding($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from breeding_tbl where breeding_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['breeding_id'];

	}
	$crud->disconnect();
}
//function for getting data to pigs_tbl
function getEarnotchID($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['earnotch'];

	}
	$crud->disconnect();
}
//function for getting data to pigs_tbl
function getMortalityStat($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['mortality_status'];

	}
	$crud->disconnect();
}
//function for getting birthday of pig
function getBirthday($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['date_of_birth'];

	}
	$crud->disconnect();
}
//function for getting sex of the pig
function getSex($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['sex'];

	}
	$crud->disconnect();
}
//function for getting breed
function getBreed($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['breed'];

	}
	$crud->disconnect();
}
//function for snout
function getSnout($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['snout_length'];

	}
	$crud->disconnect();
}
//function for head length
function getHead_length($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['head_length'];

	}
	$crud->disconnect();
}
//function for heart girth
function getHeart_girth($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['heart_girth'];

	}
	$crud->disconnect();
}
//function for body length
function getBody_length($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['body_length'];

	}
	$crud->disconnect();
}
//function for tail length
function getTail_length($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['tail_length'];

	}
	$crud->disconnect();
}
//function for pelvic
function getPelvic($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['pelvic_width'];

	}
	$crud->disconnect();
}
//function for teat
function getTeat($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['no_teats'];

	}
	$crud->disconnect();
}
//function TO GET THE ID OF FARROWED
function getFarrowedID($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from breeding_tbl where breeding_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['breeding_id'];

	}
	$crud->disconnect();
}
//function TO GET THE ID OF PIG
function getPigID($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['pig_id'];

	}
	$crud->disconnect();
}
//birth weight
function getBirthweight($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		if($rs['weight_240']!=0){
			return $rs['weight_240'];
		}elseif($rs['weight_210']!=0){
			return $rs['weight_210'];
		}elseif($rs['weight_180']!=0){
			return $rs['weight_180'];
		}elseif($rs['weight_150']!=0){
			return $rs['weight_150'];
		}elseif($rs['weight_90']!=0){
			return $rs['weight_90'];
		}elseif($rs['weight_60']!=0){
			return $rs['weight_60'];
		}elseif($rs['weight_45']!=0){
			return $rs['weight_45'];
		}elseif($rs['weight_35']!=0){
			return $rs['weight_35'];
		}else{
			return $rs['birthweight'];
		}
	}
	$crud->disconnect();
}
//birth weight date
function getBirthweightdate($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		if($rs['weight_180']!=0){
			return $rs['date_180'];
		}elseif($rs['weight_150']!=0){
			return $rs['date_150'];
		}elseif($rs['weight_90']!=0){
			return $rs['date_90'];
		}elseif($rs['weight_60']!=0){
			return $rs['date_60'];
		}elseif($rs['weight_45']!=0){
			return $rs['date_45'];
		}elseif($rs['weight_35']!=0){
			return $rs['date_35'];
		}else{
			return 'No Updates Yet';
		}
	}
	$crud->disconnect();
}
//function TO GET THE ID OF PIG
function getIDAnimal($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['date_born'];

	}
	$crud->disconnect();
}
//getting the age of every pig
function getNumberOfDays($date1, $date2)
	{
		$datetime1 = new DateTime($date1);
		$datetime2 = new DateTime($date2);
		$interval = $datetime1->diff($datetime2);
		return $interval->format('%a');
	}

//getting the age of the pig
function facebook_time_ago($TIMESTAMP)
		{
			$time_ago = strtotime($TIMESTAMP);
			$current_time = time();
			$time_difference = $current_time - $time_ago;

			$seconds = $time_difference;
			$minutes = round($seconds / 60);		//60 seconds
			$hours = round($seconds / 3600);		//60 * 60
			$days = round($seconds / 86400);	// 24 * 60 * 60
			$weeks = round($seconds / 604800); //7*24*60*60
			$months = round($seconds / 2629440);
			$years = round($seconds / 31553280);

			if($seconds <=60 )
			{
				return "Born Now";
			}
			else if($minutes <=60)
			{
				if($minutes==1)
				{
					return "one minute ago";
				}
				else
				{
					return "$minutes minutes ago";
			}
			}
			else if($hours <=24)
			{
				if($hours==1)
				{
					return "one hour old";
				}
				else
				{
					return "$hours hrs old";
			}
			}
			else if($days <=7)
			{
				if($days==1)
				{
					return "yesterday";
				}
				else
				{
					return "$days days old";
			}
			}
			else if($weeks <=4.3) //4.3 == 52/12
			{
				if($weeks==1)
				{
					return "a week old";
				}
				else
				{
					return "$weeks weeks old";
			}
			}
			else if($months <=12)
			{
				if($months==1)
				{
					return "a month old";
				}
				else
				{
					return "$months months old";
			}
			}
			else
			{
				if($years==1)
				{
					return "one year old";
				}
				else
				{
					return "$years years old";
				}
			}
		}

//getting id of user
function getUserID($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from users where userid='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['userid'];
	}

	$crud->disconnect();
}
//getting id birthday experiment
function getExpB($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from experiment_tbl where exp_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['date'];
	}

	$crud->disconnect();
}



#################################################################################################################
//get parity order
function getParityF($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['parity_no'];
	}
	$crud->disconnect();
}



#################################################################################################################
//this is to find the maximum number among the batch number
function getMaxBatch(){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT MAX(batch_no) from breeding_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['MAX(batch_no)'];

	}

	$crud->disconnect();
}

function getParity($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(sow_id_fk) from breeding_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(sow_id_fk)'].'-'.$rs['sow_id_fk'];
	}
	$crud->disconnect();

}




#################################################################################################################
//chart for counting hair type
function gethair_type1($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(hair_type) from pigs_tbl where hair_type='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(hair_type)'];
	}

	$crud->disconnect();
}
//HAIR TYPE
function gethair_type2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(hair_type) from pigs_tbl where hair_type='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(hair_type)'];
	}

	$crud->disconnect();
}
//HAIR LENGTH
function gethair_length($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(hair_length) from pigs_tbl where hair_length='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(hair_length)'];
	}

	$crud->disconnect();
}
//HAIR LENGTH
function gethair_length2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(hair_length) from pigs_tbl where hair_length='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(hair_length)'];
	}

	$crud->disconnect();
}
//COAT COLOR
function getCoat($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(coat_color) from pigs_tbl where coat_color='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(coat_color)'];
	}

	$crud->disconnect();
}
//COAT COLOR
function getCoat2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(coat_color) from pigs_tbl where coat_color='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(coat_color)'];
	}

	$crud->disconnect();
}
//COLOR PATTERN
function getColor($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(color_pattern) from pigs_tbl where color_pattern='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(color_pattern)'];
	}

	$crud->disconnect();
}
//COLOR PATTERN
function getColor2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(color_pattern) from pigs_tbl where color_pattern='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(color_pattern)'];
	}

	$crud->disconnect();
}
//HEAD SHAPE
function gethead($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(head_shape) from pigs_tbl where head_shape='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(head_shape)'];
	}

	$crud->disconnect();
}
//HEAD SHAPE
function gethead2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(head_shape) from pigs_tbl where head_shape='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(head_shape)'];
	}

	$crud->disconnect();
}
//skin type
function getskin($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(skin_type) from pigs_tbl where skin_type='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(skin_type)'];
	}

	$crud->disconnect();
}
//skin type
function getskin2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(skin_type) from pigs_tbl where skin_type='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(skin_type)'];
	}

	$crud->disconnect();
}
//EAR
function getear($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(ear_type) from pigs_tbl where ear_type='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(ear_type)'];
	}

	$crud->disconnect();
}
//EAR
function getear2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(ear_type) from pigs_tbl where ear_type='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(ear_type)'];
	}

	$crud->disconnect();
}
//EAR
function getear3($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(ear_type) from pigs_tbl where ear_type='3' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(ear_type)'];
	}
	$crud->disconnect();
}
//tail
function getail($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(tail_type) from pigs_tbl where tail_type='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(tail_type)'];
	}
	$crud->disconnect();
}
//tail
function getail2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(tail_type) from pigs_tbl where tail_type='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(tail_type)'];
	}
	$crud->disconnect();
}
//back
function getBack($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(backline) from pigs_tbl where backline='1' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(backline)'];
	}
	$crud->disconnect();
}
//back
function getBack2($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(backline) from pigs_tbl where backline='2' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(backline)'];
	}
	$crud->disconnect();
}
#################################################################################################################
#################################################################################################################
//dashboard content chart
//2016-2020
function getmaleyear($id){
	$crud = new CRUD();
	$crud->connect();

	$strnow = date('m/d/{$id}');
	$crud -> sql("SELECT *, COUNT(sex) FROM pigs_tbl WHERE date_of_birth LIKE '%/%/{$id}' AND sex='male' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(sex)'];
	}
	$crud->disconnect();
}
function getfemaleyear($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(sex) FROM pigs_tbl WHERE date_of_birth LIKE '%/%/{$id}' AND sex='female' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(sex)'];
	}
	$crud->disconnect();
}
function getmortality($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(pig_id_fk) FROM mortality_tbl WHERE date_died LIKE '%/%/{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(pig_id_fk)'];
	}
	$crud->disconnect();
}
function getsale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(pig_id_fk_sales) FROM sales_tbl WHERE date_sales LIKE '%/%/{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(pig_id_fk_sales)'];
	}
	$crud->disconnect();
}
#################################################################################################################
#################################################################################################################

#################################################################################################################
//this is for the inventory
//getting the number of inventory  total alive

function getTotalnventory($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(mortality_status) from pigs_tbl where mortality_status='alive' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(mortality_status)'];
	}

	$crud->disconnect();
}
//suckling male
function getSuckMale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='suckling' and sex='male' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//suckling female
function getSuckFemale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='suckling' and sex='female' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//weaning male
function getWeanMale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='weaning' and sex='male' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//weaning female
function getWeanFemale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='weaning' and sex='female' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//growing male
function getGrowMale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='growing' and sex='male' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//growing female
function getGrowFemale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='growing' and sex='female' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//finishing male
function getFinMale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='finishing' and sex='male' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//finishing male
function getFinFemale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='finishing' and sex='female' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
//purchased
function getPurchase($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(mortality_status) from pigs_tbl where mortality_status='purchased' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(mortality_status)'];
	}

	$crud->disconnect();
}
//experiment
function getExperiment($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(mortality_status) from pigs_tbl where mortality_status='experiment' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(mortality_status)'];
	}

	$crud->disconnect();
}
//promotion
function getPromotion($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(mortality_status) from pigs_tbl where mortality_status='promotion' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(mortality_status)'];
	}

	$crud->disconnect();
}
//sales
function getSales($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(mortality_status) from pigs_tbl where mortality_status='sales' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(mortality_status)'];
	}

	$crud->disconnect();
}
//died
function getDied($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(mortality_status) from pigs_tbl where mortality_status='died' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(mortality_status)'];
	}

	$crud->disconnect();
}
//junior boar
function getJuniorBoar($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(parity_no) from pigs_tbl where parity_no='1' and mortality_status='alive' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(parity_no)'];
	}

	$crud->disconnect();
}
//junior boar
function getSeniorBoar($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(parity_no) from pigs_tbl where parity_no>='2' and mortality_status='alive' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(parity_no)'];
	}

	$crud->disconnect();
}
//junior boar
function getLactating($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select *, COUNT(morta_status) from pigs_tbl where morta_status='lactating' and mortality_status='alive' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(morta_status)'];
	}

	$crud->disconnect();
}
#################################################################################################################
//slaugthered record file
//ear length
function getEarlength($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['ear_length'];

	}
	$crud->disconnect();
}

#################################################################################################################
//getting age of pig
function getPigAge($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from pigs_tbl where pig_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['age'];

	}
	$crud->disconnect();
}

#################################################################################################################
//all function for the sms
function dayScheduleA()
	{
	$scheduleDay = array(45, 60, 90, 120, 150, 180, 210, 240);
	return $scheduleDay;
	}
//get pig data
function getPigMonitoring(){
			$crud = new CRUD();
			$crud->connect();
			$pig_for_morph = array();
			$function = dayScheduleA();

			$crud->sql("select * from pigs_tbl where mortality_status='alive' order by earnotch asc");
			$pigs = $crud -> getResult();
			foreach ($pigs as $pig) {
				$pig_id = $pig['pig_id'];
				if (in_array($pig['age'], $function)) { // if Current Age is equal to array values of the function dayScheduleA()
				// it will put the data of pig on the $pig_for_morph variable
				 $pig_for_morph[$pig_id] = $pig['earnotch'].' ('.$pig['age'].' days)';

				}
			}
				return $pig_for_morph;

}
//checking sms logs
function checksmslog($now){
			$crud = new CRUD();
			$crud->connect();
			$c = 0;
			$crud->sql("select * from message_logs order by date_created asc");
			$sms_logss = $crud -> getResult();
			if (count($sms_logss)>0) {
			foreach($sms_logss as $sms_log){
					$d = date('Y-m-d',strtotime($sms_log['date_created']));
					if($now==$d){
						$c++;
					}
					else{
					}
				}
			}
			return $c;

}

function getSmsSetting()
	{
			$crud = new CRUD();
			$crud->connect();

			$crud->sql("select * from api_tbl where api_id!='0'");
			$r = $crud->getResult();
			foreach($r as $rs){
				return $rs['api_code'];

			}
			$crud->disconnect();
	}

function getUserPhone()
	{
			$crud = new CRUD();
			$crud->connect();

			$crud->sql("select * from users where useractive='1'");
			$r = $crud->getResult();
			foreach($r as $rs){
				return $rs['phone_num'];

			}
			$crud->disconnect();
	}
#################################################################################################################
//this function is for inventory date

function getInventoryDate($id){
	$crud = new CRUD();
	$crud->connect();
	$now = date('m/d/Y');
	$crud->sql("select * from inventory_tbl where inventory_date='{$now}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['inventory_date'];

	}
	$crud->disconnect();
}

#################################################################################################################
//mapping function to get the id of mapping
function checkBrgyId_by_Coords($coords){

	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from barangay_tbl where brgy_coordinates='{$coords}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	if($row>0){
		foreach($r as $rs){
			return $rs['barangay_id'];
		}
	}else{
		return 0;
	}
	$crud->disconnect();
}

function checkBrgyId($id){

	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from barangay_tbl where barangay_id='{$id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	if($row>0){
		foreach($r as $rs){
			return $rs['barangay_id'];
		}
	}else{
		return 0;
	}
	$crud->disconnect();
}

// get barangay name

function getBrgyName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from barangay_tbl where barangay_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['barangay_name'];
	}

	$crud->disconnect();
}

//count number of farmers
function totalfarmer($farmer_id){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select *, COUNT(barangay_id_fk) from farmers_tbl where barangay_id_fk='{$farmer_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(barangay_id_fk)'];
	}
	$crud->disconnect();
}
//count number of farmers
function totalfarmer_male($farmer_id){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select *, COUNT(barangay_id_fk) from farmers_tbl where barangay_id_fk='{$farmer_id}' and care_of_pig='Male / Husband'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(barangay_id_fk)'];
	}
	$crud->disconnect();
}
//count number of farmers
function totalfarmer_female($farmer_id){

	$crud = new CRUD();
	$crud->disconnect();
	$crud -> sql("select *, COUNT(barangay_id_fk) from farmers_tbl where barangay_id_fk='{$farmer_id}' and care_of_pig='Female / Wife'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(barangay_id_fk)'];
	}
	$crud->disconnect();
}
//count number of farmers
function totalfarmer_Cmale($farmer_id){

	$crud = new CRUD();
	$crud->disconnect();
	$crud -> sql("select *, COUNT(barangay_id_fk) from farmers_tbl where barangay_id_fk='{$farmer_id}' and care_of_pig='Children / Male'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(barangay_id_fk)'];
	}
	$crud->disconnect();
}
//count number of farmers
function totalfarmer_Cfemale($farmer_id){

	$crud = new CRUD();
	$crud->disconnect();
	$crud -> sql("select *, COUNT(barangay_id_fk) from farmers_tbl where barangay_id_fk='{$farmer_id}' and care_of_pig='Children / Female'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(barangay_id_fk)'];
	}
	$crud->disconnect();
}

#################################################################################################################
//marinduque
function checkMunicipalityId_by_Coords($coords){

	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from municipality_tbl where municipality_coords='{$coords}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	if($row>0){
		foreach($r as $rs){
			return $rs['municipality_id'];
		}
	}else{
		return 0;
	}
	$crud->disconnect();
}
// get municipality name
function getMunName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from municipality_tbl where municipality_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['municipality_name'];
	}

	$crud->disconnect();
}
//count total pop mun
function totalfarmer_Mun($mun_id){

	$crud = new CRUD();
	$crud->disconnect();
	$crud -> sql("select *, COUNT(municipality_id_fk) from farmers_tbl where municipality_id_fk='{$mun_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(municipality_id_fk)'];
	}
	$crud->disconnect();
}
// checking if the data is already save in morphometric table
// get municipality name
function checkMorphometricData($morphoid){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM morphometric_tbl WHERE morpho_pig_id_fk='{$morphoid}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	if($row>0){
		foreach($r as $rs){
			return $rs['morpho_pig_id_fk'];
		}
	}else{
		return 0;
	}
	$crud->disconnect();
}
// checking if the data is already save in morphometric table
function checkMorphometricAge($age){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("SELECT * FROM morphometric_tbl WHERE morpho_days='{$age}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	if($row>0){
		foreach($r as $rs){
			return $rs['morpho_days'];
		}
	}else{
		return 0;
	}
	$crud->disconnect();
}
#################################################################################################################
#################################################################################################################
#################################################################################################################

#################################################################################################################
//count number of farmers
function totalboar($municipality_fk){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_boar) as totalboar from farmers_tbl where municipality_id_fk='{$municipality_fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['totalboar'];
	}
	$crud->disconnect();
}
#################################################################################################################
//count total number of farmers
function totalboarall($municipality_fk){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_boar) as totalboarall from farmers_tbl where municipality_id_fk='{$municipality_fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['totalboarall'];
	}
	$crud->disconnect();
}

function native_sow_lac($municipality_fk){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_lac) as nativesow_lac from farmers_tbl where municipality_id_fk='{$municipality_fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_lac'];
	}
	$crud->disconnect();
}

function native_sow_preg($municipality_fk){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_preg) as nativesow_preg from farmers_tbl where municipality_id_fk='{$municipality_fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_preg'];
	}
	$crud->disconnect();
}

function native_sow_dry($municipality_fk){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_dry) as nativesow_dry from farmers_tbl where municipality_id_fk='{$municipality_fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_dry'];
	}
	$crud->disconnect();
}

function native_sow_mated($municipality_fk){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_mated) as nativesow_mated from farmers_tbl where municipality_id_fk='{$municipality_fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_mated'];
	}
	$crud->disconnect();
}
function native_gilt_mated($municipality_fk){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_gilt_mated) as nativesow_gilt from farmers_tbl where municipality_id_fk='{$municipality_fk}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_gilt'];
	}
	$crud->disconnect();
}


#################################################################################################################
//count total number in marinduque chart functions in index.php
function totalboaralla(){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_boar) as totalboaralla from farmers_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['totalboaralla'];
	}
	$crud->disconnect();
}

function native_sow_laca(){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_lac) as nativesow_laca from farmers_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_laca'];
	}
	$crud->disconnect();
}

function native_sow_prega(){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_preg) as nativesow_prega from farmers_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_prega'];
	}
	$crud->disconnect();
}

function native_sow_drya(){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_dry) as nativesow_drya from farmers_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_drya'];
	}
	$crud->disconnect();
}

function native_sow_mateda(){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_sow_mated) as nativesow_mateda from farmers_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_mateda'];
	}
	$crud->disconnect();
}
function native_gilt_mateda(){

	$crud = new CRUD();
	$crud->disconnect();

	$crud -> sql("select SUM(native_gilt_mated) as nativesow_gilta from farmers_tbl");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['nativesow_gilta'];
	}
	$crud->disconnect();
}

#################################################################################################################
//count the number of farmers profiles
//female
function getGraphMarinduqueFemale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(municipality_id_fk) FROM farmers_tbl WHERE care_of_pig IN('Female / Wife','Children / Female') AND municipality_id_fk='{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(municipality_id_fk)'];
	}
	$crud->disconnect();

}
//male
function getGraphMarinduqueMale($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(municipality_id_fk) FROM farmers_tbl WHERE care_of_pig IN('Male / Husband','Children / Male') AND municipality_id_fk='{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(municipality_id_fk)'];
	}
	$crud->disconnect();

}
function getGraphFemaleByMunicipality($year,$id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(municipality_id_fk) FROM farmers_tbl WHERE farmer_date LIKE '%/%/{$year}' AND care_of_pig IN('Female / Wife','Children / Female') AND municipality_id_fk='{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(municipality_id_fk)'];
	}
	$crud->disconnect();
}
function getGraphMaleByMunicipality($year,$id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(municipality_id_fk) FROM farmers_tbl WHERE farmer_date LIKE '%/%/{$year}' AND care_of_pig IN('Male / Husband','Children / Male') AND municipality_id_fk='{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(municipality_id_fk)'];
	}
	$crud->disconnect();
}
#################################################################################################################
//transfering to count the current native pig already have by the farmers
function getCountOfTransferedNativePig($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT *, COUNT(farmer_id_fk) FROM pigs_tbl WHERE farmer_id_fk='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['COUNT(farmer_id_fk)'];
	}
	$crud->disconnect();
}

function getFarmersMSCName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT * FROM farmers_tbl WHERE farmer_id='{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['respondent_name'];
	}
	$crud->disconnect();
}

#################################################################################################################
//siblings records to find the farmer id connected to native pig
function getFarmersMSCID($id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("SELECT * FROM pigs_tbl WHERE pig_id='{$id}' ");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['farmer_id_fk'];
	}
	$crud->disconnect();
}


#################################################################################################################

// this is for getting standard deviation of the result of statistical treatment
// function statsStandardDeviation(array $a, $sample = false) {
        // $n = count($a);
        // if ($n === 0) {
            // trigger_error("The array has zero elements", E_USER_WARNING);
            // return false;
        // }
        // if ($sample && $n === 1) {
            // trigger_error("The array has only 1 element", E_USER_WARNING);
            // return false;
        // }
        // $mean = array_sum($a) / $n;
        // $carry = 0.0;
        // foreach ($a as $val) {
            // $d = ((double) $val) - $mean;
            // $carry += $d * $d;
        // };
        // if ($sample) {
           // --$n;
        // }
        // return sqrt($carry / $n);
    // }




// function getStandardDeviation($arr)
	// {
		// if (!function_exists('stats_standard_deviation')) {
			// return statsStandardDeviation($arr);
		// }else{
			// return stats_standard_deviation($arr);
		// }
	// }

#################################################################################################################



function getBrgyOffName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from barangay_official where brgyoff_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['brgyoff_fname']." ".$rs['brgyoff_lname'];
	}

	$crud->disconnect();
}

function getBrgyOffBrgy($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from barangay_official where brgyoff_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['brgy_id_fk'];
	}

	$crud->disconnect();
}

function checkBrgyOff($brgy_id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from barangay_official where brgy_id_fk='{$brgy_id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();
	return $row;

	$crud->disconnect();
}

function getBrgyOffDetails($returnval, $userid){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from barangay_official inner join users on users.brgyoff_id_fk=barangay_official.brgyoff_id where users.userid='{$userid}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs[$returnval];
	}

	$crud->disconnect();
}

function getFarmerName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from farmers where farmer_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['farmer_fname']." ".$rs['farmer_lname'];
	}

	$crud->disconnect();
}

// get the name of the user
function getUserName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from users where userid='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['username']." ".$rs['usertype'];
	}
	$crud->disconnect();
}
//get full name
function getFullName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from users where userid='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['fullname'];
	}
	$crud->disconnect();
}
//get image
function getImage($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from users where userid='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['photo'];
	}
	$crud->disconnect();
}


function countBgyFarmer($brgy_id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from farmers where farmer_brgy='{$brgy_id}'");
	$r = $crud->getResult();
	$row = $crud->numRows();

	return ($row!=0) ? $row : '-';

	$crud->disconnect();
}

function getFarmerBrgy($farmer_id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from farmers where farmer_id='{$farmer_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['farmer_brgy'];
	}

	$crud->disconnect();
}

function getAssocName($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from associations where assoc_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['assoc_presfname']." ".$rs['assoc_preslname'];
	}

	$crud->disconnect();
}

function getAssocNameSub($id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from associations where assoc_id='{$id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['assoc_name'];
	}

	$crud->disconnect();
}

function getAssocBrgy($assoc_id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from associations where assoc_id='{$assoc_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['brgy_id_fk'];
	}

	$crud->disconnect();
}

function getAssocId_for_farmer($farmer_id){
	$crud = new CRUD();
	$crud->connect();

	$crud->sql("select * from farmers where farmer_id='{$farmer_id}'");
	$r = $crud->getResult();
	foreach($r as $rs){
		return $rs['farmer_assoc_id'];
	}

	$crud->disconnect();
}

function checkExistingMonSched($brgy_id){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select * from monitoring_list where brgy_id_fk='{$brgy_id}' and ml_stat=0");
	$rs_mlx = $crud -> getResult();
	$count_ml = $crud -> numRows();
	return $count_ml;
	$crud->disconnect();
}

function countBrgyLivestockProd($livestock_id, $brgy_id){
	$crud = new CRUD();
	$crud->connect();

	$lr_prod = 0;
	$ld_prod = 0;
	$and = "";
	if($brgy_id!=0){
		$and = "and brgy_id_fk='{$brgy_id}'";
	}
	$crud -> sql("select sum(livestockreq_produced) as lrprod, livestock_id_fk, brgy_id_fk from livestockrequests where livestock_id_fk='{$livestock_id}' $and and livestockreq_produced!=0");
	$rs_lr = $crud -> getResult();
	foreach($rs_lr as $rs_lr_val){
		$lr_prod = $rs_lr_val['lrprod'];
	}

	$crud -> sql("select sum(ld_produced) as ldprod, livestock_id_fk, brgy_id_fk from livestock_dispersal where livestock_id_fk='{$livestock_id}' $and and ld_produced!=0");
	$rs_ld = $crud -> getResult();
	foreach($rs_ld as $rs_ld_val){
		$ld_prod = $rs_ld_val['ldprod'];
	}

	return $lr_prod + $ld_prod;

	$crud->disconnect();
}

function nfab($brgy_id, $request){
	$crud = new CRUD();
	$crud->connect();

	$assoc_id = 0;
	$assoc_pres = "";

	$crud -> sql("select * from associations where brgy_id_fk='{$brgy_id}' and assoc_activestat='1'");
	$rs = $crud->getResult();
	$row = $crud->numRows();
	foreach($rs as $rsval){
		$assoc_id = $rsval['assoc_id'];
		$assoc_pres = $rsval['assoc_presfname']." ".$rsval['assoc_preslname'];
	}

	if($request=="assocpres"){
		return $assoc_pres;
	}elseif($request=="numofmember"){
		$crud -> sql("select * from farmers where farmer_assoc_id='".$assoc_id."' and farmer_activestat='1'");
		$rsf = $crud->getResult();
		$rowf = $crud->numRows();
		return $rowf;
	}
	$crud->disconnect();
}

function nfab_a($brgy_id, $gender){
	$crud = new CRUD();
	$crud->connect();

	$crud -> sql("select * from farmers where farmer_gender='".$gender."' and farmer_activestat='1' and farmer_brgy='".$brgy_id."'");
	$rsf = $crud->getResult();
	$rowf = $crud->numRows();
	return $rowf;

	$crud->disconnect();
}
//this is for getting ip address of the user
function get_ip() {
		$mainIp = '';
		if (getenv('HTTP_CLIENT_IP'))
			$mainIp = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$mainIp = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$mainIp = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$mainIp = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$mainIp = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$mainIp = getenv('REMOTE_ADDR');
		else
			$mainIp = 'UNKNOWN';
		return $mainIp;
	}
?>
