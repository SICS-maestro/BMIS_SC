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
            <h1>List of Business</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Business</a></li>
              <li class="breadcrumb-item active">Business List</li>
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
              Business.
            </div>
          </div>
          <h3 class="card-title">List of Business Details &nbsp;<a class="btn btn-primary btn-sm" data-toggle="modal" title="Add New Sitio" data-target="#modal-businesstype"><i class="fa fa-plus" style="color:white;"></i></a></h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Business Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
                  $crud -> sql("SELECT * FROM businesstype_tbl ORDER BY businesstype_id ASC");
                  $rs_businesstype = $crud -> getResult();

                  foreach($rs_businesstype as $rs_businesstypeval){

                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
                    <td><?php echo $rs_businesstypeval['businesstype_name'];?></td>
                    <td>
                      <a href="#" title="EDIT" id="businesstype_<?php echo $rs_businesstypeval['businesstype_id']; ?>" onclick="editBusinesstype(<?php echo $rs_businesstypeval['businesstype_id']; ?>);" data-toggle="modal" data-target="#modal-editbusinesstype" data-backdrop="static" data-results='<?php echo json_encode($rs_businesstypeval); ?>'>
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
  <div class="modal fade" id="modal-businesstype">
          <div class="modal-dialog modal-sm">
            <form role="form" method="post" id="form_businesstype" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary text-xs">
                    BUSINESS.
                  </div>
                </div>
                <h4 class="modal-title">Add New Business</h4>

              </div>
              <div class="modal-body">
                <div id="msgboxbusiness"></div>
                <input type="hidden" name="businesstype_id" id="businesstype_id" value="<?php echo $brgy_id;?>">
                <div class="form-group">
                    <label for="text">Sitio</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Business Name" required>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_addbusiness" name="btn_addbusiness" class="btn btn-primary">Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- this is the modal for Editing records of barangay information  -->
        <div class="modal fade" id="modal-editbusinesstype">
                  <div class="modal-dialog modal-sm">
                    <form role="form" method="post" id="form_editbusinesstype" enctype="multipart/form-data">

                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <div class="ribbon-wrapper">
                          <div class="ribbon bg-danger text-xs">
                             EDIT.
                          </div>
                        </div>
                        <h4 class="modal-title">Update Business Type</h4>

                      </div>
                      <div class="modal-body">
                        <div id="msgboxbusinesstypeedit"></div>
                        <div class="form-group">
                          <input type="hidden" id="businesstype_ids" name="businesstype_ids">
                            <label for="text">Business Type</label>
                            <input type="text" class="form-control" id="businesstype_name" name="businesstype_name" placeholder="Enter Business Name" required>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_editbusinesstype" name="btn_editbusinesstype" class="btn btn-danger">Update</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </form>
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

<script type="text/javascript">
	function editBusinesstype(id) {
		var result = $('#businesstype_'+id).data("results");
		console.log(result);
		$("#businesstype_ids").val(result.businesstype_id);
		$("#businesstype_name").val(result.businesstype_name);
		}
</script>
