<?php
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


// define ("MAX_SIZE","9000");
// //$valid_formats = array("jpg", "jpeg", "png");
// $msg="";
// $class="";
// $message="";
// $farmer_id=0;

// if(isset($_GET['msg'])){
	// $msg = $_GET['msg'];
	// if($msg==0){
		// $class = "alert alert-danger";
		// $message = "Failed!";
	// }elseif($msg==1){
		// $class = "alert alert-success";
		// $message = "Successfully Saved!";
	// }elseif($msg==2){
		// $class = "alert alert-danger";
		// $message = "File upload unsuccessful!";
	// }elseif($msg==3){
		// $class = "alert alert-danger";
		// $message = "You have exceeded the size limit! so moving unsuccessful!";
	// }elseif($msg==4){
		// $class = "alert alert-danger";
		// $message = "Unknown file extension!";
	// }
// }

// if(isset($_POST['btn_addresident'])){


	// $strnow = date('m/d/Y h:i:s a');
	// $valid_formats = array("jpg", "png", "gif", "JPG", "PNG", "GIF");
			// $name = $_FILES['residentphotos']['name'];
			// $size = $_FILES['residentphotos']['size'];

			// if(strlen($name)){

				// list($txt, $ext) = explode(".", $name);

				// if(in_array($ext,$valid_formats)){

					// if($size<(1024*1024)){

						// $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						// $tmp = $_FILES['residentphotos']['tmp_name'];
						// if(move_uploaded_file($tmp, "../residentphoto/".$actual_image_name)){
					// // $uploaddir = "residentphoto/"; //a directory inside
					// // if($_FILES['residentphotos']['name']!=null){
						// // $filename = stripslashes($_FILES['residentphotos']['name']);
						// // $size=filesize($_FILES['residentphotos']['tmp_name']);
						// // //get the extension of the file in a lower case format
						  // // //$ext = getExtension($filename);
						  // // $ext = getExtension($filename);
						  // // //ext = strtolower($ext);

						// // if(in_array($ext,$valid_formats)){
							// // if ($size < (MAX_SIZE*1024)){
								// // $image_name=time().$filename;
								// // $newname=$uploaddir.$image_name;

								// // if(move_uploaded_file($_FILES['resident_photo']['tmp_name'], $newname)){

					  // $crud -> insert("resident_tbl", array("house_no_fk"=>$_POST['house_id'],
										// "brgy_id_fk_resident"=>$_POST['resident_id_brgy'],
										// "sitio_id_fk_resident"=>$_POST['sitio_id_fk_resident'],
                                        // "fname"=>$_POST['fname'],
                                        // "mname"=>$_POST['mname'],
                                        // "lname"=>$_POST['lname'],
                                        // "bday"=>$_POST['bdate'],
                                        // "gender"=>$_POST['gender'],
                                        // "civil_status"=>$_POST['cstatus'],
										// "religion"=>$_POST['religion'],
										// "religion_specify"=>$_POST['other_re'],
										// "language"=>$_POST['language'],
										// "language_specify"=>$_POST['other_lang'],
										// "placeofbirth"=>$_POST['placeofbirth'],
										// "education_attain"=>$_POST['education_attain'],
										// "school_type"=>$_POST['school_type'],
                                        // "voter"=>$_POST['voter'],
                                        // "phone_no"=>$_POST['pnumber'],
                                        // "email"=>$_POST['emailadd'],
                                        // "occupation"=>$_POST['occupation'],
                                        // "income"=>$_POST['income'],
										// "current_add_occ"=>$_POST['occupation_address'],
										// "resident_image"=>$actual_image_name,
                                        // "dateregistered"=>$strnow));
										// $rs = $crud -> getResult();
					// if($rs){
						// echo '<script>window.location.href="?brgypage=viewresidence&house_id='.$_POST['house_id'].'&msg=1";</script>';
					// }else{
						// echo '<script>window.location.href="?brgypage=viewresidence&house_id='.$_POST['house_id'].'&msg=0";</script>';
					// }

				// }else {
					// echo '<script>window.location.href="?brgypage=viewresidence&house_id='.$_POST['house_id'].'&msg=2";</script>';

				// }

			// } else {
				// echo '<script>window.location.href="?brgypage=viewresidence&house_id='.$_POST['house_id'].'&msg=3";</script>';

			// }

		// } else {
			// echo '<script>window.location.href="?brgypage=viewresidence&house_id='.$_POST['house_id'].'&msg=4";</script>';

		// }
	// }

// }

?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="badge badge-success"><?php echo $house_number.", ".$brgy_name_house." ".$sitio_name_house;?></h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Residence</a></li>
              <li class="breadcrumb-item active">Residence List</li>
            </ol>
          </div>

        </div>
		<!--<div class="<?php echo $class; ?>"><center><?php echo $message; ?></center></div>
		-->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              <?php echo $house_number;?>

            </div>

          </div>
          <h3 class="card-title">List of Residence Details &nbsp;<a class="btn btn-success btn-sm" data-toggle="modal" title="Add New Resident" data-target="#modal-residentadd"><i class="fa fa-user" style="color:white;"></i></a></h3>

		</div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="" class="table table-bordered table-hover" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <!--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">House Address</th>
                -->
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Fullname</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Gender</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Birthdate</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Civil Status</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Voter</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Family Role</th>
        				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Religion</th>
        				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Employed</th>
        				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Age</th>
        				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Educ. Attain</th>

				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
                  $crud -> sql("SELECT * FROM resident_tbl WHERE house_no_fk='{$house_id}' ORDER BY dateregistered ASC");
                  $rs_resident = $crud -> getResult();

                  foreach($rs_resident as $rs_residentval){

                      if($house_id==$rs_residentval['house_no_fk']){

                        ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
                    <!--<td><?php echo $house_number.", ".$brgy_name_house." ".$sitio_name_house;?></td>-->
                    <td><a href="?brgypage=viewDetailsImage&resident_id=<?php echo $rs_residentval['resident_id'];?>&house_id=<?php echo $rs_residentval['house_no_fk'];?>" data-toggle="tooltip" title="View Details" style="color:black;font-weight:bold;"><?php echo $rs_residentval['fname']." ".$rs_residentval['mname']." ".$rs_residentval['lname'];?></a></td>
                    <td>
                      <?php
					  echo ucwords(getidentityofAll($rs_residentval['gender']));

					  ?>
					 </td>
                    <td><?php echo date('Y M d', strtotime($rs_residentval['bday']));?></td>
                    <td><?php
					echo ucwords(getCivilStatus($rs_residentval['civil_status']));
					?></td>
                    <td><?php echo $rs_residentval['voter'];?></td>
					<td><?php
					echo ucwords(getFamilyRole($rs_residentval['family_status']));
					?>
					<td><?php
					if($rs_residentval['religion']==0){
						echo $rs_residentval['religion_specify'];
					}else{
					echo getTblResVal("religion_name", "religion_tbl", "religion_id", $rs_residentval['religion']);
					}
					?></td>
					<td>
					<?php
							if($rs_residentval['age']>='18' && $rs_residentval['occupation']!="0"){
								echo "YES";
							}elseif($rs_residentval['age']>='18' && $rs_residentval['occupation']=="0"){
								echo "NO";
							}else{
								echo "STUDYING";
							}
					?>
					<td><?php echo $rs_residentval['age'];?></td>
					<td><?php
					echo ucwords(getEducationAttain($rs_residentval['education_attain']));


					?></td>

                    <td>
                      <!-- <a href="#" title="EDIT" id="sitio_<?php echo $rs_sitioval['sitio_id']; ?>" onclick="editSitio(<?php echo $rs_sitioval['sitio_id']; ?>);" data-toggle="modal" data-target="#modal-editsitio" data-backdrop="static" data-results='<?php echo json_encode($rs_sitioval); ?>'>
                      <i class="fa fa-edit fa-1x" STYLE="color:#771f1f;"></i></a> -->

                      <a href="?brgypage=residenceedit&resident_id=<?php echo $rs_residentval['resident_id'];?>&house_id=<?php echo $house_id;?>"><i class="fa fa-edit fa-1x" STYLE="color:#771f1f;"></i></a>
                    </td>


                </tr>
               <?php

               $c++;
             }
           }

               ?>
            </tbody>
          <tfoot></tfoot>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- this is the modal for adding new records of barangay information  -->
  <div class="modal fade" id="modal-residentadd" data-backdrop="static">
          <div class="modal-dialog modal-xl">
            <form role="form" method="post" id="form_addresident" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-success text-xs">
                    Resident.
                  </div>
                </div>
                <h4 class="modal-title">Add New Resident</h4>

              </div>
              <div class="modal-body">

				<!--<div class="<?php echo $class; ?>"><center><?php echo $message; ?></center></div>
				-->
				<div id="msgboxresident"></div>
				<input type="hidden" name="house_id" id="house_id" value="<?php echo $house_id;?>">
				<input type="hidden" name="resident_id_brgy" id="resident_id_brgy" value="<?php echo $brgy_id;?>">
				<input type="hidden" name="sitio_id_fk_resident" id="sitio_id_fk_resident" value="<?php echo $sitio_id_user;?>">
        <input type="hidden" name="amount" id="amount" value="<?php echo getRevenue($house_id);?>">

				<div class="row" style="margin-left:30px;">
                  <div class="col-md-6">
					<table>

					<tbody>


						<tr>
							<td><label for="text">First Name:</label></td>
							<td>
							     <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required onkeyup="this.value = capitalizeFirstLetter(this.value);">

							</td>
						</tr>
						<tr>
							<td><label for="text">Middle Name:</label></td>
							<td>
							     <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name" required onkeyup="this.value = capitalizeFirstLetter(this.value);">
							</td>
						</tr>
						<tr>
							<td><label for="text">Last Name:</label></td>
							<td>
								<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required onkeyup="this.value = capitalizeFirstLetter(this.value);">
							</td>
						</tr>
						<tr>
							<td><label for="text">Birth Date:</label></td>
							<td>
								<input type="text" class="form-control" id="bdate" name="bdate" placeholder="Enter Birth Date" required onchange="ageCompute('bdate', 'age_result');">
							</td>
						</tr>
						<tr>
							<td><label for="text">Ext Name:</label></td>
							<td>
								<input type="text" class="form-control" id="ex_name" name="ex_name" placeholder="E.G JR.">
							</td>
						</tr>
						<tr>
							<td><label for="text">Age:</label></td>
							<td>
								<input readonly type="text" class="form-control" id="age_result" name="age_result" >
							</td>
						</tr>
						<tr style="display:none;" id="showsenior_id">
							<td><label for="text">Senio Citizen Number#:</label></td>
							<td>
								<input type="text" class="form-control" id="senio_id" name="senio_id" placeholder="Enter Senior ID">
							</td>
						</tr>

						<tr>
							<td><label for="text">Citizen-Ship:</label></td>
							<td>
								<input type="text" class="form-control" name="citizen_ship" id="citizen_ship" required>
							</td>
						</tr>
						<tr>
							<td><label for="text">Civil Status:</label></td>
							<td>
								<select class="form-control" id="cstatus" name="cstatus" required>
								  <option value="" disabled selected>--SELECT STATUS--</option>
								 <?php
									foreach(civilstatus() as $key => $val){
										echo '<option value="'.$key.'">'.ucwords($val).'</option>';
									}
								 ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Status:</label></td>
							<td>
								<select class="form-control" id="family_stat" name="family_stat" required>
								  <option value="" disabled selected>--SELECT STATUS--</option>
								  <?php
									 foreach(status() as $stat_key => $stat_val){
										echo '<option value="'.$stat_key.'">'.ucwords($stat_val).'</option>';
									}
								  ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Gender:</label></td>
							<td>
								<select class="form-control" id="gender" name="gender" required>
							    <option value="" disabled selected>--SELECT GENDER--</option>
								<?php
										foreach(gender() as $stat_key => $stat_val){
										echo '<option value="'.$stat_key.'">'.ucwords($stat_val).'</option>';
										}

								?>

								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Religion:</label></td>
							<td>
								<select class="form-control" id="religion" name="religion" required>
							    <option value="" disabled selected>--SELECT RELIGION--</option>

									<?php
										$crud -> sql("SELECT * FROM religion_tbl ORDER BY religion_id ASC");
										$rsre = $crud->getResult();
										foreach($rsre as $rsreval){
									?>
										<option value="<?php echo $rsreval['religion_id'];?>"><?php echo $rsreval['religion_name'];?></option>'
										<?php

										}
									?>
										<option value="0">Others</option>




								</select>
							</td>

						</tr>

						<tr style="display:none;" id="religion_show">
							<td><label for="text">Other Religion:</label></td>
							<td><input type="text" class="form-control" name="other_re" id="other_re" placeholder="Enter your Religion"></td>

						</tr>
						<tr>
							<td><label for="text">Language:</label></td>
							<td>
								<select class="form-control" id="language" name="language" required>
									<option value="" disabled selected>--SELECT LANGUAGE--</option>
									<?php
										foreach(languagestatus() as $key => $val){
											echo '<option value="'.$key.'">'.$val.'</option>';
										}
									?>
									<option value="0">Others</option>
								</select>
							</td>
						</tr>
						<tr style="display:none" id="Specify_language">
							<td><label for="text">Enter Your Language:</label></td>
							<td><input type="text" class="form-control" name="other_lang" id="other_lang" placeholder="Enter Your Language" onkeyup="this.value = capitalizeFirstLetter(this.value);"></td>
						</tr>
						<tr>
							<td><label for="text">Place of Birth:</label></td>
							<td><input type="text" class="form-control" name="placeofbirth" id="placeofbirth" required onkeyup="this.value = capitalizeFirstLetter(this.value);"></td>
						</tr>
						</tbody>
					</table>
				</div>



				<div class="col-md-6">
				<table>
						<tr>
							<td><label for="text">Educational Attainment:</label></td>
							<td>
								<select class="form-control" id="education_attain" name="education_attain" required>
									<option value="" disabled selected>--SELECT EDUCATION--</option>
									<?php
										foreach(EducationAttain() as $key => $val){
											echo '<option value="'.$key.'">'.$val.'</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">School Type:</label></td>
							<td>
								<select class="form-control" id="school_type" name="school_type">
									<option value="" disabled selected>--SELECT TYPE--</option>
									<option value="Public">Public</option>
									<option value="Private">Private</option>
								</select>
							</td>
						</tr>
						<tr style="display:none;" id="votershowhide" name="votershowhide">

							<td><label for="text">Are you a Voter?</label></td>
							<td>
								<select class="form-control" id="voter" name="voter">
								  <option value="" disabled selected>--SELECT--</option>
								  <option value="Yes">Yes</option>
								  <option value="No">No</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Phone Number</label></td>
							<td>
								<input type="text" class="form-control" id="pnumber" name="pnumber" placeholder="Enter Phone Number" max="11" required="required" onkeypress="return isNumber(event)" onkeyup="limitText('pnumber',11)">
							</td>
						</tr>
						<tr>
							<td>
								<label for="text">Email Address</label>
							</td>
							<td>
								<input type="email" class="form-control" id="emailadd" name="emailadd" placeholder="Enter Email Address">
							</td>
						</tr>

						<tr style="display:none" id="occupationshowhide" name="occupationshowhide">
							<td><label for="text">Have an Occupation?</label></td>
							<td>
								<select class="form-control" id="occupationdrop" name="occupationdrop">
								  <option value="" disabled selected>--SELECT--</option>
								  <option value="Yes">Yes</option>
								  <option value="No">No</option>
								</select>
							</td>
						</tr>
						<tr style="display:none;" id="occopuationyes">
							<td><label for="text">Occupation:</label></td>
							<td><select class="form-control" id="occupation" name="occupation">
								  <option value="" disabled selected><center>--SELECT OCCUPATION--</center></option>
								   <?php
										foreach(OccupationProfile() as $key => $val){
											echo '<option value="'.$key.'">'.$val.'</option>';
										}
									?>


								</select>
							</td>
						</tr>
						<tr style="display:none;" id="occupationstatus">
							<td><label for="text">Occupation Status:</label></td>
							<td>
								<select class="form-control" id="occupation_status" name="occupation_status">
								  <option value="" disabled selected>--SELECT--</option>
								  <?php
										foreach(OccupationStatus() as $key => $val){
											echo '<option value="'.$key.'">'.$val.'</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr style="display:none;" id="placeofwork">
							<td><label for="text">Place of Work:</label></td>
							<td>
								<select class="form-control" id="place_of_work" name="place_of_work">
								  <option value="" disabled selected>--SELECT--</option>
								  <option value="Locally">Locally</option>
								  <option value="Abroad">Abroad</option>

								</select>
							</td>
						</tr>

						<tr style="display:none;" id="occopuationyess">
							<td><label for="text">Monthly Income:</label></td>
							<td><input type="text" class="form-control" id="income" name="income" placeholder="Eg. 10,000"></td>
						</tr>
						<tr style="display:none;" id="occupationaddress">
							<td><label for="text">Current Occupation Address:</label></td>
							<td><input type="text" class="form-control" id="occupation_address" name="occupation_address" Placeholder="Don't Fill Up if Same address"></td>
						</tr>





				</table>

				</div>

				</div>


              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                <button type="submit" id="btn_addresident" name="btn_addresident" class="btn btn-success">Save Resident</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
