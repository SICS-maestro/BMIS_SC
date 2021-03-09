<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>HISTORY LIST OF PREVIEWS BARANGAY OFFICIAL DESIGNATION</h1>
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
        <div class="card-header bg-olive">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-lime text-lg">
              Officials.
            </div>
          </div>
          <h3 class="card-title">List of Barangay Officials Details &nbsp;
		  </h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">
		<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Barangay Official Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Barangay Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sitio Name</th>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Position</th>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date Removed Designation</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
                  $crud -> sql("SELECT * FROM historybrgyofficial_tbl WHERE history_brgy_id_fk='{$brgy_id}'");
                  $rs_offhis = $crud -> getResult();

                  foreach($rs_offhis as $rs_offhisval){

                ?>
				<tr>
				<td><?php echo $rs_offhisval['history_name'];?></td>
				<td><?php echo getbrgyname($rs_offhisval['history_brgy_id_fk']);?></td>
				<td><?php echo sitio_namesitio_name($rs_offhisval['history_sitio_id_fk']);?></td>
				<td><?php echo $rs_offhisval['history_usetype'];?></td>
				<td><?php echo date('F d Y',strtotime($rs_offhisval['date_created']));?></td>
				
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
          <div class="col-lg-3 col-md-3 col-sm-3">
			</div>
        </div>
		
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
