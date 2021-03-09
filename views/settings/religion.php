<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Religion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Religion</a></li>
              <li class="breadcrumb-item active">Religion List</li>
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
            <div class="ribbon bg-primary text-lg">
              Religion.
            </div>
          </div>
          <h3 class="card-title">List of Religion Details &nbsp;<a class="btn btn-primary btn-sm" data-toggle="modal" title="Add New Sitio" data-target="#modal-religiontype"><i class="fa fa-plus" style="color:white;"></i></a></h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Religion Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
                  $crud -> sql("SELECT * FROM religion_tbl ORDER BY religion_id ASC");
                  $rs_religion = $crud -> getResult();

                  foreach($rs_religion as $rs_religionval){

                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
                    <td><?php echo $rs_religionval['religion_name'];?></td>
                    <td>
                      <a href="#" title="EDIT" id="religiontype_<?php echo $rs_religionval['religion_id']; ?>" onclick="editReligiontype(<?php echo $rs_religionval['religion_id']; ?>);" data-toggle="modal" data-target="#modal-editReligiontype" data-backdrop="static" data-results='<?php echo json_encode($rs_religionval); ?>'>
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
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- this is the modal for adding new records of barangay information  -->
  <div class="modal fade" id="modal-religiontype">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_religiontype" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary text-xs">
                    Religion.
                  </div>
                </div>
                <h4 class="modal-title">Add New Religion</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxreligion"></div>
                <div class="form-group">
                    <label for="text">Religion Name:</label>
                    <input type="text" class="form-control" id="religion_name" name="religion_name" placeholder="Enter Religion Name" required>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_addreligion" name="btn_addreligion" class="btn btn-primary">Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- this is the modal for Editing records of barangay information  -->
        <div class="modal fade" id="modal-editReligiontype">
                  <div class="modal-dialog modal-sm">
                    <form role="form" method="post" id="form_editreligiontype" enctype="multipart/form-data">

                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <div class="ribbon-wrapper">
                          <div class="ribbon bg-danger text-xs">
                             EDIT.
                          </div>
                        </div>
                        <h4 class="modal-title">Update Religion Type</h4>

                      </div>
                      <div class="modal-body">
                        <div id="msgboxreligiontype"></div>
                        <div class="form-group">
                          <input type="hidden" id="religion_ids" name="religion_ids">
                            <label for="text">Religion Type</label>
                            <input type="text" class="form-control" id="religion_namess" name="religion_namess" placeholder="Enter Religion Name" required>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_editReligion" name="btn_editReligion" class="btn btn-danger">Update</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </form>
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

<script type="text/javascript">
	function editReligiontype(id) {
		var result = $('#religiontype_'+id).data("results");
		console.log(result);
		$("#religion_ids").val(result.religion_id);
		$("#religion_namess").val(result.religion_name);
		}
</script>
