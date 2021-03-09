<?php 

define ("MAX_SIZE","9000"); 
//$valid_formats = array("jpg", "jpeg", "png");
$msg="";
$class="";
$message="";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	if($msg==0){
		$class = "alert alert-danger";
		$message = "Failed!";
	}elseif($msg==1){
		$class = "alert alert-success";
		$message = "Successfully Saved!";
	}elseif($msg==2){
		$class = "alert alert-danger";
		$message = "File upload unsuccessful!";
	}elseif($msg==3){
		$class = "alert alert-danger";
		$message = "You have exceeded the size limit! so moving unsuccessful!";
	}elseif($msg==4){
		$class = "alert alert-danger";
		$message = "Unknown file extension!";
	}
}

if(isset($_POST['btn_lphoto'])){
	
	
			$valid_formats = array("jpg", "png", "gif", "JPG", "PNG", "GIF");
			$name = $_FILES['logo_photo']['name'];
			$size = $_FILES['logo_photo']['size'];

			if(strlen($name)){

				list($txt, $ext) = explode(".", $name);

				if(in_array($ext,$valid_formats)){

					if($size<(1024*1024)){

						$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						$tmp = $_FILES['logo_photo']['tmp_name'];
						if(move_uploaded_file($tmp, "../barangaylogo/".$actual_image_name)){
					
					  $crud -> insert("logo_tbl", array("logo_id"=>'LOGO-'.$_POST['brgy_id_logo'].generateCode(),
														"logo_image"=>$actual_image_name,
														"barangay_id_logo"=>$_POST['brgy_id_logo']));
														
														
						$rs = $crud-> getResult();
						
										
					if($rs){
						echo '<script>window.location.href="?brgypage=logobarangay&msg=1";</script>';
					}else{
						echo '<script>window.location.href="?brgypage=logobarangay&msg=0";</script>';
					}
					
				}else {
					echo '<script>window.location.href="?brgypage=logobarangay&msg=2";</script>';
							
				}

			} else {
				echo '<script>window.location.href="?brgypage=logobarangay&msg=3";</script>';
								
			}
		
		} else { 
				echo '<script>window.location.href="?brgypage=logobarangay&msg=4";</script>';
														
		}
	}

}


if(isset($_POST['btn_updatephoto'])){
	
	
	$strnow = date('m/d/Y h:i:s a');
	$valid_formats = array("jpg", "png", "gif", "JPG", "PNG", "GIF");
			$name = $_FILES['logo_photo']['name'];
			$size = $_FILES['logo_photo']['size'];

			if(strlen($name)){

				list($txt, $ext) = explode(".", $name);

				if(in_array($ext,$valid_formats)){

					if($size<(1024*1024)){

						$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						$tmp = $_FILES['logo_photo']['tmp_name'];
						if(move_uploaded_file($tmp, "../barangaylogo/".$actual_image_name)){
					
					  $crud -> update("logo_tbl", array("logo_image"=>$actual_image_name,
														"barangay_id_logo"=>$_POST['brgy_id_logo']), "logo_id='{$_POST['id_logo']}'");
						$rs = $crud-> getResult();
						
										
					if($rs){
						echo '<script>window.location.href="?brgypage=logobarangay&msg=1";</script>';
					}else{
						echo '<script>window.location.href="?brgypage=logobarangay&msg=0";</script>';
					}
					
				}else {
					echo '<script>window.location.href="?brgypage=logobarangay&msg=2";</script>';
							
				}

			} else {
				echo '<script>window.location.href="?brgypage=logobarangay&msg=3";</script>';
								
			}
		
		} else { 
				echo '<script>window.location.href="?brgypage=logobarangay&msg=4";</script>';
														
		}
	}

}



?>


<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Barangay Logo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Logo</a></li>
              <li class="breadcrumb-item active">Barangay Logo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-olive">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-sm">
              Logo.
            </div>
          </div>
          <h3 class="card-title">List of OR and Cedula Details &nbsp;</h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">
				<div class="<?php echo $class; ?>"><center><?php echo $message; ?></center></div>
				
			<div class="row">
				
				<div class="col-md-2">
					<label>Photo:</label><br>
					
					
					<?php 
					$id_logo = 0;
					$crud->sql("SELECT * FROM logo_tbl WHERE barangay_id_logo='{$brgy_id}'");
					$rs_logo = $crud -> getResult();
					foreach($rs_logo as $rs_logoval){
					
					$id_logo = $rs_logoval['logo_id'];
					
					if($rs_logoval['logo_image']!=""){ ?>
					<img src="../barangaylogo/<?php echo $rs_logoval['logo_image']; ?>" width="100%"/>
					
					<?php }else{ echo 'N/A'; 
					} }
					?>
					<hr>
					<form method="post" enctype="multipart/form-data" onsubmit="return confirmSubmitlogo();">
						<input type="hidden" name="brgy_id_logo" id="brgy_id_logo" value="<?php echo $brgy_id; ?>">
						<input type="hidden" name="id_logo" id="id_logo" value="<?php echo $id_logo; ?>">
						<div class="form-group">
							<label>Change:</label>
							<input type="file" name="logo_photo" id="logo_photo" required="required"> 
						</div>
						<div class="form-group">
						<?php 
						
						
						if($id_logo==""){?>
							<button type="submit" name="btn_lphoto" id="btn_lphoto" class="btn btn-primary">Save</button>
						<?php }else{
							?>
								<button type="submit" name="btn_updatephoto" id="btn_updatephoto" class="btn btn-secondary">Update</button>
						
						<?php }?>
						</div>
					</form>
				</div>
				
				
			</div>

       
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
          Barangay Logo
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

