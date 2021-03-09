function confirmSubmit(){
	if(confirm("Do you really want to continue?")){
		return true;
	}else{
		return false;
	}
}
function confirmSubmitFarmer(){
	if(confirm("Do you really want to continue?")){
		document.getElementById('loader').style.display="block";
		return true;
	}else{
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
// function allNumbers(inputs){
//     var numbers = /^[0-9]*\.?[0-9]*$/;
//       if(document.getElementById(inputs).value.match(numbers))  {
//       return true;
//       }  else  {
//       alert('PLEASE INPUT NUMBERS ONLY');
// 			document.getElementById(inputs).value="";
// 			document.getElementById(inputs).focus();
//       return false;
//       }
// }
// function limitText(field,limit){
// 	var f = document.getElementById(field);
// 	if(f.value.length > limit){
// 		f.value = f.value.substring(0, limit);
// 	}
// 	return false;
// }

// function enableQty(id){
// 	var livestock_id = document.getElementById('livestock_id_'+id).value;
// 	if(livestock_id == id){
// 		$('#rls_qty_'+id).removeAttr('readonly','readonly').focus();
// 	}else{
// 		$('#rls_qty_'+id).attr('readonly','readonly');
// 	}
// 	return false;
// }

// function rlQty(id){
// 	var ls_qty = document.getElementById('ls_qty_'+id).value;
// 	var rls_qty = document.getElementById('rls_qty_'+id).value;
// 	if(parseFloat(rls_qty) > parseFloat(ls_qty)){
// 		alert("Entered Number must not be Greater than the Number of Livestock!");
// 		document.getElementById('rls_qty_'+id).value="";
// 	}else if(parseFloat(rls_qty)>2){
// 		alert("OOPS! \nONLY 1 TO 2 LIVESTOCK CAN BE REQUESTED. \nMORE THAN 2 IS NOT ACCEPTED.");
// 		document.getElementById('rls_qty_'+id).value="";
// 	}
// 	return false;
// }

// function deactivateUser(id){
// 	if(confirm("DO YOU REALLY WANT TO DE-ACTIVATE THIS USER?")){
// 		$('#btn_userid_'+id).html('Deactivating...').attr('disabled','disabled').fadeTo(200, 1, function(){
// 			var url = 'php/ajaxfn.php?action=deactivateUser&userid=' + id;
// 			$.get(url, function(data){
// 				if(data==1){
// 					// $('#row_user'+id).fadeOut('slow');
// 					window.location.href="";
// 				}else{
// 					$('#btn_userid_'+id).html('&times;').removeAttr('disabled','disabled');
// 					alert("DEACTIVATING FAILED!");
// 				}
// 				return false;
// 			});
// 		});
// 		return false;
// 	}
// }
// function activateUser(id){
// 	if(confirm("DO YOU REALLY WANT TO ACTIVATE THIS USER?")){
// 		$('#btn_userid_'+id).html('Activating...').attr('disabled','disabled').fadeTo(200, 1, function(){
// 			var url = 'php/ajaxfn.php?action=activateUser&userid=' + id;
// 			$.get(url, function(data){
// 				if(data==1){
// 					// $('#row_user'+id).fadeOut('slow');
// 					window.location.href="";
// 				}else{
// 					$('#btn_userid_'+id).html('&times;').removeAttr('disabled','disabled');
// 					alert("DEACTIVATING FAILED!");
// 				}
// 				return false;
// 			});
// 		});
// 		return false;
// 	}
// }

// function computeProdLS(){
// 	var livestockreq_produced_m = document.getElementById('livestockreq_produced_m').value;
// 	var livestockreq_produced_f = document.getElementById('livestockreq_produced_f').value;
//
// 	var total = 0;
// 	if(livestockreq_produced_m!=null || livestockreq_produced_f!=null){
// 		total = parseFloat(livestockreq_produced_m) + parseFloat(livestockreq_produced_f);
// 	}else{
// 		total = 0;
// 	}
//
// 	document.getElementById('livestockreq_produced').value=total;
// }

// function computeProdLD(){
// 	var ld_produced_m = document.getElementById('ld_produced_m').value;
// 	var ld_produced_f = document.getElementById('ld_produced_f').value;
//
// 	var total = 0;
// 	if(ld_produced_m!=null || ld_produced_f!=null){
// 		total = parseFloat(ld_produced_m) + parseFloat(ld_produced_f);
// 	}else{
// 		total = 0;
// 	}
//
// 	document.getElementById('ld_produced').value=total;
// }
/* function deleteLivestock(id){
	if(confirm("DO YOU REALLY WANT TO DELETE THIS LIVESTOCK? \nIt will not be recovered again after deleting.")){
		$('#btn_del_ls_'+id).html('...').attr('disabled','disabled').fadeTo(200, 1, function(){
			var url = 'php/ajaxfn.php?action=deleteLivestock&livestock_id=' + id;
			$.get(url, function(data){
				if(data==1){
					$('#row_ls_'+id).fadeOut('slow');
				}else{
					$('#btn_del_ls_'+id).html('').removeAttr('disabled','disabled');
					alert("DELETION FAILED!");
				}
				return false;
			});
		});
		return false;
	}
} */

var $ = jQuery.noConflict();
jQuery(document).ready(function ($) {
	function datePickedNoNext(element_id){
		var dateToday = new Date();
		var dates = $('#'+element_id).datepicker({
			//defaultDate: "+1m",
			changeMonth: true,
			changeYear: true,
			maxDate: "+0m +0d",
		});
	}

	// function datePickedNoPrev(element_id){
	// 	var dateToday = new Date();
	// 	var dates = $('#'+element_id).datepicker({
	// 		//defaultDate: "+1m",
	// 		changeMonth: true,
	// 		changeYear: true,
	// 		minDate: "+0m +0d",
	// 	});
	// }
	// function datePick(element_id){
	// 	$('#'+element_id).datepicker({
	// 		changeMonth: true,
	// 		changeYear: true,
	// 	});
	// }
	datePickedNoNext('dtreceived');
	datePickedNoNext('farmer_bdate');
	datePickedNoNext('livestockreq_datereleased');
	datePickedNoNext('ml_date_monitored');
	datePickedNoNext('ld_datereceived');
	datePickedNoNext('date_monitored');
	datePickedNoNext('ubday');

	datePickedNoPrev('sched_date');
	datePickedNoPrev('ml_resched');

	/* auto load */
	// function liveC(elementid,url){
	// 	console.log(url);
	// 	var auto_refresh = setInterval(function (){
	// 		$('#'+elementid).load(url).fadeIn();
	// 	}, 1500);
	// }

	/* notif live count */
	// liveC("notif","php/ajaxfn.php?action=notif&key=all&usertype=" + $("#usertype").val() + "&userid=" + $("#userid").val() + "&farmer_id=" + $("#farmer_id").val() + "&assoc_id=" + $("#assoc_id").val());
	// liveC("lr_pending","php/ajaxfn.php?action=notif&key=lr_pending&usertype=" + $("#usertype").val() + "&userid=" + $("#userid").val() + "&farmer_id=" + $("#farmer_id").val() + "&assoc_id=" + $("#assoc_id").val());
	// liveC("lr_approved","php/ajaxfn.php?action=notif&key=lr_app&usertype=" + $("#usertype").val() + "&userid=" + $("#userid").val() + "&farmer_id=" + $("#farmer_id").val() + "&assoc_id=" + $("#assoc_id").val());
	// liveC("lr_rejected","php/ajaxfn.php?action=notif&key=lr_rej&usertype=" + $("#usertype").val() + "&userid=" + $("#userid").val() + "&farmer_id=" + $("#farmer_id").val() + "&assoc_id=" + $("#assoc_id").val());
	// liveC("ml_sched","php/ajaxfn.php?action=notif&key=ml_sched&usertype=" + $("#usertype").val() + "&userid=" + $("#userid").val() + "&farmer_id=" + $("#farmer_id").val() + "&assoc_id=" + $("#assoc_id").val());

	/* AJAX ADD/EDIT REQUEST FUNCTION */
	function ajaxRequestAddEdit(form_id, action, req_action, submitbtn, submitbtntext, dbutton, msgbox, redirect){ //parameters: form id,action,requested action,submit button name, button value, cancel/back button to disable, redirection link
		if(confirm("Do you really want to continue?")){
			var sform=$('#'+form_id).serialize();

			var url="models/ajaxaddeditfunction.php?action=" + req_action + "&" + sform;
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

	/* barangay */
	// $('#brgy_name').change(function(){
	// 	var brgy_name = $('#brgy_name').val();
	// 	var url="php/ajaxfn.php?action=checkbrgy&brgy_name=" + brgy_name;
	//
	// 	$.get(url, function(data){
	// 		console.log(data);
	// 		if(data>0){
	// 			alert('Barangay Name already exist!');
	// 			$('#brgy_name').val('').focus();
	// 		}
	// 	});
	// 	return false;
	// });
	// $('#form_addbarangay').submit(function (){
	// 	ajaxRequestAddEdit('form_addbarangay', 'add', 'addbarangay', 'btn_addbrgy', 'Save', null, 'msgboxbrgy', 'index.php?brgypage=brgylist');
	// 	return false;
	// });
	// $('#form_editbrgy').submit(function (){
	// 	ajaxRequestAddEdit('form_editbrgy', 'edit', 'updatebrgy', 'updatebrgy', 'Save Changes', null, 'msgboxbrgy', 'index?page=barangay');
	// 	return false;
	// });

	/* barangay official */
	// $('#brgyoff_lname').change(function (){
	// 	var fname = $('#brgyoff_fname').val();
	// 	var lname = $('#brgyoff_lname').val();
	//
	// 	var url="php/ajaxfn.php?action=getup&string=" + fname + lname;
	//
	// 	$.get(url, function(data){
	// 		console.log(data);
	// 		$('#unamepass_bo').val(data);
	// 	});
	// 	return false;
	// });
	// $('#form_addbo').submit(function (){
	// 	ajaxRequestAddEdit('form_addbo', 'add', 'addbrgyoff', 'btn_savebo', 'Register', null, 'msgboxbo', 'index?page=users');
	// 	return false;
	// });
	// $('#form_editbo').submit(function (){
	// 	ajaxRequestAddEdit('form_editbo', 'edit', 'updatebrgyoff', 'btn_editbo', 'Update', null, 'msgboxbo', 'index?page=brgyofficials');
	// 	return false;
	// });

	/* livestock */
	// $('#livestock_name').change(function(){
	// 	var livestock_name = $('#livestock_name').val();
	// 	var url="php/ajaxfn.php?action=checkLivestockName&livestock_name=" + livestock_name;
	//
	// 	$.get(url, function(data){
	// 		console.log(data);
	// 		if(data>0){
	// 			alert('LIVESTOCK NAME already exist!');
	// 			$('#livestock_name').val('').focus();
	// 		}
	// 	});
	// 	return false;
	// });
	// $('#form_addls').submit(function (){
	// 	ajaxRequestAddEdit('form_addls', 'add', 'addlivestock', 'btn_savels', 'SAVE', null, 'msgbox', 'index?page=livestock');
	// 	return false;
	// });
	// $('#form_editls').submit(function (){
	// 	ajaxRequestAddEdit('form_editls', 'edit', 'editlivestock', 'btn_editls', 'UPDATE', null, 'msgbox', 'index?page=livestock');
	// 	return false;
	// });

	/* farmers */
	// $('#farmer_lname').change(function (){
	// 	var fname = $('#farmer_fname').val();
	// 	var lname = $('#farmer_lname').val();
	//
	// 	var url="php/ajaxfn.php?action=getup&string=" + fname + lname;
	//
	// 	$.get(url, function(data){
	// 		console.log(data);
	// 		$('#unamepass').val(data);
	// 	});
	// 	return false;
	// });

	/* $('#form_addfarmer').submit(function (){
		ajaxRequestAddEdit('form_addfarmer', 'add', 'registerfarmer', 'btn_savefarmer', 'REGISTER', null, 'msgboxf', 'index?page=farmers');
		return false;
	}); */
	/* $('#form_editfarmer').submit(function (){
		ajaxRequestAddEdit('form_editfarmer', 'add', 'updatefarmer', 'btn_editfarmer', 'SAVE CHANGES', null, 'msgboxf', 'index?page=farmers');
		return false;
	}); */
	/* end farmer */

	/* association */
	// $('#assoc_preslname').change(function (){
	// 	var fname = $('#assoc_presfname').val();
	// 	var lname = $('#assoc_preslname').val();
	//
	// 	var url="php/ajaxfn.php?action=getup&string=" + fname + lname;
	//
	// 	$.get(url, function(data){
	// 		console.log(data);
	// 		$('#unamepass_assoc').val(data);
	// 	});
	// 	return false;
	// });

	// $('#form_addassoc').submit(function (){
	// 	ajaxRequestAddEdit('form_addassoc', 'add', 'registerassoc', 'btn_saveassoc', 'REGISTER', null, 'msgboxa', 'index?page=associations');
	// 	return false;
	// });

	// $('#form_editassoc').submit(function (){
	// 	ajaxRequestAddEdit('form_editassoc', 'edit', 'updateassoc', 'btn_editassoc', 'SAVE CHANGES', null, 'msgbox', 'index?page=associations');
	// 	return false;
	// });

	/* request livestock */
	// $('#farmer').change(function(){
	// 	var farmer = $('#farmer').val();
	// 	var usertype = $('#usertype').val();
	// 	if(usertype!="farmer" && farmer!=""){
	// 		var a = 'php/ajaxfn.php?action=getFarmerAssoc&farmer_id='+farmer;
	// 		$.get(a, function(data){
	// 			if(data!=""){
	// 				$('#assoc_id_fk').val(data);
	// 			}
	// 		});
	// 	}else{
	// 		$('#assoc_id_fk').val('');
	// 	}
	// 	return false;
	// });

	// $('#reqlivestock').submit(function (){
	// 	ajaxRequestAddEdit('reqlivestock', 'add', 'reqlivestock', 'rls_submit', 'Submit Request', null, 'msgboxrl', 'index?page=livestockreq');
	// 	return false;
	// });

	/* request livestock action */
	// $('#lr_action').change(function (){
	// 	var lr_action=$(this).val();
	// 	if(lr_action=="rejected"){
	// 		$("#lr_rr").show();
	// 		$("#livestockreq_reject_reason").attr('required','required').focus();
	// 	}else{
	// 		$("#lr_rr").hide();
	// 		$("#livestockreq_reject_reason").removeAttr('required','required').val('');
	// 	}
	// 	return false;
	// });

	// $('#form_lraction').submit(function (){
	// 	ajaxRequestAddEdit('form_lraction', 'edit', 'lr_action', 'btn_lr_action', 'Approve', 'cancel_lr_action', 'msgboxrla', 'index?page=livestockreqview&livestockreq_id=' + $('#livestockreq_id').val());
	// 	return false;
	// });

	// $('#form_lr_rel').submit(function (){
	// 	ajaxRequestAddEdit('form_lr_rel', 'edit', 'lr_released', 'btn_daterel', 'SAVE CHANGES', null, 'msgboxr', 'index?page=livestockreqview&livestockreq_id=' + $('#lr_id').val());
	// 	return false;
	// });

	/* set monitoring date */
	// $('#form_setmonitoringsched').submit(function (){
	// 	ajaxRequestAddEdit('form_setmonitoringsched', 'add', 'setmonitoringsched', 'btn_setsched', 'Continue', null, 'msgbox', 'index?page=livestocksmonitoringlist');
	// 	return false;
	// });

	/* resched monitoring date */
	// $('#form_ml_resched').submit(function (){
	// 	ajaxRequestAddEdit('form_ml_resched', 'edit', 'resched_monitoring', 'btn_ml_resched', 'Save Changes', null, 'msgboxml', 'index?page=livestocksmonitoring');
	// 	return false;
	// });

	/* update done in monitoring */
	// $('#form_ml_update').submit(function (){
	// 	ajaxRequestAddEdit('form_ml_update', 'edit', 'monitoringdone', 'btn_ml_update', 'SAVE CHANGES', null, 'msgboxml', 'index?page=livestocksmonitoringlist');
	// 	return false;
	// });

	/* update livestock health status */
	// $('#livestockreq_hstatus').change(function(){
	// 	var livestockreq_hstatus = $(this).val();
	// 	if(livestockreq_hstatus==8 || livestockreq_hstatus==9){
	// 		$('#hstat_r').show();
	// 		$('#lshstat_reason').attr('required','required');
	// 	}else{
	// 		$('#hstat_r').hide();
	// 		$('#lshstat_reason').removeAttr('required','required');
	// 	}
	// 	return false;
	// });

	// $('#form_lhstat_update').submit(function (){
	// 	ajaxRequestAddEdit('form_lhstat_update', 'edit', 'update_hstat', 'btn_lreqhstatus_update', 'SAVE CHANGES', null, 'msgbox', 'index?page=viewbrgymonitoring&brgy_id='+$('#brgy_id').val());
	// 	return false;
	// });

	/* update produced livestock */
	// $('#form_prodls_update').submit(function (){
	// 	ajaxRequestAddEdit('form_prodls_update', 'edit', 'update_prodls', 'btn_prodls_update', 'SAVE CHANGES', null, 'msgbox', 'index?page=viewbrgymonitoring&brgy_id='+$('#brgy_id').val());
	// 	return false;
	// });

	/* dispersal */
	// $('#ld_qty').keyup(function (){
	// 	var ld_prod = $('#ld_prod').val();
	// 	var ld_qty = $('#ld_qty').val();
	// 	var ld_disperse = $('#ld_disperse').val();
	// 	if(parseFloat(ld_qty) > parseFloat(ld_prod)){
	// 		alert("ENTERED QUANTITY MUST NOT BE GREATER THAN THE REMAINING NUMBER OF PRODUCED LIVESTOCK!");
	// 		$('#ld_qty').val('').focus();
	// 	}else if(parseFloat(ld_qty) > 2 || parseFloat(ld_qty) > parseFloat(ld_prod)){
	// 		alert("ONLY 1 TO 2 LIVESTOCK CAN BE DISPERSED TO A FARMER!");
	// 		$('#ld_qty').val('').focus();
	// 	}else if(parseFloat(ld_qty) == 0){
	// 		alert("ZERO (0) IS NOT APPLICABLE!");
	// 		$('#ld_qty').val('').focus();
	// 	}else{
	// 		var dispersed = parseFloat(ld_disperse) + parseFloat(ld_qty);
	// 		$('#ld_dispersed').val(dispersed);
	// 	}
	// 	return false;
	// });

	// $('#form_lsdiperse').submit(function (){
	// 	ajaxRequestAddEdit('form_lsdiperse', 'add', 'ls_disperse', 'btn_save_lsdisperse', 'SAVE', null, 'msgboxdisperse', 'index?page=viewbrgymonitoring&brgy_id='+$('#brgy_id').val());
	// 	return false;
	// });

	/* update redispersed livestock health status */
	// $('#ld_healthstatus').change(function(){
	// 	var ld_healthstatus = $(this).val();
	// 	if(ld_healthstatus==8 || ld_healthstatus==9){
	// 		$('#hstat_r').show();
	// 		$('#lshstat_reason').attr('required','required');
	// 	}else{
	// 		$('#hstat_r').hide();
	// 		$('#lshstat_reason').removeAttr('required','required');
	// 	}
	// 	return false;
	// });

	// $('#form_ldhstat_update').submit(function (){
	// 	ajaxRequestAddEdit('form_ldhstat_update', 'edit', 'update_ldhstat', 'btn_ldhstatus_update', 'SAVE CHANGES', null, 'msgbox', 'index?page=redispersedlist&livestockreq_id='+ $('#livestockreq_id').val()+'&farmer_id='+$('#farmer_id').val()+'&brgy_id='+$('#brgy_id').val());
	// 	return false;
	// });

	/* update produced redispersed livestock */
	// $('#form_prodld_update').submit(function (){
	// 	ajaxRequestAddEdit('form_prodld_update', 'edit', 'update_prodld', 'btn_prodld_update', 'SAVE CHANGES', null, 'msgbox', 'index?page=redispersedlist&livestockreq_id='+ $('#livestockreq_id').val()+'&farmer_id='+$('#farmer_id').val()+'&brgy_id='+$('#brgy_id').val());
	// 	return false;
	// });
});
