
<?php
//date_default_timezone_set("Asia/Manila");
include '../../../controller/mysql_crud.php';
include '../../../controller/brgy_sitiofunction.php';
include '../../../controller/dashboardfunction.php';
// include '../../controller/userfunction.php';
// include '../../controller/residentfunction.php';
$crud = new CRUD();
$crud->connect();


$brgy_id = (isset($_GET['brgy_id'])) ? $_GET['brgy_id'] : (string) "";
$sitio_id = isset($_GET['sitio_id']) ? (string) $_GET['sitio_id'] : "";
$logo = getTblResVal("logo_image", "logo_tbl", "barangay_id_logo", "'{$brgy_id}'");
$usertype = (isset($_GET['usertypereport'])) ? (string) $_GET['usertypereport'] : "";

?>


<!DOCTYPE html>

<html>
	<head>
		<title style="font-size:5px;">Barangay Form No.1</title>
		<!-- Theme style -->
		<link rel="stylesheet" href="../../../assets/AdminLTE/dist/css/adminlte.min.css">
	</head>
	<body>
		<div class="container"><br>
			<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
					<table align="center">
						<tr>
								<td><img src="../../../municipality_logo/Santa_Cruz_Marinduque.png" style="float:right; width: 80px;"></td>
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
						<td><img src="../../../barangaylogo/<?php echo $logo;?>" width="80"></td>

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
                    <h3>Number of Voters in Barangay <?php echo '<u>'.getTblResValDashboard("brgy_name", "brgy_tbl", "brgy_id", $brgy_id).'</u>';?></h3>
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

          	<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sitio Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count Male</th>
      								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count Female</th>
										</tr>
                    </thead>
                    <tbody>
                      <?php
                        $crud -> sql("SELECT * FROM sitio_tbl WHERE brgy_id_fk='{$brgy_id}' ORDER BY sitio_id ASC");
                        $rs_sitioval = $crud -> getResult();

                        foreach($rs_sitioval as $rs_sitiovalRes){

                      ?>

                      <tr role="row" class="even">
                          <td><?php echo $rs_sitiovalRes['sitio_name'];?></td>
                          <td><?php echo countDILGTblResultsVoter("resident_tbl", "sitio_id_fk_resident", $rs_sitiovalRes['sitio_id'], "gender", "1", "Voter", "Yes");?></td>
      										<td><?php echo countDILGTblResultsVoter("resident_tbl", "sitio_id_fk_resident", $rs_sitiovalRes['sitio_id'], "gender", "2", "Voter", "Yes");?></td>
											</tr>
                     <?php

                   }
									 ?>
                  </tbody>
                <tfoot></tfoot>
              </table>
		</div>
	</div>





	<div class="row">
		<div class="col-md-4">

		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<label>Noted By:</label><br>
    <?php if($usertype=="BarangayCaptain"){?>
		<u ><?php echo getTblResValDashboardBC("fullname", "users_tbl", "brgy_id_fk", $brgy_id, "usertype", $usertype);?></u><br>
  <?php }?>
		<label>Punong Barangay</label><br>

		</div>
	</div>






		</div>
	</body>
	<script type="text/javascript">
	window.print();
	</script>
</html>
