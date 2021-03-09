<?php
 $sitio_id = (isset($_GET['sitio_id'])) ? (string) $_GET['sitio_id'] : "";
 $brgy_id = (isset($_GET['brgy_id'])) ? (string) $_GET['brgy_id'] : "";

?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Business Details in Barangay <?php echo '<u>'.getTblResValDashboard("brgy_name", "brgy_tbl", "brgy_id", $brgy_id)." Sitio".' '.getTblResValDashboard("sitio_name", "sitio_tbl", "sitio_id", $sitio_id).'</u>';?></h1>

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
          <h3 class="card-title">List of Business Details &nbsp;</h3>
        <a href="Dashboard/Sub_Report/listofresidence.print.php?sitio_id=<?php echo $sitio_id?>&brgy_id=<?php echo $brgy_id;?>&usertypereport=<?php echo $usertype;?>" class="btn btn-dark" data-toggle="tooltip" title="Print Data" target="_blank"><span class="fa fa-print" ></span></a>

        </div>
        <div class="card-body table-responsive" style="display: block;">


		<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Brgy & Sitio</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name of Business</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Owner </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date Registered</th>
    	         </tr>
              </thead>
              <tbody>
                <?php
                $c = 1;
                  $crud -> sql("SELECT * FROM businesspermit_tbl WHERE sitio_id_fk_bus='{$sitio_id}' ORDER BY business_id ASC");
                  $rs_sitiovalbus = $crud -> getResult();

                  foreach($rs_sitiovalbus as $rs_sitiovalbusval){

                ?>

                <tr role="row" class="even">
                  <td><?php echo getTblResValDashboard("brgy_name", "brgy_tbl", "brgy_id", $brgy_id).' / '.getTblResValDashboard("sitio_name", "sitio_tbl", "sitio_id", $sitio_id);?></td>
                  <td><?php echo $rs_sitiovalbusval['trade_activity'];?></td>
                  <td><?php echo ucwords($rs_sitiovalbusval['operator_manager']);?></td>
                  <td><?php echo date('F d Y', strtotime($rs_sitiovalbusval['date_apply']));?></td>
                  <!-- <td><?php echo getTblResValDashboard("fname", "resident_tbl", "resident_id", $rs_sitiovalbusval['resident_id_fk']).'  '.getTblResValDashboard("mname", "resident_tbl", "resident_id", $rs_sitiovalbusval['resident_id_fk']).'  '.getTblResValDashboard("lname", "resident_tbl", "resident_id", $rs_sitiovalbusval['resident_id_fk']);?></td> -->


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
