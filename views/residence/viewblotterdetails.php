<?php 
$blotter_id = (isset($_GET['blotter_id'])) ? (string) $_GET['blotter_id'] : "";
$complainant = (isset($_GET['complainant'])) ? (string) $_GET['complainant'] : "";
$respondent = (isset($_GET['respondent'])) ? (string) $_GET['respondent'] : "";

$comval = getResidentFullname($complainant);
$resval = getResidentFullname($respondent);

$inci_type = getTblResVal("incident_type", "blotter_tbl", "blotter_id", "'{$blotter_id}'");
$status = getTblResVal("status", "blotter_tbl", "blotter_id", "'{$blotter_id}'");
$loc = getTblResVal("incident_loc", "blotter_tbl", "blotter_id", "'{$blotter_id}'");
$narrativereport = getTblResVal("blotter_report", "blotter_tbl", "blotter_id", "'{$blotter_id}'");
$time = getTblResVal("datetimeincident", "blotter_tbl", "blotter_id", "'{$blotter_id}'");
$sched = getTblResVal("schedule_date", "blotter_tbl", "blotter_id", "'{$blotter_id}'");
$time_sched = getTblResVal("timeofSched", "blotter_tbl", "blotter_id", "'{$blotter_id}'");

?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>BLOTTER REPORT</h1>
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
        <div class="card-header color-palette">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              blotter.
            </div>
          </div>
          <h3 class="card-title"><b>Details about the blotter reports
			<?php if($status!="SETTLED"){?>
		    <a href="&blotter_id=<?php echo $rs_blotterlistval['blotter_id'];?>" class="btn btn-success btn-xs" title="blotter update" id="blotter_<?php echo $rs_blotterlistval['blotter_id']; ?>" onclick="updateBlotter('<?php echo $rs_blotterlistval['blotter_id']; ?>');" data-toggle="modal" data-target="#modal-blotterlist" data-backdrop="static" data-results='<?php echo json_encode($rs_blotterlistval); ?>'>
			Update Status
			</a>
			 <a href="&blotter_idss=<?php echo $rs_blotterlistval['blotter_id'];?>" class="btn btn-outline-warning btn-xs" title="blotter update" data-toggle="modal" data-target="#modal-schedule" data-backdrop="static">
			<?php if($sched==""){ echo "Set Schedule";}else{ echo "Update Schedule";}?>
						</a>
			<?php }else{?>
				
			<?php }?>
			</b>
		  </h3>
        </div>
        <div class="card-body table-responsive">
		<div class="row">
		<div class="col-md-3">
			<table id="" class="table table-stripped table-hover dataTable" role="grid" aria-describedby="example2_info">
			  <tbody>
				<tr>
					<td><h6>BLOTTER ID:</h6></td>
					<td><label><?php echo $blotter_id?></label></td>
				</tr>
				<tr>
					<td><h6>INCIDENT TYPE:</h6></td>
					<td><label><?php echo $inci_type?></label></td>
				</tr>
				<tr>
					<td><h6>STATUS:</h6></td>
					<td><label><?php echo $status?></label></td>
				</tr>
			  </tbody>  
			</table>
		</div>
		<div class="col-md-6">
			<table id="" class="table table-stripped table-hover dataTable" role="grid" aria-describedby="example2_info">
			  <tbody>
				<tr>
					<td><h6>COMPLAINANT NAME:</h6></td>
					<td><label><?php echo $comval?></label></td>
				</tr>
				<tr>
					<td><h6>RESPONDENT NAME:</h6></td>
					<td><label><?php echo $resval?></label></td>
				</tr>
				<tr>
					<td><h6>INCIDENT LOCATION:</h6></td>
					<td><label><?php echo $loc?></label></td>
				</tr>
			  </tbody>  
			</table>
		</div>
		<div class="col-md-3">
			<table id="" class="table table-stripped table-hover dataTable" role="grid" aria-describedby="example2_info">
			  <tbody>
				<tr>
					<td><h6>INCIDENT TIME:</h6></td>
					<td><label><?php echo $time?></label></td>
				</tr>
				<tr>
					<td><h6>SCHEDULE:</h6></td>
					
					<td><label><?php if($sched==""){echo "NO EXISTING SCHEDULE";}else{echo $sched;}?></label></td>
				</tr>
				<tr>
					<td><h6>TIME:</h6></td>
					<td><label><?php if($time_sched==""){echo "NO EXISTING TIME";}else{echo $time_sched;}?></label></td>
				</tr>
				
			  </tbody>  
			</table>
		</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<label>BLOTTER REPORT:</label>
				<textarea class="textarea">
					<?php echo $narrativereport;?>
				</textarea>
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











		<?php 
		$blotter_id = (isset($_GET['blotter_id'])) ? (string) $_GET['blotter_id'] : "";
		?>
		 <div class="modal fade" id="modal-blotterlist">
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
                <input type="hidden" name="blotter_id" id="blotter_id" value="<?php echo $blotter_id;?>">
                
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
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		
		
		 <div class="modal fade" id="modal-schedule">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_schedule" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-olive">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-olive text-xs">
                    Sched.
                  </div>
                </div>
                <h4 class="modal-title"><?php if($sched==""){ echo "Set Schedule";}else{ echo "Update Schedule";}?></h4>

              </div>
              <div class="modal-body">
                <div id="msgboxschedule"></div>
                <input type="hidden" name="blotter_id_sched" id="blotter_id_sched" value="<?php echo $blotter_id;?>">
                <input type="hidden" name="complainant" id="complainant" value="<?php echo $complainant;?>">
                <input type="hidden" name="respondent" id="respondent" value="<?php echo $respondent;?>">
                
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="text">SET SCHEDULE:</label>
							<input type="text" class="form-control" name="set_Schedule" id="set_Schedule" value="<?php if ($sched!=""){ echo $sched; }?>">
						</div>
						<div class="form-group">
							<label for="text">SET TIME:</label>
							<input type="text" class="form-control" name="set_time" id="set_time" value="<?php if ($time_sched!=""){ echo $time_sched; }?>">
						</div>
					</div>
					
				</div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_sched" name="btn_sched" class="btn btn-success">Set Schedule</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		
		<script type="text/javascript">
	function updateBlotter(id) {
		 var result = $('#blotter_'+id).data("results");
		 console.log(result);
		 $("#blotter_id").val(result.blotter_id);
		 }
	
			
		
		
</script>
