<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Barangay Official</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Officials</a></li>
              <li class="breadcrumb-item active">Officials List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-primary">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-primary text-lg">
              Officials.
            </div>
          </div>
          <h3 class="card-title">Add Designation to Barangay Officials </h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">
	
          <table id="" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Full Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Add Designation</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
                  $crud -> sql("SELECT * FROM users_tbl WHERE brgy_id_fk='{$brgy_id}' AND usertype='Kagawad' && useractive='0'");
                  $rs_off = $crud -> getResult();

                  foreach($rs_off as $rs_offval){

                ?>

                <tr role="row" class="even">
                    <td><?php echo $c;?></td>
                    <td><?php echo $rs_offval['fullname'];?>
					
					</td>
                    <td>
					  
					   <a href="#" title="EDIT" id="designation_<?php echo $rs_offval['user_id']; ?>" onclick="editDesignation('<?php echo $rs_offval['user_id']; ?>');" data-toggle="modal" data-target="#modal-activatedesignation" data-backdrop="static" data-results='<?php echo json_encode($rs_offval); ?>'>
                      <i class="fa fa-edit fa-1x" STYLE="color:#771f1f;"></i></a>
                   
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
          
        </div>
		
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>




<!-- this is the modal for adding new records of barangay information  -->
  <div class="modal fade" id="modal-activatedesignation">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_designation" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary text-xs">
                    SITIO.
                  </div>
                </div>
                <h4 class="modal-title">Add New Designation</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxdesignationadd"></div>
				<input type="hidden" name="u_id" id="u_id">
                <div class="form-group">
                    <label for="text">Sitio</label>
						<select class="form-control" id="designation_id" name="designation_id">
							    <option value="" selected>--SELECT SITIO--</option>
								
									<?php 
										$crud -> sql("SELECT * FROM sitio_tbl WHERE brgy_id_fk='{$brgy_id}'");
										$rsre = $crud->getResult();
										foreach($rsre as $rsreval){
										if(getUserID_Sitio_id($rsreval['sitio_id'])==$rsreval['sitio_id']){	
										$s= 'disabled';
										
											echo '<option value="'.$rsreval['sitio_id'].'" '.$s.'>'.ucwords($rsreval['sitio_name']).'</option>';
										}
										elseif(getUserID_Sitio_id($rsreval['sitio_id'])!=$rsreval['sitio_id']){
											
											echo '<option value="'.$rsreval['sitio_id'].'">'.ucwords($rsreval['sitio_name']).'</option>';
										}
										}
										
									?>	
								</select>
					
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_adddesignation" name="btn_adddesignation" class="btn btn-primary">Update</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		
		
<script type="text/javascript">
	function editDesignation(id) {
		var result = $('#designation_'+id).data("results");
		console.log(result);
		$("#u_id").val(result.user_id);
	}
</script>