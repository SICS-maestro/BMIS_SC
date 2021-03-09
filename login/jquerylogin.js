$(document).ready(function(){

	$("#uname").focus();
	$("#uname").focus(function(){
		$(this).val('');
	});
	$("#pword").focus(function(){
		$(this).val('');
	});

	$("#loginform").submit(function(){
		var username = $('#uname').val();
		var password = $('#pword').val();
		var url = 'login/ajaxlogin.php?action=checkdata&username=' + username + '&password=' + password;
		$('#msg_box').html('').removeAttr('class','alert alert-danger');
		$('#btn_login').attr('disabled','disabled').html('Loading...').fadeTo(200,1, function (){
			$.get(url, function(data){
				//alert(data); 
				if(data==1){
					$('#uname, #pword').attr('readonly','readonly');
					$('#msg_box').html('').removeAttr();
					var login_url = 'login/ajaxlogin.php?action=login&username=' + username + '&password=' + password;
					window.location.href= login_url;
				}else if(data==0){
					$('#uname, #pword').removeAttr('readonly','readonly').val('');
					$("#uname").focus();
					$('#btn_login').removeAttr('disabled','disabled').html('Login');
					$('#msg_box').html('<center style="color: #a90000;">INCORRECT USERNAME OR PASSWORD!</center>');
					
				 }
				//else if(data==2){
					// //$('#uname, #pword').removeAttr('readonly','readonly').val('');
					// $("#uname").focus();
					// //$('#btn_login').removeAttr('disabled','disabled').html('Login');
					// $('#msg_box').html('<center style="color: #a90000;">INCORRECT USERNAME OR PASSWORD! ATTEMPT 2</center>');
					
				// }else if(data==3){
					// //$('#uname, #pword').removeAttr('readonly','readonly').val('');
					// $("#uname").focus();
					// //$('#btn_login').removeAttr('disabled','disabled').html('Login');
					// $('#msg_box').html('<center style="color: #a90000;">INCORRECT USERNAME OR PASSWORD! ATTEMPT 3</center>');
					
				// }else if(data>=3){
					// $('#uname, #pword').removeAttr('readonly','readonly').val('');
					// $('#btn_login').removeAttr('disabled','disabled').html('Login');
					// $('#msg_box').html('<center style="color: #a90000;">'+data+'</center>' );
					
				// }
			});
		});
		return false;
	});



/* reset password */
	$('#username_fp').change(function (){
		var username_fp = $('#username_fp').val();
		if(username_fp!=""){
			var a = 'php/ajaxfn.php?action=checkUsername&username_fp='+username_fp;
			$.get(a, function(data){
				if(data==0){
					alert("USERNAME DOES NOT EXIST!");
					$('#username_fp').val('').focus();
				}else{
					$('#user_id').val(data);
				}
			});
		}
		return false;
	});

	$('#username_fp').change(function (){
		var username_fp = $('#username_fp').val();
		if(username_fp!=""){
			var a = 'php/ajaxfn.php?action=checkUserNumber&username_fp='+username_fp;
			$.get(a, function(data){
				if(data==0){
					alert("USERNAME DOES NOT EXIST!");
					$('#username_fp').val('').focus();
				}else{
					$('#phone').val(data);
				}
			});
		}
		return false;
	});


	$('#ubday').change(function (){
		var ubday = $('#ubday').val();
		var userid = $('#id').val();
		if(userid!="" && ubday!=""){
			var a = 'php/ajaxfn.php?action=checkUserBday&userid='+userid+'&bday='+ubday;
			$.get(a, function(data){
				if(data==0){
					alert("BIRTHDAY DOES NOT EXIST!");
					$('#ubday').val('').focus();
				}
				return false;
			});
		}
		return false;
	});

	$('#pword_new_c').change(function (){
		var pword_new = $('#pword_new').val();
		var pword_new_c = $('#pword_new_c').val();
		if(pword_new!="" && pword_new_c!=""){
			if(pword_new!=pword_new_c){
				alert("PASSWORD NOT MATCHED!");
				$('#pword_new_c').val('').focus();
			}
		}else{
			alert("PLEASE ENTER FIRST YOUR NEW PASSWORD!");
			$('#pword_new').focus();
			$('#pword_new_c').val('');
		}
		return false;
	});

	$('#form_resetpword').submit(function (){
		var username_fp = $('#username_fp').val();
		var pword_code = $('#pword_code').val();
		var userid = $('#userid').val();
		var user_id = $('#user_id').val();
		$('#msgboxfp').html('').removeAttr('class','alert alert-danger');
		$('#btn_forgotpass').attr('disabled','disabled').html('Loading...').fadeTo(200,1, function (){
			var url_rp = 'php/ajaxfn.php?action=resetPassword&user_id='+user_id+'&pword_code='+pword_code;
			/* alert(url_rp); */
			$.get(url_rp, function(data){
				/* alert(data); */
				if(data==1){
					var msg = "";
					if(userid!=""){
						msg = "Reset Password Success!";
					}else{
						msg = "Reset Password Success! You may now Login to your Account";
					}
					$('#username_fp, #pword_code').attr('readonly','readonly');
					$('#msgboxfp').html('<center class="alert alert-success">'+msg+'</center>').fadeTo(800, 1, function(){
						window.location.href="index";
					});
					$('#btn_forgotpass').removeAttr('disabled','disabled').html('Reset Password');

				}else if(data==0){
					$('#username_fp, #pword_code').removeAttr('readonly','readonly').val('');
					$("#pword_code").focus();
					$('#btn_forgotpass').removeAttr('disabled','disabled').html('Reset Password');
					$('#msgboxfp').html('<center style="color: #a90000;">Reset Password Failed!</center>');

				}
			});
		});
		return false;
	});

});
