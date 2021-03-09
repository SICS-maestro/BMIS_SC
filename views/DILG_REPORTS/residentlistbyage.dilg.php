
<?php 
$brgy_id = (isset($_GET['brgy_id'])) ? (string) $_GET['brgy_id'] : "";
?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>RESIDENT LIST REPORT BY AGE AND POPULATION OF BRGY. <?PHP echo getbrgyname($brgy_id);?></h1>
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
        <div class="card-header bg-olive">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              age.
            </div>
          </div>
		<div class="row">
			<h3 class="card-title">List of Residence </h3>&nbsp;
			<a href="DILG_REPORTS/residentlistbyage.dilg.print.php?brgy_id=<?php echo $brgy_id;?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i></a>
			<div class="col-md-3">
			<select class="form-control" onchange="window.location.href='?brgypage=residentlistcountdilg&brgy_id='+this.value+''" name="brgy_id" id="brgy_id">
						  <option value="" selected disabled>--SELECT BRGY--</option>
						<?php
                        $crud -> sql("SELECT * FROM brgy_tbl ORDER BY brgy_id ASC");
                        $rs_brgyreport = $crud -> getResult();
                        foreach ($rs_brgyreport as $rs_brgyreportval) {
						
						  $s = '';
							if($rs_brgyreportval['brgy_id']==$brgy_id){
								$s = 'selected';
							}
							
							echo '<option value="'.$rs_brgyreportval['brgy_id'].'" '.$s.'>'.ucwords($rs_brgyreportval['brgy_name']).'</option>';
                          }
                          ?>
			</select>
			</div>
		</div>
			
			
			
			
        </div>
        <div class="card-body table-responsive" style="display: block;">
			<div class="row">
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
        </table><br><br>
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
		
		
		
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

