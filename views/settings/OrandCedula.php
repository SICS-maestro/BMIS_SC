<?php

if($usertype=="Administrator"){
$where = "ORDER BY sitio_id ASC";
}elseif($usertype=="BarangayCaptain" || $usertype=="Kagawad"){
$where = "WHERE brgy_id_fk='{$brgy_id}'";
}

?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Official Reciept and Cedula</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">OR and Cedula</a></li>
              <li class="breadcrumb-item active">OR and Cedula List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-success">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-sm">
              OR/Cedula.
            </div>
          </div>
          <h3 class="card-title">List of OR and Cedula Details &nbsp;
			
			<?php if(getOrId($brgy_id) == NULL){?>
			<a class="btn btn-success btn-sm" data-toggle="modal" title="Add New OR and Cedula" data-target="#modal-orceduladd"><i class="fa fa-plus" style="color:white;"></i></a>
			
			<?PHP }else{ 
				$crud -> sql("SELECT * FROM or_tbl WHERE brgy_id_fk_or='{$brgy_id}'");
                $rs_orget = $crud -> getResult();
				foreach($rs_orget as $rs_orgetval){
				
			?>
			
			
			 <a href="#" title="EDIT OR NUMBER" id="cedulaor_<?php echo $rs_orgetval['or_id']; ?>" onclick="editCedulaOr('<?php echo $rs_orgetval['or_id']; ?>');" data-toggle="modal" data-target="#modal-orceduledit" data-backdrop="static" data-results='<?php echo json_encode($rs_orgetval); ?>'>
             <i class="fa fa-edit fa-1x" STYLE="color:#771f1f;"></i></a>
				<?php
				}
				
				$crud -> sql("SELECT * FROM cedula_tbl WHERE brgy_id_fk_cedula='{$brgy_id}'");
                $rs_cedulaget = $crud -> getResult();
				foreach($rs_cedulaget as $rs_cedulagetval){
				
				
				?>
			<a href="#" title="EDIT CEDULA NUMBER" id="cedula_<?php echo $rs_cedulagetval['cedula_id']; ?>" onclick="editCedula('<?php echo $rs_cedulagetval['cedula_id']; ?>');" data-toggle="modal" data-target="#modal-cedulaedit" data-backdrop="static" data-results='<?php echo json_encode($rs_cedulagetval); ?>'>
             <i class="fa fa-edit fa-1x" STYLE="color:#771f1f;"></i></a>
			<?php }}?>
		  </h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">
			
			<div class="row">
				 <?php
                  
                  $crud -> sql("SELECT * FROM or_tbl WHERE brgy_id_fk_or='{$brgy_id}'");
                  $rs_or = $crud -> getResult();
				  foreach($rs_or as $rs_orval){
                ?>
				<div class="col-md-10">
					 <div class="form-group">
					 <table>
						<tr>
						<td>
                        <label for="text">Official Receipt Number:</label>
						</td>
						<td>
						<input type="text" class="form-control" value="<?php echo $rs_orval['or_number'];?>" readonly>
						</td><br>
						<td>
                        <label for="text">Price:</label>
						</td>
						<td>
						<input type="text" class="form-control" value="<?php echo number_format($rs_orval['or_price'],'2');?>" readonly>
						</td><br>
						</tr>
					 </table>
				   </div>
				   
				 <?php
                  }
				  $crud -> sql("SELECT * FROM cedula_tbl WHERE brgy_id_fk_cedula='{$brgy_id}'");
                  $rs_cedula = $crud -> getResult();
				  foreach($rs_cedula as $rs_cedulaval){


                ?>
					
					<div class="form-group">
					 <table>
						<tr>
						<td>
                        <label for="text">Cedula Number:</label>
						</td>
						<td>
						<input type="text" class="form-control" value="<?php echo $rs_cedulaval['cedula_no'];?>" readonly>
						</td><br>
						<td>
                        <label for="text">Price:</label>
						</td>
						<td>
						<input type="text" class="form-control" value="<?php echo number_format($rs_cedulaval['cedula_price'],'2');?>" readonly>
						</td><br>
						</tr>
					 </table>
				   </div>
					
					
					
					
					
				</div>
				  <?php }?>
				  
			</div>

       
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
          Official Receipt and Cedula
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- this is the modal for adding new records of barangay information  -->
  <div class="modal fade" id="modal-orceduladd">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_addorcedula" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-success text-xs">
                    OR.
                  </div>
                </div>
                <h4 class="modal-title">Add OR and Cedula</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxorcedula"></div>
                <input type="hidden" name="orcedula_id" id="orcedula_id" value="<?php echo $brgy_id;?>">
                <div class="form-group">
					<label for="text">Official Receipt Number:</label>
                    <input type="number" class="form-control" id="or_number" name="or_number" placeholder="Enter OR Number" required>
                </div>
				<div class="form-group">
					<label for="text">Official Receipt Price:</label>
                    <input type="number" class="form-control" id="or_price" name="or_price" placeholder="Enter OR Number" required>
                </div>
				 <div class="form-group">
                    <label for="text">Cedula Number:</label>
                    <input type="number" class="form-control" id="cedula_number" name="cedula_number" placeholder="Enter Cedula Number" required>
                </div>
				<div class="form-group">
					<label for="text">Cedula Price:</label>
                    <input type="number" class="form-control" id="cedula_price" name="cedula_price" placeholder="Enter OR Number" required>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_addorcedula" name="btn_addorcedula" class="btn btn-success">Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

       <div class="modal fade" id="modal-orceduledit">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_editorcedula" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-success text-xs">
                    OR.
                  </div>
                </div>
                <h4 class="modal-title">Edit OR Number</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxorcedulaedit"></div>
				<input type="hidden" value="<?php echo $brgy_id;?>" name="brgy_or" id="brgy_or">
                <input type="hidden" name="orcedula_idedit" id="orcedula_idedit">
                <div class="form-group">
					<label for="text">Official Receipt Number:</label>
                    <input type="number" class="form-control" id="or_number_edit" name="or_number_edit" placeholder="Enter OR Number" required>
				</div>
				<div class="form-group">
					<label for="text">Price:</label>
                    <input type="text" class="form-control" id="or_price_edit" name="or_price_edit" placeholder="Enter OR Price" required>
				</div>
				
			  </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_editorcedula" name="btn_editorcedula" class="btn btn-success">Update</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

		<div class="modal fade" id="modal-cedulaedit">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_editcedula" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-success text-xs">
                    Cedula.
                  </div>
                </div>
                <h4 class="modal-title">Edit Cedula Number</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxcedulaedit"></div>
				<input type="hidden" value="<?php echo $brgy_id;?>" name="brgy_cedula" id="brgy_cedula">
                <input type="hidden" name="cedulaedit" id="cedulaedit">
                <div class="form-group">
                    <label for="text">Cedula Number:</label>
                    <input type="number" class="form-control" id="cedula_number_edit" name="cedula_number_edit" placeholder="Enter Cedula Number" required>
                </div>
				<div class="form-group">
                    <label for="text">Cedula Price:</label>
                    <input type="text" class="form-control" id="cedula_price_edit" name="cedula_price_edit" placeholder="Enter Cedula Price" required>
                </div>
				
				
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_editcedula" name="btn_editcedula" class="btn btn-success">Update</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		

<script type="text/javascript">
	function editCedulaOr(id) {
		var result = $('#cedulaor_'+id).data("results");
		console.log(result);
		$("#orcedula_idedit").val(result.or_id);
		$("#or_number_edit").val(result.or_number);
		$("#or_price_edit").val(result.or_price);
	}
	function editCedula(id) {
		var result = $('#cedula_'+id).data("results");
		console.log(result);
		$("#cedulaedit").val(result.cedula_id);
		$("#cedula_number_edit").val(result.cedula_no);
		$("#cedula_price_edit").val(result.cedula_price);
	}
</script>
