<?php
//date_default_timezone_set("Asia/Manila");
include '../../controller/mysql_crud.php';
include '../../controller/brgy_sitiofunction.php';
include '../../controller/userfunction.php';
include '../../controller/residentfunction.php';
$crud = new CRUD();
$crud->connect();


$brgy_id = (isset($_GET['brgy_id'])) ? $_GET['brgy_id'] : (string) 0;
$logo = getTblResVal("logo_image", "logo_tbl", "barangay_id_logo", "'{$brgy_id}'");
 

?>


<!DOCTYPE html>

<html>
	<head>
		<title style="font-size:5px;">Barangay Form No.1</title>
		<!-- Theme style -->
		<link rel="stylesheet" href="../../assets/AdminLTE/dist/css/adminlte.min.css">
	</head>
	<body>
		<div class="container"><br>
			<div class="row">		
			<div class="col-lg-12 col-md-12 col-sm-12">
					<table align="center">
						<tr>
								<td><img src="../../municipality_logo/Santa_Cruz_Marinduque.png" style="float:right; width: 80px;"></td>
							<td>
								<center>
								<h5 style="font-size:25px;">
									<small>Republic of the Philippines</small><br>
									Province of Marinduque<br>
									<b>Municipality of Santa Cruz</b><br>
									<b>BARANGAY <?php echo getbrgyname($brgy_id);?></b>
								</h5>
								</center>
							</td>
							<td><img src="../../barangaylogo/<?php echo $logo;?>" width="80"></td>
							
						</tr>
					</table>
			</div>
			</div>
			<br>
			<div class="row">		
				<div class="col-lg-12 col-md-12 col-sm-12">
						<table align="center">
							<tr>
								<td>
									<center>
										<h4>OFFICE OF THE PUNONG BARANGAY</h4>
									</center>
								</td>
								
							</tr>
						</table>
				</div>
			</div><br><hr>
			
			<div class="row">		
				<div class="col-lg-12 col-md-12 col-sm-12">
						<table align="center">
							<tr>
								<td><td>
									<center>
									<h3>RESIDENT LIST REPORT BY AGE AND POPULATION OF BRGY. <?PHP echo getbrgyname($brgy_id);?></h3>
          
									</center>
								</td>
								<td></td>
							</tr>
						</table>
				</div>
			</div>
			<br><br><br>
			
			
			<div class="row">
				<div class="col-md-12">
					
					
				
				
			<table id="" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
			  <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="5" aria-label="Browser: activate to sort column ascending"><center>NUMBER OF INHABITANTS</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="3" aria-label="Browser: activate to sort column ascending"><center>NUMBER OF</center></th>
                
              </tr>
			  <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Browser: activate to sort column ascending"><center>PUROK</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>MALE</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>FEMALE</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>TOTAL</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>ASS. MEMBERS</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>HOUSEHOLD</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>FAMILIES</center></th>
               
              </tr>
            
              </thead>
              <tbody>
                <?php
                  $c = 1;
				  $crud -> sql("SELECT * FROM sitio_tbl WHERE brgy_id_fk='{$brgy_id}'");
                  $rs_sitio_report = $crud -> getResult();

                  foreach($rs_sitio_report as $rs_sitio_reportval){
					
					$countMaleResident = getCountMaleResident($rs_sitio_reportval['sitio_id']);
					$countFemaleResident = getCountFemaleResident($rs_sitio_reportval['sitio_id']);
					$total = $countMaleResident + $countFemaleResident;
					$household = getHouseHoldCount($rs_sitio_reportval['sitio_id']);
					$families = getFamiliesHousehold($rs_sitio_reportval['sitio_id']);
					
                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
                    <td><?php echo $rs_sitio_reportval['sitio_name'];?></td>
					<td><?php echo $countMaleResident;?></td>
					<td><?php echo $countFemaleResident;?></td>
					<td><?php echo $total;?></td>
					<td><center><?php echo "-"?></center></td>
					<td><?php echo $household;?></td>
					<td><?php echo $families;?></td>
					
                </tr>
               <?php
						
               $c++;
					
				 }

               ?>
            </tbody>
          <tfoot></tfoot>
        </table>
		</div>
	</div>
			
			
			
			
	<center><h4>AGE DISTRIBUTION</h4></center>
		<div class="row">
		
		<div class="col-md-5">
			<table id="" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
			  <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>AGE</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>MALE</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>FEMALE</center></th>
               
              </tr>
            
              </thead>
              <tbody>
                <?php
                 
					for($i=0; $i<=40; $i++){
					$crud -> sql("SELECT * FROM resident_tbl WHERE brgy_id_fk_resident='{$brgy_id}' AND age='{$i}'");
					$rs_countresident = $crud -> getResult();

                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><b><?php echo $i;?></b></td>
                    <td><?php echo getResident040($brgy_id,$i);?></td>
					<td><?php echo getResident040Female($brgy_id,$i);?></td>
					
                </tr>
               <?php
					}
				?>
				<tr>
					<td>TOTAL</td>
					<td><?php echo getResident040Sum($brgy_id);?></td>
					<td><?php echo getResident040SumFemale($brgy_id);?></td>
				</tr>
            </tbody>
          <tfoot></tfoot>
        </table>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-5">
		
		
		
		
		<table id="" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
			  <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>AGE</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>MALE</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><center>FEMALE</center></th>
               
              </tr>
            
              </thead>
              <tbody>
                <?php
                 
					for($i=41; $i<=80; $i++){
					$crud -> sql("SELECT * FROM resident_tbl WHERE brgy_id_fk_resident='{$brgy_id}' AND age='{$i}'");
					$rs_countresident = $crud -> getResult();

                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><b><?php echo $i;?></b></td>
                    <td><?php echo getResident4180Male($brgy_id,$i);?></td>
					<td><?php echo getResident4180Female($brgy_id,$i);?></td>
				</tr>
               <?php
					}
				?>
				<tr>
					<td>TOTAL</td>
					<td><?php echo getResident4180MaleSumabove($brgy_id);?></td>
					<td><?php echo getResident4180FemaleSumabove($brgy_id);?></td>
				</tr>
            </tbody>
          <tfoot></tfoot>
        </table>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
		<label>Prepared By:</label><br>
		_______________________________<br>
		<label>Barangay Secretary</label><br>
		
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<label>Noted By:</label><br>
		_______________________________<br>
		<label>Punong Barangay</label><br>
		
		</div>
	</div>
			
		
			
			
			
			
		</div>
	</body>
	<script type="text/javascript">
	//window.print();
	</script>
</html>















