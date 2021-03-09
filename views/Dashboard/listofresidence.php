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
            <h1>List of Residence Details in Barangay <?php echo '<u>'.getTblResValDashboard("brgy_name", "brgy_tbl", "brgy_id", $brgy_id)." Sitio".' '.getTblResValDashboard("sitio_name", "sitio_tbl", "sitio_id", $sitio_id).'</u>';?></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Household</a></li>
              <li class="breadcrumb-item active">Household List</li>
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
              Residence.
            </div>
          </div>
          <h3 class="card-title">List of Residence Details &nbsp;</h3>
        <a href="Dashboard/Sub_Report/listofresidence.print.php?sitio_id=<?php echo $sitio_id?>&brgy_id=<?php echo $brgy_id;?>&usertypereport=<?php echo $usertype;?>" class="btn btn-dark" data-toggle="tooltip" title="Print Data" target="_blank"><span class="fa fa-print" ></span></a>

        </div>
        <div class="card-body table-responsive" style="display: block;">


		<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No.</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Barangay Name</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sitio Name </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Residence Name </th>
    	         </tr>
              </thead>
              <tbody>
                <?php
                $c = 1;
                  $crud -> sql("SELECT * FROM resident_tbl WHERE sitio_id_fk_resident='{$sitio_id}' ORDER BY resident_id ASC");
                  $rs_sitiovallist = $crud -> getResult();

                  foreach($rs_sitiovallist as $rs_sitiovallistval){

                ?>

                <tr role="row" class="even">
                  <td><?php echo $c;?></td>
                  <td><?php echo getTblResValDashboard("brgy_name", "brgy_tbl", "brgy_id", $brgy_id);?></td>
                  <td><?php echo getTblResValDashboard("sitio_name", "sitio_tbl", "sitio_id", $sitio_id);?></td>
                  <td><?php echo $rs_sitiovallistval['fname'].' '.$rs_sitiovallistval['mname'].' '.$rs_sitiovallistval['lname'];?></td>

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
