<?php
$resident_id = (isset($_GET['resident_id'])) ? $_GET['resident_id'] : (string) 0;
$or = (isset($_GET['or'])) ? $_GET['or'] : (string) 0;
$cedula = (isset($_GET['cedula'])) ? $_GET['cedula'] : (string) 0;
$brgy_id = (isset($_GET['brgy_idbusiness_not'])) ? $_GET['brgy_idbusiness_not'] : (string) 0;


$fullname = getResidentFullname($resident_id);
$civil_status = getTblResVal("civil_status", "resident_tbl", "resident_id", "'{$resident_id}'");
$activity = getTblResVal("trade_activity", "businesspermit_tbl", "business_cedula", $cedula);
$location = getTblResVal("location", "businesspermit_tbl", "business_cedula", $cedula);
$operatrmanager = getTblResVal("operator_manager", "businesspermit_tbl", "business_cedula", $cedula);
$address = getTblResVal("address", "businesspermit_tbl", "business_cedula", $cedula);
$or_date = getTblResVal("date_issued_or", "businesspermit_tbl", "business_cedula", $cedula);
$cedula_date = getTblResVal("date_issued_cedula", "businesspermit_tbl", "business_cedula", $cedula);
$or_price = getTblResVal("or_price", "or_tbl", "brgy_id_fk_or", "'{$brgy_id}'");
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
					<a class="btn btn-default btn-flat bg-olive" href="reports/BusinessPermit.print.php?resident_id=<?php echo $resident_id;?>&or=<?php echo $or?>&cedula=<?php echo $cedula;?>&brgy_id=<?php echo $brgy_id;?>" target="_blank"><i class="fa fa-print"></i></a>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" align="center">
					<h5>OFFICE OF THE PUNONG BARANGAY</h5><hr>
					<h3><u>BARANGAY CLEARANCE</u></h3>
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
					<div class="col-md-3"></div>
					<div class="col-md-6">
					<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that the trade activity described below:</p>
					<div style="margin-left:;">
						<table align="center">
								<tr>
									<td><h4><u><?php echo strtoupper($activity);?></u></h4></td>
								<tr>
								<tr>
									
									<td align="center">(Trade Activity)</td>
								</tr>
						</table><br>
						<table align="center">
								<tr>
									<td><h4><u><?php echo strtoupper($location);?></u></h4></td>
								<tr>
								<tr>
									
									<td align="center">(Location)</td>
								</tr>
						</table><br>
						<table align="center">
								<tr>
									<td><h4><u><?php echo strtoupper($operatrmanager);?></u></h4></td>
								<tr>
								<tr>
									
									<td align="center">(Operator/Manager)</td>
								</tr>
						</table>
						<table align="center">
								<tr>
									<td><h4><u><?php echo strtoupper($address);?></u></h4></td>
								<tr>
								<tr>
									
									<td align="center">(Address)</td>
								</tr>
						</table>
					</div>
					</div>
					<div class="col-md-3"></div>
				</div>
				<br><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<p>Proposed to be established in this Barangay and is being applied for a Barangay Clearance to
						be used in securing a corresponding Mayor's Permit has been found to be:
					</p>
					<br>
					<p>In conformity with the provisions of existing Barangay Ordinances, rules and regulations being enforced in this Barangay;</p>
					<br>
					<p>Not Among those businesses or trade activities being banned to be established in this Barangay.</p>
					<br>
					<p>In the view of the foregoing, this barangay, thru the undersigned, interposes no objection for
					the issuance of the corresponding Mayor's Permit being applied for.</p>
				</div>
				<div class="col-md-2" >
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-8">
					<p><i>Issued this <u><?php echo date('d');?></u> day of <u><?php echo date('F')." ".date('Y');?></u></u></i></p>
				</div>
				<div class="col-md-2">
				</div>
			</div>
			
			
			
			<br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">
				<p>O.R No. : <?php echo $or;?></p>
				<p>Date: <?php echo $or_date;?></p>
				<p>Amount: <?php echo number_format($or_price,'2');?></p>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-3">
				<p>CTC No. : <?php echo $cedula;?></p>
				<p>Date: <?php echo $cedula_date;?></p>
				<p>Issued in: Brgy. <?php echo getbrgyname($brgy_id);?> SCM</p>
				</div>
				
			</div>

         
        </div>
  
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>