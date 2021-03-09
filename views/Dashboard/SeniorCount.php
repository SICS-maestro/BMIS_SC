<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Senior Per Barangay</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Senior</a></li>
              <li class="breadcrumb-item active">Senior List</li>
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
              Senior.
            </div>
          </div>
          <h3 class="card-title">List of Senior Details &nbsp;
		  </h3>
      <a href="Dashboard/Sub_Report/listofsenior.print.php?brgy_id=<?php echo $brgy_id;?>&usertypereport=<?php echo $usertype;?>" class="btn btn-dark" data-toggle="tooltip" title="Print Data" target="_blank"><span class="fa fa-print" ></span></a>

        </div>
        <div class="card-body table-responsive" style="display: block;">

		<?php if($usertype=="Administrator" || $usertype=="SuperAdmin"){?>

          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Barangay Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count Male</th>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count Female</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $crud -> sql("SELECT * FROM brgy_tbl ORDER BY brgy_id ASC");
                  $rs_brgyval = $crud -> getResult();

                  foreach($rs_brgyval as $rs_brgyvals){

                ?>

                <tr role="row" class="even">
                    <td><?php echo $rs_brgyvals['brgy_name'];?></td>
                    <td><?php echo countDILGTblResultsSenior("resident_tbl", "brgy_id_fk_resident", $rs_brgyvals['brgy_id'], "gender", "1", "age", "60");?></td>
					<td><?php echo countDILGTblResultsSenior("resident_tbl", "brgy_id_fk_resident", $rs_brgyvals['brgy_id'], "gender", "2", "age", "60");?></td>

                </tr>
               <?php

             }

               ?>
            </tbody>
          <tfoot></tfoot>
        </table>

		<?php }elseif($usertype=="BarangayCaptain" || $usertype=="Secretary" || $usertype=="Kagawad"){?>
		<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sitio Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count Male</th>
				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count Female</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $crud -> sql("SELECT * FROM sitio_tbl WHERE brgy_id_fk='{$brgy_id}' ORDER BY sitio_id ASC");
                  $rs_sitioval = $crud -> getResult();

                  foreach($rs_sitioval as $rs_sitiovalRes){

                ?>

                <tr role="row" class="even">
                    <td><?php echo $rs_sitiovalRes['sitio_name'];?></td>
                    <td><?php echo countDILGTblResultsSenior("resident_tbl", "sitio_id_fk_resident", $rs_sitiovalRes['sitio_id'], "gender", "1", "age", "60");?></td>
					<td><?php echo countDILGTblResultsSenior("resident_tbl", "sitio_id_fk_resident", $rs_sitiovalRes['sitio_id'], "gender", "2", "age", "60");?></td>

                </tr>
               <?php

             }

               ?>
            </tbody>
          <tfoot></tfoot>
        </table>

		<?php  }?>
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
