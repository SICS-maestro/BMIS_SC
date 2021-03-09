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
		<title style="font-size:5px;">Resident List</title>
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
							<!--<td><img src="../barangaylogo/<?php echo $logo;?>" width="80"></td>
							-->
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
										<h3><u>RESIDENT LIST OF <?php echo strtoupper(getbrgyname($brgy_id));?></u></h3>
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
					
					
				
				
			<table id="" style="font-size:20px;" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">RESIDENT ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
                
              </tr>
              </thead>
               <tbody>
                <?php
                  $c = 1;
				  $crud -> sql("SELECT * FROM resident_tbl WHERE brgy_id_fk_resident='{$brgy_id}'");
                  $rs_resident_list = $crud -> getResult();

                  foreach($rs_resident_list as $rs_resident_listval){
					
					$house_id = gethouse_id($rs_resident_listval['house_no_fk']);
					
					
                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
                    <td><?php echo getResidentFullname($rs_resident_listval['resident_id']);?></td>
					
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
			
			
			
			
		
			
			
			
			
		</div>
	</body>
	<script type="text/javascript">
	//window.print();
	</script>
</html>















