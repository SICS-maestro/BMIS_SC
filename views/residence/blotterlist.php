<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LIST OF BLOTTER</h1>
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
            <div class="ribbon bg-success text-lg">
              blotter.
            </div>
          </div>
          
		  
		<?php 
			$statusDILGblotter = (isset($_GET['status'])) ? (string) $_GET['status'] : "";
			
			
		?>  
		<div class="row">
		  <div class="col-md-3">
          <h3 class="card-title">List of Residence Details</h3>
		  </div>
		  <div class="col-md-3">
		  <select class="form-control" onchange="window.location.href='?brgypage=blotterlist&status='+this.value+''" name="status" id="status">
						  <option value="" selected disabled>--SELECT STATUS--</option>
						  <option value="SETTLED" <?php echo ($statusDILGblotter=="SETTLED") ? 'selected' : "";?>>SETTLED</option>
						  <<option value="ONGOING" <?php echo ($statusDILGblotter=="ONGOING") ? 'selected' : "";?>>ONGOING</option>
						  
                          ?>
			</select>
			</div>
			</div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">BLOTTER ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">COMPLAINANT</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">RESPONDENT</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">DATE OF INCIDENT</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">STATUS</th>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SCHEDULE</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
				  if($usertype=="Administrator"){
				  $crud -> sql("SELECT * FROM blotter_tbl WHERE status='{$_GET['status']}'");
                  }
				  else{
					$crud -> sql("SELECT * FROM blotter_tbl WHERE brgy_id_fk='{$brgy_id}' AND status='{$_GET['status']}'");
                  }
				  $rs_blotterlist = $crud -> getResult();

                  foreach($rs_blotterlist as $rs_blotterlistval){
					
					$blotter_id = $rs_blotterlistval['blotter_id'];
                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $rs_blotterlistval['blotter_id'];?></td>
                    <td><?php echo getResidentFullname($rs_blotterlistval['resident_id_fk']);?></td>
					<td><?php echo getResidentFullname($rs_blotterlistval['respondent_id_fk']);?></td>
                    <td><?php echo date('F d Y', strtotime($rs_blotterlistval['datetimeincident']));?></td>
					<td><?php 
					if($rs_blotterlistval['status']=="SETTLED"){
						echo '<h5 style="color:orange;">SETTLED</h5>';
					}else{
						echo '<h5 style="color:red;">ONGOING</h5>';
					}
					?>
					<td>
					<?php if($rs_blotterlistval['schedule_date']==""){
						echo '<h6 style="color:red;">No Sched</h6>';
					}else{
						echo date('F d Y',strtotime($rs_blotterlistval['schedule_date']))."/".$rs_blotterlistval['timeofSched'];
					}
					?>
					</td>
					<td>
						<a class="btn btn-outline-success btn-xs" href="?brgypage=viewblotterdetails&blotter_id=<?php echo $rs_blotterlistval['blotter_id']?>&complainant=<?php echo $rs_blotterlistval['resident_id_fk'];?>&respondent=<?php echo $rs_blotterlistval['respondent_id_fk'];?>">
						
						<?php if($rs_blotterlistval['status']=="SETTLED"){echo "View";}else{echo "View & Update";}?>
						</a>
						<?php if($rs_blotterlistval['status']=="SETTLED"){?>
						<a href="reports/blotterreport.php?blotter_id=<?php echo $rs_blotterlistval['blotter_id'];?>&complainant=<?php echo $rs_blotterlistval['resident_id_fk'];?>&respondent=<?php echo $rs_blotterlistval['respondent_id_fk'];?>&brgy_id=<?php echo $brgy_id;?>" target="_blank" class="btn btn-outline-info btn-xs"><i class="fa fa-print"></i>&nbsp;Report</a>
						<?php }else{?>
						<a href="reports/blotterreport.php?blotter_id=<?php echo $rs_blotterlistval['blotter_id'];?>&complainant=<?php echo $rs_blotterlistval['resident_id_fk'];?>&respondent=<?php echo $rs_blotterlistval['respondent_id_fk'];?>&brgy_id=<?php echo $brgy_id;?>" target="_blank" class="btn btn-outline-info btn-xs disabled"><i class="fa fa-print"></i>&nbsp;Report</a>
						
						<?php }?>
					</td>
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
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


		<?php 
		//$blotter_idss = (isset($_GET['blotter_idss'])) ? (string) $_GET['blotter_idss'] : "";
		?>
		 <!--<div class="modal fade" id="modal-blotterlist">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_updateblotter" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-danger text-xs">
                    Update.
                  </div>
                </div>
                <h4 class="modal-title">Update Blotter Status</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxupdateblotter"></div>
                <input type="text" name="blotter_idsddd" id="blotter_iddddd" value="<?php echo $brgy_id;?>">
                 <input type="text" name="blotter_idss" id="blotter_idss" value="<?php echo $blotter_idss;?>">
                
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="text">Update Status:</label>
							<select class="form-control" id="status_blotter" name="status_blotter">
								<option value="" selected Disabled>--Select Status--</option>
								<option value="SETTLED">SETTLED</option>
								</select>
						</div>
					</div>
					
				</div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_blotterupdate" name="btn_blotterupdate" class="btn btn-danger">Update Status</button>
              </div>
            </div>
            <!-- /.modal-content -->
          <!--</form>
          </div>-->
          <!-- /.modal-dialog -->
        <!--</div>-->
        <!-- /.modal -->
		
<script type="text/javascript">
	// function updateBlotter(id) {
		 // var result = $('#blotter_'+id).data("results");
		 // console.log(result);
		 // $("#blotter_id").val(result.blotter_id);
		 // }
	
			
		
		
</script>	
		
		

