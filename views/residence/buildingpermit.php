
<?php 
$sitio_id_find_business = (isset($_GET['sitio_id_clearance'])) ? (string) $_GET['sitio_id_clearance'] : "";
 


?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Issuance of Building Permit Clearance</h1>
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
              Permit.
            </div>
          </div>
          <div class="row">
		  <div class="col-md-3">
          <h3 class="card-title">List of Residence Details</h3>
		  </div>
		  <div class="col-md-3">
		  <select class="form-control" onchange="window.location.href='?brgypage=buildingpermit&sitio_id_clearance='+this.value+''" name="sitio_id_clearance" id="sitio_idclearance">
						  <option value="" selected disabled>--SELECT SITIO--</option>
						  <?php
                        $crud -> sql("SELECT * FROM sitio_tbl WHERE brgy_id_fk='{$brgy_id}' ORDER BY sitio_id ASC");
                        $rs_sitioreport = $crud -> getResult();
                        foreach ($rs_sitioreport as $rs_sitioreportval) {
						
						  $s = '';
							if($rs_sitioreportval['sitio_id']==$sitio_id_find_business){
								$s = 'selected';
							}
							
							echo '<option value="'.$rs_sitioreportval['sitio_id'].'" '.$s.'>'.ucwords($rs_sitioreportval['sitio_name']).'</option>';
                          }
                          ?>
			</select>
			</div>
			</div>
		  
        </div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">House Number</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Resident Names</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Gender</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
				  $crud -> sql("SELECT * FROM resident_tbl WHERE brgy_id_fk_resident='{$brgy_id}'");
                  $rs_business = $crud -> getResult();

                  foreach($rs_business as $rs_businessval){
					
					
					$house_id = gethouse_id($rs_businessval['house_no_fk']);
					
					if($_GET['sitio_id_clearance']==$house_id){
					
					
					
					$id = getTblResVal("brgy_id_fk_house", "houseno_tbl", "house_id", "'{$rs_businessval['house_no_fk']}'");
					$ids = getTblResVal("sitio_id_fk_house", "houseno_tbl", "house_id", "'{$rs_businessval['house_no_fk']}'");
					
					$houseno = gethousenumber($rs_businessval['house_no_fk']);
					$brgy_name_issued = getbrgyname($id);
					$sitioname_Issued = getsitioname($ids);
					$or = getOrNumber($rs_businessval['brgy_id_fk_resident']);
					$cedula = getCedulaId($rs_businessval['brgy_id_fk_resident']);
					
                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
                    <td><?php echo $houseno.",".$brgy_name_issued.' '.$sitioname_Issued;?></td>
                    <td><?php echo $rs_businessval['fname'].' '.$rs_businessval['mname'].' '.$rs_businessval['lname'];?></td>
					<td><?php echo getidentityofAll($rs_businessval['gender']);?></td>
					<td>
						<a href="#" class="btn btn-default btn-sm bg-olive" title="ISSUED" id="issuedcle_<?php echo $rs_businessval['resident_id']; ?>" onclick="addBusiness('<?php echo $rs_businessval['resident_id']; ?>');" data-toggle="modal" data-target="#modal-buildingpermit" data-backdrop="static" data-results='<?php echo json_encode($rs_businessval); ?>'>
							Building Permit
						</a>
					</td>
                </tr>
               <?php
					}
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


 <div class="modal fade" id="modal-buildingpermit">
          <div class="modal-dialog modal-lg">
            <form role="form" method="post" id="form_issuedbuildingpermit" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-olive">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-olive text-xs">
                    Permit.
                  </div>
                </div>
                <h4 class="modal-title">Issued Building Permit Clearance</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxbuilding"></div>
                <input type="hidden" name="resident_id" id="resident_id">
                <input type="hidden" name="sitio_id_bus" id="sitio_id_bus">
                
				<input type="hidden" name="brgy_idbuilding" id="brgy_idbuilding" value="<?php echo $brgy_id;?>">
				<div class="row">
					<div class="col-md-6">
						<table>
							<tr>
								<td><label for="text">Official Receipt Number</label></td>
								<td><input type="text"  class="form-control" id="or" name="or" value="<?php echo $or;?>" placeholder="" required></td>
							</tr>
							<tr>
								<td><label for="text">Cedula Number</label></td>
								<td>
									<input type="text"  class="form-control" id="cedula" name="cedula" value="<?php echo $cedula;?>"placeholder="" required>
								</td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table>
							<tr>
								<td><label for="text">O.R Issued Date</label></td>
								<td><input type="text" class="form-control" id="or_date" name="or_date" placeholder="Issued Date" required></td>
							</tr>
							<tr>
								<td><label for="text">Cedula Issued Date</label></td>
								<td>
									<input type="text" class="form-control" id="cedula_date" name="cedula_date" placeholder="Issued Date" required>
								</td>
							</tr>
							
						</table>
					</div>
				</div><hr><hr>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="text">Years in Barangay</label>
							<input type="text" class="form-control" id="Years" name="Years" placeholder="Years in Barangay" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="text">Lot Measuring</label>
							<input type="text" class="form-control" id="lot_measure" name="lot_measure" placeholder="Sq.M" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="text">Located at</label>
							<input type="text" class="form-control" id="located" name="located" placeholder="located at.." required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="text">Title No./ Permit </label>
							<select class="form-control" name="Permit" id="Permit" required>
								<option value="0" selected disabled>--SELECT PERMIT--</option>
								<?php 
									foreach(BuildingPermit() as $key => $val){
										
										echo '<option value="'.$key.'">'.$val.'</option>';
										
									}
								
								?>
								
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="text">Purpose </label>
							<select class="form-control" name="purpose" id="purpose" required>
								<option value="0" selected disabled>--SELECT PERMIT--</option>
								<?php 
									foreach(PurposeBuilding() as $key => $val){
										
										echo '<option value="'.$key.'">'.$val.'</option>';
										
									}
								
								?>
								
							</select>
						</div>
					</div>
				</div>
				
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_addbuildingpermit" name="btn_addbuildingpermit" class="btn btn-default btn-flat bg-olive">Generate</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
	
		
		
<script type="text/javascript">
	function addBusiness(id) {
		var result = $('#issuedcle_'+id).data("results");
		console.log(result);
		$("#resident_id").val(result.resident_id);
		$("#sitio_id_bus").val(result.sitio_id_fk_resident);
		
		
		}
</script>
