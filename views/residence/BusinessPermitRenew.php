<?php 
	$choose_business = (isset($_GET['choose_business'])) ? $_GET['choose_business'] : (string) "";
	
?>
<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Renew Business Permit</h1>
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
            <div class="ribbon bg-olive text-lg">
              Renew.
            </div>
          </div>
          <h3 class="card-title">List of Residence Details</h3>
		<div class="row">
		  <div class="col-md-3">
		  <select class="form-control" name="choose_business" id="choose_business" onchange="window.location.href='?brgypage=BusinessPermitRenew&choose_business='+this.value+''">
			<option SELECTED DISABLED>--PLEASE SELECT--</option>
			<option value="resident" <?php echo ($choose_business=="resident") ? 'selected' : "";?>>RESIDENCE IN BARANGAY</option>
			<option value="not" <?php echo ($choose_business=="not") ? 'selected' : "";?>>NOT RESIDENCE IN BARANGAY</option>
		  </select>
		  </div>
		</div>
        </div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <?php  if($choose_business=="resident"){?>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Full Name</th>
				<?php }elseif($choose_business=="not"){?>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Owner</th>
				<?php }?>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Business Type</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date Started</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date Renew</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
				  if($choose_business=="resident"){
					$crud -> sql("SELECT * FROM businesspermit_tbl WHERE brgy_id_fk='{$brgy_id}' AND resident_id_fk != '0' ");
                  }elseif($choose_business=="not"){
					$crud -> sql("SELECT * FROM businesspermit_tbl WHERE brgy_id_fk='{$brgy_id}' AND resident_id_fk = '0' ");
                  }
				  $rs_renew = $crud -> getResult();

                  foreach($rs_renew as $rs_renewval){
					
					 $or = getOrNumber($rs_renewval['brgy_id_fk']);
					 $cedula = getCedulaId($rs_renewval['brgy_id_fk']);
				?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
					<?php if($choose_business=="resident"){?>
                    <td><?php echo getResidentFullname($rs_renewval['resident_id_fk']);?></td>
					<?php }elseif($choose_business=="not"){?>
					<td><?php echo $rs_renewval['operator_manager'];?></td>
					<?php }?>
					<td><?php echo $rs_renewval['trade_activity'];?></td>
					<td><?php echo date('F d Y',strtotime($rs_renewval['date_apply']));?></td>
                   <td>
				   
				   <?php 
				   if($rs_renewval['date_renew']==""){
					echo "Starting Business";
				   }else{
					   echo date('F d Y',strtotime($rs_renewval['date_renew']));
				   }
				   ?>
				   
				   </td>
                   
				   <td>
						<a href="#" class="btn btn-default btn-sm btn-flat bg-olive" title="RENEWAL" id="issuedcle_<?php echo $rs_renewval['business_id']; ?>" onclick="addRenew('<?php echo $rs_renewval['business_id']; ?>');" data-toggle="modal" data-target="#modal-renewal" data-backdrop="static" data-results='<?php echo json_encode($rs_renewval); ?>'>
						RENEWAL	
						</a>
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


 <div class="modal fade" id="modal-renewal">
          <div class="modal-dialog modal-xs">
            <form role="form" method="post" id="form_renew" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-olive">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-olive text-xs">
                    Renew.
                  </div>
                </div>
                <h4 class="modal-title" style="color:white;">Renewal of Business</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxrenew"></div>
                <input type="hidden" name="business_id" id="business_id">
                
				<input type="hidden" name="brgy_idrenew" id="brgy_idrenew" value="<?php echo $brgy_id;?>">
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="text">Official Receipt Number</label>
							<input type="text"  class="form-control" id="or" name="or" value="<?php echo $or;?>" placeholder="" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="text">Cedula Number</label>
							<input type="text"  class="form-control" id="cedula" name="cedula" value="<?php echo $cedula;?>"placeholder="" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="text">O.R Issued Date</label>
							<input type="text" class="form-control" id="or_date" name="or_date" placeholder="Issued Date" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="text">Cedula Issued Date</label>
							<input type="text" class="form-control" id="cedula_date" name="cedula_date" placeholder="Issued Date" required>
						</div>
					</div>
				</div>
			</div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_renew" name="btn_renew" class="btn btn-default btn-flat bg-olive">Generate</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
<script type="text/javascript">
	function addRenew(id) {
		var result = $('#issuedcle_'+id).data("results");
		console.log(result);
		$("#business_id").val(result.business_id);
		}
</script>
