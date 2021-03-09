
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

if(isset($_POST['btn_updatephotores'])){
	
	
	$strnow = date('m/d/Y h:i:s a');
	$valid_formats = array("jpg", "png", "gif", "JPG", "PNG", "GIF");
			$name = $_FILES['resident_image']['name'];
			$size = $_FILES['resident_image']['size'];

			if(strlen($name)){

				list($txt, $ext) = explode(".", $name);

				if(in_array($ext,$valid_formats)){

					if($size<(1024*1024)){

						$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						$tmp = $_FILES['resident_image']['tmp_name'];
						if(move_uploaded_file($tmp, "../residentphoto/".$actual_image_name)){
					
					  $crud -> update("resident_tbl", array("resident_image"=>$actual_image_name), "resident_id='{$_POST['resident_id']}'");
						$rs = $crud-> getResult();
						
										
					if($rs){
						echo '<script>window.location.href="?brgypage=viewDetailsImage&resident_id='.$_POST['resident_id'].'&house_id='.$_POST['house_id'].'&msg=1";</script>';
						
					}else{
						echo '<script>window.location.href="?brgypage=viewDetailsImage&resident_id='.$_POST['resident_id'].'&house_id='.$_POST['house_id'].'&msg=0";</script>';
					}
					
				}else {
						echo '<script>window.location.href="?brgypage=viewDetailsImage&resident_id='.$_POST['resident_id'].'&house_id='.$_POST['house_id'].'&msg=2";</script>';
							
				}

			} else {
					echo '<script>window.location.href="?brgypage=viewDetailsImage&resident_id='.$_POST['resident_id'].'&house_id='.$_POST['house_id'].'&msg=3";</script>';
									
			}
		
		} else { 
					echo '<script>window.location.href="?brgypage=viewDetailsImage&resident_id='.$_POST['resident_id'].'&house_id='.$_POST['house_id'].'&msg=4";</script>';
															
		}
	}

}

$resident_id = (isset($_GET['resident_id'])) ? $_GET['resident_id'] : (string) 0;
$house_id = (isset($_GET['house_id'])) ? $_GET['house_id'] : (string) 0;
	$crud -> sql("SELECT * FROM houseno_tbl");
	$rs_houseno = $crud -> getResult();

		foreach($rs_houseno as $rs_housenoval){
		if($house_id==$rs_housenoval['house_id']){
		$house_number = $rs_housenoval['house_no'];
		$brgy_name_house = getbrgyname($rs_housenoval['brgy_id_fk_house']);
		$sitio_name_house = getsitioname($rs_housenoval['sitio_id_fk_house']);

		}
	}
	$crud -> sql("SELECT * FROM resident_tbl WHERE resident_id='{$resident_id}'");
	$rs_residentedit = $crud -> getResult();

		foreach($rs_residentedit as $rs_residenteditval){
?>
<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Resident</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Resident</a></li>
              <li class="breadcrumb-item active">Resident Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-success">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              Profile.
            </div>
          </div>
          <h3 class="card-title badge badge-success" > &nbsp; <?php echo $house_number.", BRGY.".$brgy_name_house.", SITIO ".$sitio_name_house;?></h3>
        </div>
        <div class="card-body " style="display: block;">
             
				


			
			<div class="row" style="margin-left:30px;">
                  <div class="col-md-6">
				  <table>
				  <tr>
							<td>
							<?php if($rs_residenteditval['resident_image']==""){
								echo '<i class="fa fa-image" style="color:green;">No Image Available</i><br><br>';
							}else{	
							?>
							<img src="../residentphoto/<?php echo $rs_residenteditval['resident_image']; ?>" width="30%"/>
							<?php }?>
							</td>
						</tr>
					</table>	
					<table class="">
					
					<tbody>
						<tr>
							<td><label for="text">First Name:</label></td>
							<td>    
							    <h6><?php echo $rs_residenteditval['fname'];?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Middle Name:</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['mname'];?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Last Name:</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['lname'];?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Birth Date:</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['bday'];?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Civil Status:</label></td>
							<td>
								<h6><?php echo getCivilStatus($rs_residenteditval['civil_status']);?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Gender:</label></td>
							<td>
								<h6><?php echo getidentityofAll($rs_residenteditval['gender']);?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Religion:</label></td>
							<td>
								<h6><?php 
								if($rs_residenteditval['religion']=="0"){
									echo $rs_residenteditval['religion_specify'];
								}else{
									echo getReligionName($rs_residenteditval['religion']);
								}
								?></h6>
							</td>
							
						</tr>
						<tr>
							<td><label for="text">Language:</label></td>
							<td>
								<h6><?php 
								if($rs_residenteditval['language']=="0"){
									echo $rs_residenteditval['language_specify'];
								}else{
									echo getLanguage($rs_residenteditval['language']);
								}
								?>
								</h6>
							</td>
						</tr>
						
						<tr>
							<td><label for="text">Place of Birth:</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['placeofbirth'];?></h6>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
				
				
				
				<div class="col-md-6">
				<table>
						<tr>
							<td><label for="text">Educational Attainment:</label></td>
							<td>
								<h6><?php echo getEducationAttain($rs_residenteditval['education_attain']);?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">School Type:</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['school_type'];?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Are you a Voter?</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['voter'];?></h6>
							</td>
						</tr>
						<tr>
							<td><label for="text">Phone Number</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['phone_no'];?></h6>
							</td>
						</tr>
						<tr>
							<td>
								<label for="text">Email Address</label>
							</td>
							<td>
								<h6><?php echo $rs_residenteditval['email'];?></h6>
							</td>
						</tr>
						
						<tr>
							<td><label for="text">Occupation:</label></td>
							<td>
								<h6><?php echo getOccProfile($rs_residenteditval['occupation']);?></h6>
							</td>
						</tr>
						<tr style="display:;" id="occopuationyess">
							<td><label for="text">Monthly Income:</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['income'];?></h6>
							</td>
						</tr>
						<tr style="display:;" id="occupationaddress">
							<td><label for="text">Current Occupation Address:</label></td>
							<td>
								<h6><?php echo $rs_residenteditval['current_add_occ'];?></h6>
							</td>
						</tr>
						<tr>
							<td><label>Upload Profile:</label></td>
							<td>
							
							
							
							<form method="post" enctype="multipart/form-data" onsubmit="return confirmSubmitResident();">
							<div class="<?php echo $class; ?>"><center><?php echo $message; ?></center></div>
							<input type="hidden" id="resident_id" name="resident_id" value="<?php echo $resident_id;?>">
							<input type="hidden" id="house_id" name="house_id" value="<?php echo $house_id;?>">
							
							<input type="file" name="resident_image" id="resident_image" required="required"> 
							<button type="submit" name="btn_updatephotores" id="btn_updatephotores" class="btn btn-success btn-xs">Update</button>
						
							</form>
							
							
							
							</td>
						</tr>
						
				</table>
				
				</div>
				
				</div><br>
				
				
				
				
				<div class="row">
					<div class="col-md-12">
						<h3 class="bg-olive">Blotter Cases Involved As a Complainant</h3>
						 <table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							  <thead>
							  <tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">INCIDENT TYPE</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">STATUS</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">RESPONDENT NAME</th>
								
							  </tr>
							  </thead>
							  <tbody>
								<?php 
									$c=1;
									$crud -> sql("SELECT * FROM blotter_tbl  WHERE resident_id_fk='{$resident_id}'");
									$rsb = $crud -> getResult();
									foreach($rsb as $rsbval){
										
									
								?>
								<tr>
									<td><?PHP echo $c;?></td>
									<td><?php echo $rsbval['incident_type'];?></td>
									<td><?php echo $rsbval['status'];?></td>
									<td><?php echo getResidentFullname($rsbval['resident_id_fk']);?></td>
								</tr>
								<?php 
								$c++;
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12">
						<h3 class="bg-danger">Blotter Cases Involved As a Respondent</h3>
						 <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							  <thead>
							  <tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">INCIDENT TYPE</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">STATUS</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">RESPONDENT NAME</th>
								
							  </tr>
							  </thead>
							  <tbody>
								<?php 
									$c=1;
									$crud -> sql("SELECT * FROM blotter_tbl  WHERE respondent_id_fk='{$resident_id}'");
									$rsb = $crud -> getResult();
									foreach($rsb as $rsbval){
										
									
								?>
								<tr>
									<td><?PHP echo $c;?></td>
									<td><?php echo $rsbval['incident_type'];?></td>
									<td><?php echo $rsbval['status'];?></td>
									<td><?php echo getResidentFullname($rsbval['respondent_id_fk']);?></td>
								</tr>
								<?php 
								$c++;
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h3 class="bg-success">List of All Issued Clearance</h3>
						 <table id="example4" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							  <thead>
							  <tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">PURPOSE </th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">O.R AND CEDULA NUMBER</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">DATE CREATED</th>
								
							  </tr>
							  </thead>
							  <tbody>
								<?php 
									$c=1;
									$crud -> sql("SELECT * FROM barangay_clearance_tbl WHERE resident_id='{$resident_id}' ORDER BY date_created ASC");
									$rsC = $crud -> getResult();
									foreach($rsC as $rsCVAL){
										
									
								?>
								<tr>
									<td><?PHP echo $c;?></td>
									<td><?php echo $rsCVAL['purpose'];?></td>
									<td><?php echo $rsCVAL['or_number']." /".$rsCVAL['cedula_number'];?></td>
									<td><?php echo date('F d Y', strtotime($rsCVAL['date_created']));?></td>
								</tr>
								<?php 
								$c++;
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				
				
				
		

        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
        Resident Profile
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?php }?>
