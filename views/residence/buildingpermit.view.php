<?php
$resident_id = (isset($_GET['resident_id'])) ? $_GET['resident_id'] : (string) 0;
$or = (isset($_GET['or'])) ? $_GET['or'] : (string) 0;
$cedula = (isset($_GET['cedula'])) ? $_GET['cedula'] : (string) 0;


$fullname = getResidentFullname($resident_id);

$civil_status = getTblResVal("civil_status", "resident_tbl", "resident_id", "'{$resident_id}'");
$activity = getTblResVal("trade_activity", "businesspermit_tbl", "business_cedula", $cedula);
$location = getTblResVal("location", "businesspermit_tbl", "business_cedula", $cedula);
$operatrmanager = getTblResVal("operator_manager", "businesspermit_tbl", "business_cedula", $cedula);
$address = getTblResVal("address", "businesspermit_tbl", "business_cedula", $cedula);
$or_date = getTblResVal("date_issued_or", "businesspermit_tbl", "business_cedula", $cedula);
$cedula_date = getTblResVal("date_issued_cedula", "businesspermit_tbl", "business_cedula", $cedula);
$or_price = getTblResVal("or_price", "or_tbl", "brgy_id_fk_or", "'{$brgy_id}'");
$resident_age = getTblResVal("age", "resident_tbl", "resident_id", "'{$resident_id}'");

$crud -> sql("SELECT * FROM buildingpermit_tbl WHERE resident_id_fk='{$resident_id}'");
$rs = $crud -> getResult();

foreach($rs as $rsvalbuilding){

?>

<div class="content-wrapper" style="min-height: 1589.56px;"><br>

    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        
        <div class="card-body table-responsive" style="display: block;">
			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" align="center">
					<h6>Republic of the Philippines</h6>
					<h6>Province of Marinduque</h6>
					<h6>Municipality of Santa Cruz</h6>
					<H5>BARANGAY <?php echo strtoupper(getbrgyname($brgy_id));?></H5>
				</div>
				<div class="col-md-3 pull-right" >
					<a class="btn btn-default btn-flat bg-olive" href="reports/buildingpermit.report.print.php?resident_id=<?php echo $resident_id;?>&or=<?php echo $or?>&cedula=<?php echo $cedula;?>&brgy_id=<?php echo $brgy_id;?>" target="_blank"><i class="fa fa-print"></i>Print Certification</a>
					<a class="btn btn-default btn-flat bg-olive" href="reports/buildingpermitclearance.report.print.php?resident_id=<?php echo $resident_id;?>&or=<?php echo $or?>&cedula=<?php echo $cedula;?>&brgy_id=<?php echo $brgy_id;?>" target="_blank"><i class="fa fa-print"></i>Print Clearance</a>
				
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" align="center">
					<h5>OFFICE OF THE PUNONG BARANGAY</h5><hr>
					<h3>CERTIFICATION</h3>
				</div>
				<div class="col-md-2 pull-right" >
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-9">
					<h6 class="pull-left"><i>TO WHOM IT MAY CONCERN:</i></h6><br>
					
				</div>
				<div class="col-md-1" >
				</div>
			</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
					<p align="justify">&nbsp;&nbsp;&nbsp;This is to certify that <b><u><?php echo $fullname;?></u></b>, 
					<b><u><?php echo getCivilStatus($civil_status);?></u></b>,<b><u><?php echo $resident_age;?></u></b>
					years old, Filipino Citizen, a resident of this barangay for <b><u><?php echo $rsvalbuilding['years_brgy']?></u></b>
					years, and the owner of a lot measuring <b><u><?php echo $rsvalbuilding['measure'];?></u></b> sq.m/ has. located at 
					<b><u><?php echo $rsvalbuilding['located'];?></u></b> under Title No./ T.D <b><u><?php echo getBuildingPermit($rsvalbuilding['permit']);?></u></b>
					is applying for a Barangay Clearance to be used in securing PERMIT for the Purpose stated Below:
					<br>
					<p>&nbsp;&nbsp;&nbsp;<b>PURPOSE: <u><?php echo getPurposeBuilding($rsvalbuilding['purpose']);?></u></b></p>
					<br>
					<p>&nbsp;&nbsp;&nbsp;This Further Certifies that the above-named person is complying with the provisions of existing Barangay Ordinances, rules and regulations being enforced in this barangay.</p>
					<br>
					<p>&nbsp;&nbsp;&nbsp;In view of the foregoing, this barangay, thru the undesigned, interposes <B>NO OBJECTION</B> for the issuance of the corresponding <b>PERMIT</b> being applied for.</p>
					<br>
					<p>&nbsp;&nbsp;&nbsp;Issued this <b><u><?php echo date('d').'<sup>'.'th'.'</sup>'?></u></b> day of <b><u><?php echo date('F').' '.date('Y');?></u></b> at <b><u><?php echo 'BARANGAY'.' '.strtoupper(getbrgyname($brgy_id)).' '.'SANTA CRUZ, MARINDUQUE.';?></u></b></p>
					
					
					</div>
					<div class="col-md-2"></div>
				</div>
				<br><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-3">
				<table>
						<tr>
							<td><b><u><?php echo strtoupper(getBarangayCaptain($brgy_id));?></u></b></td>
						<tr>
						<tr>
							
							<td>Barangay Captain</td>
						</tr>
					</table>
				</div>
				<div class="col-md-1"></div>
			</div><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">
				<p>O.R No. : <b><u><?php echo $or;?></u></b></p>
				<p>Date: <b><u><?php echo $rsvalbuilding['or_date'];?></u></b></p>
				<p>Amount: <b><u><?php echo number_format($or_price,'2');?></u></b></p>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-3">
				<p>CTC No. : <b><u><?php echo $cedula;?></u></b></p>
				<p>Date: <b><u><?php echo $rsvalbuilding['cedula_date'];?></u></b></p>
				<p>Issued in: <b><u>Brgy. <?php echo getbrgyname($brgy_id);?> SCM</u></b></p>
				</div>
				
			</div>
			<br>
			<div class="row">
				
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<p>*******************************************************************************************************</p>
				</div>
				<div class="col-md-2"></div>
				
			</div>
			
			<div class="row">
				
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<p><b>NOTE:</b> <i>1.Permit</i> - Building/Electrical/Sanitary/Plumbing/Fencing</p>
					<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>2.Purpose</i> - Construction or repair of residential house/business establishment/Electrical Installation/fence, etc.</p>
					
				
				</div>
				<div class="col-md-2"></div>
				
			</div>

         
        </div>
  
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?php }?>