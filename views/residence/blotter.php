
<?php 
$barangay_id = (isset($_GET['barangay_id'])) ? (string) $_GET['barangay_id'] : "";
$barangay_id2 = (isset($_GET['barangay_id2'])) ? (string) $_GET['barangay_id2'] : "";


?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>BLOTTER REPORT</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Residence</a></li>
              <li class="breadcrumb-item active">Residence List</li>
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
            <div class="ribbon bg-primary text-lg">
              blotter.
            </div>
          </div>
          <h3 class="card-title"><b>BLOTTER</b></h3>
        </div>
        <div class="card-body">
			<form role="form" method="post" id="form_addblotter" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $brgy_id;?>" name="brgy_id" id="brgy_id">
			
			<div id="msgboxblotter"></div>
			<div class="row">
				<div class="col-md-3">
					<label>Complainant Address:</label>
					<select class="form-control" onchange="window.location.href='?brgypage=blotter&barangay_id='+this.value+'&barangay_id2=<?php echo $barangay_id2;?>'" name="barangay_id" id="barangay_id">
						  <option value="" selected disabled>--SELECT BARANGAY--</option>
						  <?php
                        $crud -> sql("SELECT * FROM brgy_tbl ORDER BY brgy_id ASC");
                        $rs_brgy = $crud -> getResult();
                        foreach ($rs_brgy as $rs_brgyval) {
						
						  $s = '';
							if($rs_brgyval['brgy_id']==$barangay_id){
								$s = 'selected';
							}
							
							echo '<option value="'.$rs_brgyval['brgy_id'].'" '.$s.'>'.ucwords($rs_brgyval['brgy_name']).'</option>';
                          }
                          ?>
					</select>
				</div>
				<div class="col-md-3">
					<label>Complainant Name:</label>
					<select class="form-control select2bs4" name="resident_id_find" id="resident_id_find" required>
						<option selected disabled>--SELECT COMPLAINANT--</option>
						<?php
                        $crud -> sql("SELECT * FROM resident_tbl ORDER BY resident_id ASC");
                        $rs_resident_find = $crud -> getResult();
                        foreach ($rs_resident_find as $rs_resident_findval) {
						
						  $s = '';
							if($rs_resident_findval['brgy_id_fk_resident']==$barangay_id){
								
							echo '<option value="'.$rs_resident_findval['resident_id'].'" '.$s.'>'.ucwords($rs_resident_findval['fname'].' '.$rs_resident_findval['mname'].'. '.$rs_resident_findval['lname']).'</option>';
                          }
						}
                          ?>
					</select>
				</div>
				<input type="hidden" name="complainant_sitio" id="complainant_sitio">
				<div class="col-md-3">
				<label>Respondent Address:</label>
					<select class="form-control" onchange="window.location.href='?brgypage=blotter&barangay_id2='+this.value+'&barangay_id=<?php echo $barangay_id;?>'" name="barangay_id2" id="barangay_id2">
						<option value="" selected disabled>--SELECT BARANGAY--</option>
						<?php
                        $crud -> sql("SELECT * FROM brgy_tbl ORDER BY brgy_id ASC");
                        $rs_brgy = $crud -> getResult();
                        foreach ($rs_brgy as $rs_brgyval) {
						
						  $s = '';
							if($rs_brgyval['brgy_id']==$barangay_id2){
								$s = 'selected';
							}
							
							echo '<option value="'.$rs_brgyval['brgy_id'].'" '.$s.'>'.ucwords($rs_brgyval['brgy_name']).'</option>';
                          }
                          ?>
					</select>
				</div>
				
				<div class="col-md-3">
					<label>Respondent Name:</label>
					<select class="form-control select2bs4" name="resident_id_find2" id="resident_id_find2" required>
						<option selected disabled>--SELECT RESPONDENT--</option>
						<?php
                        $crud -> sql("SELECT * FROM resident_tbl ORDER BY resident_id ASC");
                        $rs_resident_find = $crud -> getResult();
                        foreach ($rs_resident_find as $rs_resident_findval) {
						
						  $s = '';
							if($rs_resident_findval['brgy_id_fk_resident']==$barangay_id2){
								
							echo '<option value="'.$rs_resident_findval['resident_id'].'" '.$s.'>'.ucwords($rs_resident_findval['fname'].' '.$rs_resident_findval['mname'].'. '.$rs_resident_findval['lname']).'</option>';
                          }
						}
                          ?>
					</select>
				</div>
			</div>
			<input type="hidden" name="respondent_sitio" id="respondent_sitio">
				
			<br>
			
			<div class="row">
				<div class="col-md-3">
					<label>Incident Type:</label>
					<input type="text" class="form-control" id="incident_type" name="incident_type">
				</div>
				<div class="col-md-3">
					<label>Time of Incident:</label>
					<input type="text" class="form-control" id="time" name="time">
				</div>
				<div class="col-md-3">
					<label>Date of Incident:</label>
					<input type="text" class="form-control" id="blotter_date" name="blotter_date">
				</div>
				<div class="col-md-3">
					<label>Incident Location:</label>
					<input type="text" class="form-control" id="location_in" name="location_in">
				</div>
				
			
			</div>
			
			<div class="row">
				<div class="col-md-12">
				  <label>Incident Narrative:</label>
				 
				 <textarea class="textarea" placeholder="Place some text here" id="narrativereport" name="narrativereport" rows="10" ></textarea>
				
					<!--<textarea class="form-control" name="narrativereport" id="narrativereport" rows="10"></textarea>
				-->
				</div>
				<div class="pull-right">
                <button type="submit" id="btn_addblotter" name="btn_addblotter" class="btn btn-primary">Generate Blotter</button>
              </div>
			  
			</div>
			</form>
		</div>
    
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


		
<script type="text/javascript">
	function addClearance(id) {
		var result = $('#issuedcle_'+id).data("results");
		console.log(result);
		$("#resident_id").val(result.resident_id);
		}
</script>
