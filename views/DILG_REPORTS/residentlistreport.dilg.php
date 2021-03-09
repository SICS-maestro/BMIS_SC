
<?php 
$brgy_id_find = (isset($_GET['brgy_id'])) ? (string) $_GET['brgy_id'] : "";
 


?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>RESIDENT LIST REPORT</h1>
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
              Resident.
            </div>
          </div>
		  <div class="row">
		  <div class="col-md-3">
          <h3 class="card-title">List of Residence Details</h3>
		  </div>
		  <div class="col-md-3">
		  <select class="form-control" onchange="window.location.href='?brgypage=Residentlistdilg&brgy_id='+this.value+''" name="brgy_id" id="brgy_id">
						  <option value="" selected disabled>--SELECT BRGY--</option>
						<?php
                        $crud -> sql("SELECT * FROM brgy_tbl ORDER BY brgy_id ASC");
                        $rs_brgyreport = $crud -> getResult();
                        foreach ($rs_brgyreport as $rs_brgyreportval) {
						
						  $s = '';
							if($rs_brgyreportval['brgy_id']==$brgy_id_find){
								$s = 'selected';
							}
							
							echo '<option value="'.$rs_brgyreportval['brgy_id'].'" '.$s.'>'.ucwords($rs_brgyreportval['brgy_name']).'</option>';
                          }
                          ?>
			</select>
			</div>
			<a href="DILG_REPORTS/residentlistreport.dilg.print.php?brgy_id=<?php echo $brgy_id_find;?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i></a>
			</div>
			
			
			
			
        </div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">RESIDENT ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
                
              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
				  $crud -> sql("SELECT * FROM resident_tbl WHERE brgy_id_fk_resident='{$brgy_id_find}'");
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
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

