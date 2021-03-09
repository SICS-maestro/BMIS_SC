<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Businesses Per Barangay</h1>
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
        <div class="card-header bg-olive">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              Business.
            </div>
          </div>
          <h3 class="card-title">List of Business Details &nbsp;
		  </h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">

		<?php if($usertype=="Administrator" || $usertype=="SuperAdmin"){?>
          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Barangay Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count</th>
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
                    <td><?php echo countDILGTblRes("businesspermit_tbl", "brgy_id_fk", $rs_brgyvals['brgy_id']);?></td>

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
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Count</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $crud -> sql("SELECT * FROM sitio_tbl WHERE brgy_id_fk='{$brgy_id}' ORDER BY sitio_id ASC");
                  $rs_sitioval = $crud -> getResult();

                  foreach($rs_sitioval as $rs_sitiovalRes){

                ?>

                <tr role="row" class="even">
                    <td><a href="?brgypage=listofbusinessdashboard&sitio_id=<?php echo $rs_sitiovalRes['sitio_id'];?>&brgy_id=<?php echo $rs_sitiovalRes['brgy_id_fk'];?>" data-toggle="tooltip" title="click to view business Details" class="text-dark"><?php echo $rs_sitiovalRes['sitio_name'];?><a></td>
                    <td><?php echo countDILGTblRes("businesspermit_tbl", "sitio_id_fk_bus", $rs_sitiovalRes['sitio_id']);?></td>

                </tr>
               <?php

             }

               ?>
            </tbody>
          <tfoot></tfoot>
        </table>
		<?php }?>
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
