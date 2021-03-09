<?php
$resident_id = (isset($_GET['resident_id'])) ? $_GET['resident_id'] : (string) 0;
$or = (isset($_GET['or'])) ? $_GET['or'] : (string) 0;
$cedula = (isset($_GET['cedula'])) ? $_GET['cedula'] : (string) 0;


$fullname = getResidentFullname($resident_id);
$civil_status = getTblResVal("civil_status", "resident_tbl", "resident_id", "'{$resident_id}'");
$purpose = getTblResVal("purpose", "barangay_clearance_tbl", "or_number", $or);
$issued_or = getTblResVal("date_issued_or", "barangay_clearance_tbl", "or_number", $or);
$issued_cedula = getTblResVal("date_issued_cedula", "barangay_clearance_tbl", "cedula_number", $cedula);
$resident_age = getTblResVal("age", "resident_tbl", "resident_id", "'{$resident_id}'");
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
					<h5>Municipality of Santa Cruz</h5>
					<h5>BARANGAY <u><?PHP echo strtoupper(getbrgyname($brgy_id));?></u></h5>
				</div>
				<div class="col-md-3 pull-right" >
					<a class="btn btn-default btn-flat bg-olive" href="reports/ClearancePrintReport.php?resident_id=<?php echo $resident_id;?>&or=<?php echo $or?>&cedula=<?php echo $cedula;?>&brgy_id=<?php echo $brgy_id;?>" target="_blank"><i class="fa fa-print"></i></a>
				</div>
			</div><br>
			<div class="row"><hr>
				<div class="col-md-2"></div>
				<div class="col-md-8" align="center">
					<h4>OFFICE OF THE PUNONG BARANGAY</h4>
					
				</div>
				<div class="col-md-2 pull-right" >
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-9">
					<h6 class="pull-left">TO WHOM IT MAY CONCERN,</h6><br>
					<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify <b><u><?php echo $fullname;?></u></b>, <b><u><?php echo $resident_age;?></u></b> years old, 
					<b><u><?php echo getCivilStatus($civil_status);?></u></b>, Filipino Citizen is a resident of this barangay and who is personally know to me to be law-abiding citizen
					and has a good moral character. That of my personal knowledge <b>he/she</b> has not committed, nor been involved in any kind of unlawful activities in this barangay.
					</p>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						This certification is issued for the purpose of : <b><u><?php echo $purpose;?></u></b>
					</p>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 Issued this <?php echo date('d');?>th day of <?php echo date('F')?>, <?php echo date('Y')?> at Barangay <?php echo getbrgyname($brgy_id);?>, Santa Cruz, Marinduque.
					</p>
					<br>
					
				</div>
				<div class="col-md-1 " >
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-3">
				<table>
						<tr>
							<td><u><?php echo strtoupper(getBarangayCaptain($brgy_id));?></u></td>
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
				
					
				</div>
				<div class="col-md-2">
				
					
				</div>
				<div class="col-md-2 pull-right" >
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">
				<p>O.R No. : <?php echo $or;?></p>
				<p>Date: <?php echo $issued_or;?></p>
				<p>Amount: <?php echo number_format($or_price,'2');?></p>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-3">
				<p>CTC No. : <?php echo $cedula;?></p>
				<p>Date: <?php echo $issued_cedula;?></p>
				<p>Issued in: Brgy. <?php echo getbrgyname($brgy_id);?> SCM</p>
				</div>
				
			</div>

         
        </div>
  
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>