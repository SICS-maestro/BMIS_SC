
<?php
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
        <div class="card-header">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              Profile.
            </div>
          </div>
          <h3 class="card-title badge badge-success" > &nbsp; <?php echo $house_number.", ".$brgy_name_house." ".$sitio_name_house;?></h3>
        </div>
        <div class="card-body " style="display: block;">
          <form role="form" method="post" id="form_editresident" enctype="multipart/form-data">
                <input type="hidden" id="house_id" name="house_id" value="<?php echo $house_id;?>">
                <input type="hidden" id="resident_id" name="resident_id" value="<?php echo $resident_id;?>">
                <input type="hidden" name="resident_id_brgyedit" id="resident_id_brgyedit" value="<?php echo $brgy_id;?>">
				<input type="hidden" name="sitio_id_fk_resident" id="sitio_id_fk_resident" value="<?php echo $sitio_id_user;?>">
				
				<div id="msgboxresidentedit"></div>
               


			
			<div class="row" style="margin-left:30px;">
                  <div class="col-md-6">
					<table>
					
					<tbody>
						<tr>
							<td><label for="text">First Name:</label></td>
							<td>    
							     <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $rs_residenteditval['fname'];?>" placeholder="Enter First Name" required>
							</td>
						</tr>
						<tr>
							<td><label for="text">Middle Name:</label></td>
							<td>
							     <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $rs_residenteditval['mname'];?>" placeholder="Enter Middle Name" required>
							</td>
						</tr>
						<tr>
							<td><label for="text">Last Name:</label></td>
							<td>
								<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $rs_residenteditval['lname'];?>" placeholder="Enter Last Name" required>
							</td>
						</tr>
						<tr>
							<td><label for="text">Birth Date:</label></td>
							<td>
								<input type="text" class="form-control" id="bdate" name="bdate" value="<?php echo $rs_residenteditval['bday'];?>" placeholder="Enter Birth Date" required>
							</td>
						</tr>
						<tr>
							<td><label for="text">Civil Status:</label></td>
							<td>
								<select class="form-control" id="cstatus" name="cstatus">
								 <?php 
									foreach(civilstatus() as $key => $val){
										if($key==$rs_residenteditval['civil_status']){
											echo '<option value="'.$key.'" selected>'.ucwords($val).'</option>';
										}else{
											echo '<option value="'.$key.'">'.ucwords($val).'</option>';
										}
									}
								  ?>
								
								
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Gender:</label></td>
							<td>
								<select class="form-control" id="gender" name="gender">
								<?php 
									foreach(gender() as $stat_key => $stat_val){
										if($stat_key==$rs_residenteditval['gender']){
											echo '<option value="'.$stat_key.'" selected>'.ucwords($stat_val).'</option>';
										}else{
										echo '<option value="'.$stat_key.'">'.ucwords($stat_val).'</option>';
										}
									}
								?>
								
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Religion:</label></td>
							<td>
								<select class="form-control" id="religion" name="religion">
									<?php 
										$crud -> sql("SELECT * FROM religion_tbl ORDER BY religion_id ASC");
										$rsre = $crud->getResult();
										foreach($rsre as $rsreval){
										
										if($rsreval['religion_id']==$rs_residenteditval['religion']){
									?>
										<option value="<?php echo $rsreval['religion_id'];?>" selected><?php echo $rsreval['religion_name'];?></option>
										<?php 
										}else{
										?>
											<option value="<?php echo $rsreval['religion_id'];?>"><?php echo $rsreval['religion_name'];?></option>
										<?php 
										}	
										}
										?>
										<option value="0" <?php echo ($rsreval['religion_id']==$rs_residenteditval['religion']) ? 'selected' : '';?> >Others</option>
										
										
								
								
								</select>
							</td>
							
						</tr>
						
						<tr style="display:;" id="religion_show">
							<td><label for="text">Please specify:</label></td>
							<td><input type="text" class="form-control" name="other_re" id="other_re" value="<?php echo $rs_residenteditval['religion_specify'];?>" placeholder="Specify Religion"></td>
							
						</tr>
						<tr>
							<td><label for="text">Language:</label></td>
							<td>
								<select class="form-control" id="language" name="language">
									<option value="" disabled selected>--SELECT LANGUAGE--</option>
									<?php 
										foreach(languagestatus() as $stat_key => $stat_val){
											if($stat_key==$rs_residenteditval['language']){
												echo '<option value="'.$stat_key.'" selected>'.ucwords($stat_val).'</option>';
											}else{
											echo '<option value="'.$stat_key.'">'.ucwords($stat_val).'</option>';
											}
										}
										
									?>
								</select>
							</td>
						</tr>
						<tr style="display:;" id="Specify_language">
							<td><label for="text">Specify Language:</label></td>
							<td><input type="text" class="form-control" name="other_lang" id="other_lang" value="<?php echo $rs_residenteditval['language_specify'];?>"></td>
						</tr>
						<tr>
							<td><label for="text">Status in Family:</label></td>
							<td>
								<select class="form-control" id="family_status" name="family_status">
									<option value="" disabled selected>--SELECT LANGUAGE--</option>
									<?php 
										foreach(status() as $stat_key => $stat_val){
											if($stat_key==$rs_residenteditval['family_status']){
												echo '<option value="'.$stat_key.'" selected>'.ucwords($stat_val).'</option>';
											}else{
											echo '<option value="'.$stat_key.'">'.ucwords($stat_val).'</option>';
											}
										}
										
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Place of Birth:</label></td>
							<td><input type="text" class="form-control" name="placeofbirth" id="placeofbirth" value="<?php echo $rs_residenteditval['placeofbirth'];?>"></td>
						</tr>
						</tbody>
					</table>
				</div>
				
				
				
				<div class="col-md-6">
				<table>
						<tr>
							<td><label for="text">Educational Attainment:</label></td>
							<td>
								<select class="form-control" id="education_attain" name="education_attain">
									<?php 
										foreach(EducationAttain() as $stat_key => $stat_val){
											if($stat_key==$rs_residenteditval['education_attain']){
												echo '<option value="'.$stat_key.'" selected>'.ucwords($stat_val).'</option>';
											}else{
											echo '<option value="'.$stat_key.'">'.ucwords($stat_val).'</option>';
											}
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
									<option value="Public"<?php echo ($rs_residenteditval['school_type']=='Public') ? 'selected' : ''; ?>>Public</option>
									<option value="Private"<?php echo ($rs_residenteditval['school_type']=='Private') ? 'selected' : ''; ?>>Private</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Are you a Voter?</label></td>
							<td>
								<select class="form-control" id="voter" name="voter">
								  <option value="" disabled selected>--SELECT--</option>
								  <option value="Yes"<?php echo ($rs_residenteditval['voter']=='Yes') ? 'selected' : ''; ?>>Yes</option>
								  <option value="No"<?php echo ($rs_residenteditval['voter']=='No') ? 'selected' : ''; ?>>No</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="text">Phone Number</label></td>
							<td>    
								<input type="number" class="form-control" id="pnumber" name="pnumber"  value="<?php echo $rs_residenteditval['phone_no'];?>" placeholder="Enter Phone Number" required>
							</td>
						</tr>
						<tr>
							<td>
								<label for="text">Email Address</label>
							</td>
							<td>    
								<input type="email" class="form-control" id="emailadd" name="emailadd" value="<?php echo $rs_residenteditval['email'];?>" placeholder="Enter Email Address">
							</td>
						</tr>
						
						<tr>
							<td><label for="text">Have an Occupation?</label></td>
							<td>
								<select class="form-control" id="occupationdrop" name="occupationdrop">
								  <option value="" disabled selected>--SELECT--</option>
								  <option value="Yes"<?php echo ($rs_residenteditval['occupation']!='') ? 'selected' : ''; ?>>Yes</option>
								  <option value="No"<?php echo ($rs_residenteditval['occupation']=='') ? 'selected' : ''; ?>>No</option>
								</select>
							</td>
						</tr>
						<tr style="display:;" id="occopuationyes">
							<td><label for="text">Occupation:</label></td>
							<td><input type="text" class="form-control" id="occupation" value="<?php echo $rs_residenteditval['occupation'];?>" name="occupation"></td>
						</tr>
						
						<tr style="display:;" id="occopuationyess">
							<td><label for="text">Monthly Income:</label></td>
							<td><input type="text" class="form-control" id="income" name="income" value="<?php echo $rs_residenteditval['income'];?>" placeholder="Eg. 10,000"></td>
						</tr>
						<tr style="display:;" id="occupationaddress">
							<td><label for="text">Current Occupation Address:</label></td>
							<td><input type="text" class="form-control" id="occupation_address" value="<?php echo $rs_residenteditval['current_add_occ'];?>" name="occupation_address" Placeholder="Don't Fill Up if Same address"></td>
						</tr>
				</table>
				
				</div>
				
				</div>
				<div class="modal-footer justify-content-between">
                  <div></div>
                  <button type="submit" id="btn_updateresident" name="btn_updateresident" class="btn btn-success">Save Changes</button>
                </div>

        </form>

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
