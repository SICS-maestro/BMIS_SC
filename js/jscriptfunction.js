function confirmSubmit(){
	if(confirm("Do you really want to continue?")){
		return true;
	}else{
		return false;
	}
}

function confirmCloseform(){
	if(confirm("DO YOU REALLY WANT TO CLOSE THIS FORM?")){
		return true;
	}else{
		return false;
	}
}

function confirmSubmitResident(){
	if(confirm("Do you really want to Continue and Save Profile of Resident?")){
		return true;
	}else{
		return false;
	}
}

function confirmSubmitlogo(){
	if(confirm("Do you really want to Continue and Save Logo of Barangay?")){
		return true;
	}else{
		return false;
	}
}

function capitalizeFirstLetter(string) {
	return string.charAt(0).toUpperCase() + string.slice(1);
}
	
function deactivateUser(id){
	if(confirm("DO YOU REALLY WANT TO DE-ACTIVATE THIS USER?")){
		$('#btn_user_id_'+id).html('Deactivating...').attr('disabled','disabled').fadeTo(200, 1, function(){
			var url = '../models/useraddeditfunction.php?action=DeactivateUser&user_id=' + id;
			$.get(url, function(data){
				if(data==1){
					// $('#row_user'+id).fadeOut('slow');
					window.location.href="";
				}else{
					$('#btn_user_id_'+id).html('&times;').removeAttr('disabled','disabled');
					alert("DEACTIVATING FAILED!");
				}
				return false;
			});
		});
		return false;
	}
}

function ActivatUser(id){
	if(confirm("DO YOU REALLY WANT TO RE-ACTIVATE THIS USER?")){
		$('#btn_user_id_'+id).html('Activating...').attr('disabled','disabled').fadeTo(200, 1, function(){
			var url = '../models/useraddeditfunction.php?action=ActivateUserS&user_id=' + id;
			$.get(url, function(data){
				if(data==1){
					// $('#row_user'+id).fadeOut('slow');
					window.location.href="";
				}else{
					$('#btn_user_id_'+id).html('&times;').removeAttr('disabled','disabled');
					alert("ACTIVATING ACCOUNT FAILED!");
				}
				return false;
			});
		});
		return false;
	}
}




function confirmAction(url, message){
	if(confirm(message)){
		window.location.href=url;
	}else{
		return false;
	}
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function restrictEleven(field){
	var f = document.getElementById(field);
	if(f.value.length < parseFloat(11)){
		alert('Cellphone number must be Eleven digits.');
		$('#'+field).focus();
	}
	return false;
}

function allNumbers(inputs){
    var numbers = /^[0-9]*\.?[0-9]*$/;
      if(document.getElementById(inputs).value.match(numbers))  {
      return true;
      }  else  {
      alert('PLEASE INPUT NUMBERS ONLY');
			document.getElementById(inputs).value="";
			document.getElementById(inputs).focus();
      return false;
      }
}
function limitText(field,limit){
	var f = document.getElementById(field);
	if(f.value.length > limit){
		f.value = f.value.substring(0, limit);
	}
	return false;
}

var $ = jQuery.noConflict();
jQuery(document).ready(function ($) {
	
	
	// $('[data-toggle="tooltip"]').tooltip();
	
	$('#time').timepicki();
	$('#set_time').timepicki();
	
	// $('#BotBootInput').focus(function(){
		// $('#rmsg').html('').removeAttr();
		// $('#BotBootInput').val('');
		// return false;
	// });
	
	function datePickedNoNext(element_id){
		var dateToday = new Date();
		var dates = $('#'+element_id).datepicker({
			//defaultDate: "+1m",
			changeMonth: true,
			changeYear: true,
			maxDate: "+0m +0d",
		});
	}
	function datePickedNoPrev(element_id){
		var dateToday = new Date();
		var dates = $('#'+element_id).datepicker({
			//defaultDate: "+1m",
			changeMonth: true,
			changeYear: true,
			minDate: "+0m +0d",
		});
	}
	function datePick(element_id){
		$('#'+element_id).datepicker({
			changeMonth: true,
			changeYear: true,
		});
	}
	datePickedNoNext('or_date');
	datePickedNoNext('cedula_date');
	datePickedNoNext('or_date_not');
	datePickedNoNext('cedula_date_not');
	datePickedNoNext('bdate');
	datePickedNoNext('blotter_date');
	datePickedNoPrev('set_Schedule');
	});

function updateAge(){
	var url="../models/ajaxaddeditfunction.php?action=updateAgeofResident";

	$.get(url, function(data){
		console.log(data);
		
	});
	return false;
}


function ageCompute(dobfield, agefield) { //looped text fields of age
	var date1 = new Date();
	var dob= document.getElementById(dobfield).value;
	var date2=new Date(dob);
	var pattern =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/; //Regex to validate date format (mm/dd/yyyy)
	if (pattern.test(dob)) {
		if(dob!=null){
			var y1 = date1.getFullYear(); //getting current year
			var y2 = date2.getFullYear(); //getting dob year
			
			var m1= date1.getMonth() + 1;
			var m2= date2.getMonth() +1;
			
			if(m2 <= m1){
				var age = y1 - y2;           //calculating age 
			}else{
				age = (y1-1) - y2;
			}
		
			document.getElementById(agefield).value=age;
		}
	} 
}

//show the sitio id of resident in blotter table
$('#resident_id_find').change(function(){
	var resident_id_find = $('#resident_id_find').val();
	var url="../models/ajaxaddeditfunction.php?action=checkSitioIDofResident&resident_id_find=" + resident_id_find;

	$.get(url, function(data){
		console.log(data);
		if(data==0){
			alert("SITIO ID IS NULL");
		}else{
			$('#complainant_sitio').val(data);
		}
	});
	return false;
});



$('#resident_id_find2').change(function(){
	var resident_id_find2 = $('#resident_id_find2').val();
	var url="../models/ajaxaddeditfunction.php?action=checkSitioIDofResidentComplainant&resident_id_find2=" + resident_id_find2;

	$.get(url, function(data){
		console.log(data);
		if(data==0){
			alert("SITIO ID IS NULL");
		}else{
			$('#respondent_sitio').val(data);
		}
	});
	return false;
});


//end of the function for the blotter table




/* AJAX ADD/EDIT REQUEST FUNCTION */
function ajaxRequestAddEdit(form_id, urlfunction, action, req_action, submitbtn, submitbtntext, dbutton, msgbox, redirect){ //parameters: form id,action,requested action,submit button name, button value, cancel/back button to disable, redirection link
  if(confirm("Do you really want to continue?")){
    var sform=$('#'+form_id).serialize();

    var url= urlfunction + req_action + "&" + sform;
    //alert(url);
    if(action=="add"){
      var v1="Saving...";
    }else{
      v1="Updating...";
    }
    if(dbutton!=null || dbutton!=""){
    $('#'+dbutton).attr('disabled','disabled');
    }
    $('#'+msgbox).html('').removeAttr();
    $('#'+submitbtn).attr("disabled","disabled").html(v1).fadeTo(500,1, function(){
      $.get(url,function(data) {
        console.log(data);
        if(data==1){
          $('#'+submitbtn).html(submitbtntext).removeAttr("disabled","disabled");
          $('#'+msgbox).html('<center>Success!</center>').addClass('alert alert-success').fadeTo(500,1, function(){
            if(redirect!=null || redirect!=""){
            window.location.href=redirect;
            }
          });

        }else if(data==0){
          $('#'+submitbtn).html(submitbtntext).removeAttr("disabled","disabled");
          $('#'+msgbox).html('<center>Failed! Please Try Again.</center>').addClass('alert alert-danger').fadeTo(500,1);

        }else {
          $('#'+submitbtn).html(submitbtntext).removeAttr("disabled","disabled");
          $('#'+msgbox).html('<center>Failed! Please Try Again.</center>').addClass('alert alert-danger').fadeTo(500,1);

        }
        if(dbutton!=null || dbutton!=""){
          $('#'+dbutton).removeAttr('disabled','disabled');
        }
      });
    });
    return true;
  }else{
    return false;
  }
  return false;
}
// THIS FUNCTION IS FOR ADDING NEW BARANGAY
$('#form_addbarangay').submit(function (){
ajaxRequestAddEdit('form_addbarangay', '../models/ajaxaddeditfunction.php?action=', 'add', 'addbarangay', 'btn_addbrgy', 'Save', null, 'msgboxbrgy', 'index.php?brgypage=brgylist');
	return false;
});
// THIS IS FOR EDITING THE DETAILS OF BARANGAY
$('#form_editbarangay').submit(function (){
ajaxRequestAddEdit('form_editbarangay', '../models/ajaxaddeditfunction.php?action=', 'edit', 'editbarangay', 'btn_editbrgy', 'Update', null, 'msgboxbrgyedit', 'index.php?brgypage=brgylist');
return false;
});
// THIS FUNCTION IS FOR ADDING NEW SITIO
$('#form_addsitio').submit(function (){
ajaxRequestAddEdit('form_addsitio', '../models/sitioaddeditfunction.php?action=', 'add', 'addsitio', 'btn_addsitio', 'Save', null, 'msgboxsitio', 'index.php?brgypage=sitiolist');
	return false;
});
// THIS FUNCTION IS FOR EDITING NEW SITIO
$('#form_editsitio').submit(function (){
ajaxRequestAddEdit('form_editsitio', '../models/sitioaddeditfunction.php?action=', 'edit', 'editsitio', 'btn_editsitio', 'Update', null, 'msgboxsitioedit', 'index.php?brgypage=sitiolist');
	return false;
});
// THIS FUNCTION IS FOR adding NEW House number
$('#form_addhouseNo').submit(function (){
ajaxRequestAddEdit('form_addhouseNo', '../models/house_residenceaddeditfunction.php?action=', 'add', 'addhousenumber', 'btn_addhouseno', 'Save', null, 'msgboxhouseno', 'index.php?brgypage=residence');
	return false;
});
// THIS FUNCTION IS FOR adding new resident
$('#form_addresident').submit(function (){
ajaxRequestAddEdit('form_addresident', '../models/house_residenceaddeditfunction.php?action=', 'add', 'addResident', 'btn_addresident', 'Save Resident', null, 'msgboxresident', 'index.php?brgypage=viewresidence&house_id='+ $('#house_id').val());
	return false;
});
// THIS FUNCTION IS FOR edit new resident
$('#form_editresident').submit(function (){
ajaxRequestAddEdit('form_editresident', '../models/house_residenceaddeditfunction.php?action=', 'edit', 'editResident', 'btn_updateresident', 'Save Changes', null, 'msgboxresidentedit', 'index.php?brgypage=viewresidence&house_id='+ $('#house_id').val());
	return false;
});
// THIS FUNCTION IS TO ADD A NEW USER UNDER THE BARANGAY CAPTAIN AND ADMINISTRATOR
$('#form_adduser').submit(function (){
ajaxRequestAddEdit('form_adduser', '../models/useraddeditfunction.php?action=', 'add', 'addUserBarangayCaptain', 'btn_adduser', 'Save', null, 'msgboxuser', 'index.php?brgypage=userlist');
	return false;
});
// THIS FUNCTION IS UNDER OF BARANGAY CAPTAIN
$('#form_adduserbc').submit(function (){
ajaxRequestAddEdit('form_adduserbc', '../models/useraddeditfunction.php?action=', 'add', 'addUserBarangayCaptainUnder', 'btn_adduserbc', 'Save', null, 'msgboxuserbc', 'index.php?brgypage=userlist');
	return false;
});
// THIS IF FOR ADDING A CEDULA AND OR NUMBER
$('#form_addorcedula').submit(function (){
ajaxRequestAddEdit('form_addorcedula', '../models/cedulaandoraddeditfunction.php?action=', 'add', 'addcedulaor', 'btn_addorcedula', 'Save', null, 'msgboxorcedula', 'index.php?brgypage=ORandCedula');
	return false;
});
//edit or 
$('#form_editorcedula').submit(function (){
ajaxRequestAddEdit('form_editorcedula', '../models/cedulaandoraddeditfunction.php?action=', 'edit', 'oredit', 'btn_editorcedula', 'Update', null, 'msgboxorcedulaedit', 'index.php?brgypage=ORandCedula');
	return false;
});
//edit cedula 
$('#form_editcedula').submit(function (){
ajaxRequestAddEdit('form_editcedula', '../models/cedulaandoraddeditfunction.php?action=', 'edit', 'cedulaedit', 'btn_editcedula', 'Update', null, 'msgboxcedulaedit', 'index.php?brgypage=ORandCedula');
	return false;
});

//add clearance
$('#form_issuedclearance').submit(function (){
ajaxRequestAddEdit('form_issuedclearance', '../models/clearanceIssuedfunction.php?action=', 'add', 'addNewBarangayClearanceNow', 'btn_addclearance', 'Generate', null, 'msgboxclearance', 'index.php?brgypage=printClearance&resident_id='+ $('#resident_id').val()+'&or='+$('#or').val()+'&cedula='+$('#cedula').val());
	return false;
});
//issued business permit
$('#form_issuedbusinesspermit').submit(function (){
ajaxRequestAddEdit('form_issuedbusinesspermit', '../models/businessPermitfunction.php?action=', 'add', 'addNewBusinessPermit', 'btn_addbusinesspermit', 'Generate', null, 'msgboxbusiness', 'index.php?brgypage=BusinessPermitView&resident_id='+ $('#resident_id').val()+'&or='+$('#or').val()+'&cedula='+$('#cedula').val());
	return false;
});
//issued business permit not resident
$('#form_issuedbusinesspermit_not').submit(function (){
ajaxRequestAddEdit('form_issuedbusinesspermit_not', '../models/businessPermitfunction.php?action=', 'add', 'addNewBusinessPermitnot', 'btn_addbusinesspermit_not', 'Generate', null, 'msgboxbusiness_not', 'index.php?brgypage=BusinessPermitView&brgy_idbusiness_not='+ $('#brgy_idbusiness_not').val()+'&or='+$('#or').val()+'&cedula='+$('#cedula').val());
	return false;
});

//issued business permit renew
$('#form_renew').submit(function (){
ajaxRequestAddEdit('form_renew', '../models/businessPermitfunction.php?action=', 'edit', 'RenewBusinessPermit', 'btn_renew', 'Generate', null, 'msgboxrenew', 'index.php?brgypage=BusinessPermitRenewReport&business_id='+ $('#business_id').val()+'&or='+$('#or').val()+'&cedula='+$('#cedula').val());
	return false;
});
//issue building permit/ electrical/ sanitary / plumbing / fencing permit
$('#form_issuedbuildingpermit').submit(function (){
ajaxRequestAddEdit('form_issuedbuildingpermit', '../models/buildingpermitfunction.php?action=', 'add', 'addNewBuildingPermit', 'btn_addbuildingpermit', 'Generate', null, 'msgboxbuilding', 'index.php?brgypage=buildingpermitview&resident_id='+ $('#resident_id').val()+'&or='+$('#or').val()+'&cedula='+$('#cedula').val());
	return false;
});

//BLOTTER REPORTS
$('#form_addblotter').submit(function (){
ajaxRequestAddEdit('form_addblotter', '../models/blotterfunction.php?action=', 'add', 'addblotter', 'btn_addblotter', 'Generate Blotter', null, 'msgboxblotter', 'index.php?brgypage=blotterlist&status');
	return false;
});

//BLOTTER REPORTS UPDATE STATUS
$('#form_updateblotter').submit(function (){
ajaxRequestAddEdit('form_updateblotter', '../models/blotterfunction.php?action=', 'edit', 'updateblotterstatus', 'btn_blotterupdate', 'Update Status', null, 'msgboxupdateblotter', 'index.php?brgypage=blotterlist&status='+ $('#status_blotter').val());
	return false;
});

//BLOTTER REPORTS Set Schedule
$('#form_schedule').submit(function (){
ajaxRequestAddEdit('form_schedule', '../models/blotterfunction.php?action=', 'edit', 'setSchedule', 'btn_sched', 'Set Schedule', null, 'msgboxschedule', 'index.php?brgypage=viewblotterdetails&blotter_id='+ $('#blotter_id_sched').val()+'&complainant='+$('#complainant').val()+'&respondent='+$('#respondent').val());
	return false;
});
//add business type
$('#form_businesstype').submit(function (){
ajaxRequestAddEdit('form_businesstype', '../models/settingactionfunction.php?action=', 'add', 'addbusinesstype', 'btn_addbusiness', 'Save', null, 'msgboxbusiness', 'index.php?brgypage=businesstype');
	return false;
});
//edit business type
$('#form_editbusinesstype').submit(function (){
ajaxRequestAddEdit('form_editbusinesstype', '../models/settingactionfunction.php?action=', 'edit', 'editbusinesstype', 'btn_editbusinesstype', 'Update', null, 'msgboxbusinesstypeedit', 'index.php?brgypage=businesstype');
	return false;
});
//add religion
$('#form_religiontype').submit(function (){
ajaxRequestAddEdit('form_religiontype', '../models/settingactionfunction.php?action=', 'add', 'addreligion', 'btn_addreligion', 'Save', null, 'msgboxreligion', 'index.php?brgypage=religion');
	return false;
});
//update religion
$('#form_editreligiontype').submit(function (){
ajaxRequestAddEdit('form_editreligiontype', '../models/settingactionfunction.php?action=', 'edit', 'editreligion', 'btn_editReligion', 'Update', null, 'msgboxreligiontype', 'index.php?brgypage=religion');
	return false;
});
//update user profile
$('#form_editprofile').submit(function (){
ajaxRequestAddEdit('form_editprofile', '../models/useraddeditfunction.php?action=', 'edit', 'Updateusers', 'btn_editprofile', 'Update', null, 'msgboxprofile', 'index.php?brgypage=userprofile');
	return false;
});
//remove designation
$('#form_removedesignation').submit(function (){
ajaxRequestAddEdit('form_removedesignation', '../models/useraddeditfunction.php?action=', 'edit', 'removeDesignation', 'btn_removedesignation', 'Update', null, 'msgboxdesignation', 'index.php?brgypage=brgyofficial');
	return false;
});
//activate designation
$('#form_designation').submit(function (){
ajaxRequestAddEdit('form_designation', '../models/useraddeditfunction.php?action=', 'edit', 'activateDesignation', 'btn_adddesignation', 'Update', null, 'msgboxdesignationadd', 'index.php?brgypage=designationactivate');
	return false;
});

//this is for updating the weight of the children
$('#form_editchildrenWeight').submit(function (){
ajaxRequestAddEdit('form_editchildrenWeight', '../models/house_residenceaddeditfunction.php?action=', 'edit', 'UpdateWeight', 'btn_editWeight', 'Update', null, 'msgboxchildren', 'index.php?brgypage=ListofChildrenPersitio&sitio_id='+ $('#sitio_id_users').val());
return false;
});


//check religion
$('#religion_name').change(function(){
	var religion_name = $('#religion_name').val();
	var url="../models/settingactionfunction.php?action=checkreligion&religion_name=" + religion_name;

	$.get(url, function(data){
		console.log(data);
		if(data>0){
			alert('RELIGION NAME ALREADY EXISTED!');
			$('#religion_name').val('').focus();
		}
	});
	return false;
});


// CHECK business type
$('#business_name').change(function(){
	var business_name = $('#business_name').val();
	var url="../models/settingactionfunction.php?action=checkbusinesstypedetails&business_name=" + business_name;

	$.get(url, function(data){
		console.log(data);
		if(data>0){
			alert('BUSINESS NAME ALREADY EXISTED!');
			$('#business_name').val('').focus();
		}
	});
	return false;
});
$('#modal-sm').on('shown.bs.modal', function () {
    $('#brgy_name').focus();
})  




/* Change the status residential and commercial*/
$('#house_type').change(function (){
	var house_type=$(this).val();
	if(house_type=="COMMERCIAL"){
		$("#Businessseelecttype").show();
	}else{
		$("#Businessseelecttype").hide();
	}
	return false;
});

/* Change the status of the user*/
$('#restriction_bc').change(function (){
	var restriction=$(this).val();
	if(restriction=="Kagawad"){
		$("#restriction_policy").show();
	}else{
		$("#restriction_policy").hide();

	}
	return false;
});
// CHECK IF THE RECORD OF BARANGAY HAS ALREADY AN EXISTING RECORDS
$('#form_addbarangay').submit(function(){
	var brgy_name = $('#brgy_name').val();
	var url="../models/ajaxaddeditfunction.php?action=checkbrgydetails&brgy_name=" + brgy_name;

	$.get(url, function(data){
		console.log(data);
		if(data>0){
			alert('BARANGAY ALREADY EXISTED!');
			$('#brgy_name').val('').focus();
		}
	});
	return false;
});
// CHECK IF THE RECORD OF SITIO HAS ALREADY AN EXISTING RECORDS
$('#sitio_name').change(function(){
	var sitio_name = $('#sitio_name').val();
	var url="../models/sitioaddeditfunction.php?action=checksitiodetails&sitio_name=" + sitio_name;

	$.get(url, function(data){
		console.log(data);
		if(data>0){
			alert('SITIO NAME ALREADY EXISTED!');
			$('#sitio_name').val('').focus();
		}
	});
	return false;
});
// CHECK IF THE RECORD OF HOUSE NUMBER HAS ALREADY AN EXISTING RECORDS
$('#house_no').change(function(){
	var house_no = $('#house_no').val();
	var url="../models/house_residenceaddeditfunction.php?action=checkhousenodetails&house_no=" + house_no;

	$.get(url, function(data){
		console.log(data);
		if(data>0){
			alert('HOUSE NUMBER ALREADY EXISTED!');
			$('#house_no').val('').focus();
		}
	});
	return false;
});

/* Occupation of the resident change to yes*/
$('#occupationdrop').change(function (){
	var occupationdrop=$(this).val();
	if(occupationdrop=="Yes"){
		$("#occopuationyes").show();
		$("#occopuationyess").show();
		$("#occupationaddress").show();
		$("#occupationstatus").show();
		$("#placeofwork").show();
		
	}else{
		$("#occupation").val("");
		$("#income").val("");
		$("#occupation_address").val("");
		$("#occupation_status").val("");
		$("#place_of_work").val("");
		
		$("#occupationstatus").hide();
		$("#placeofwork").hide();
		$("#occopuationyes").hide();
		$("#occopuationyess").hide();
		$("#occupationaddress").hide();

	}
	return false;
});
$('#religion').change(function (){
	var religion=$(this).val();
	if(religion==0){
		$("#religion_show").show();
		
	}else{
		$("#other_re").val("");
		$("#religion_show").hide();
	}
	return false;
});

$('#language').change(function (){
	var language=$(this).val();
	if(language==0){
		$("#Specify_language").show();
		
	}else{
		$("#other_lang").val("");
		$("#Specify_language").hide();
	}
	return false;
});

$('#bdate').change(function (){
	var age_result=$('#age_result').val();
	if(age_result>59){
		$("#showsenior_id").show();
		
	}else{
		$("#senio_id").val("");
		$("#showsenior_id").hide();
	}
	return false;
});

// $('#cstatus').change(function (){
	// var cstatus=$(this).val();
	// if(cstatus==2){
		 //$("#show_married_to").show();
		
	// }else{
		// $("#show_married_to").hide();
		// $("#married_to").val("");
		
	// }
	// return false;
// });

$('#bdate').change(function (){
	var age_results=$('#age_result').val();
	if(age_results<=17){
		$("#votershowhide").hide();
		$("#occupationshowhide").hide();
		
	}else{
		$("#votershowhide").show();
		$("#occupationshowhide").show();
	}
	return false;
});



