<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SCHEDULE OF BLOTTER</h1>
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
        <div class="card-header bg-lightblue color-palette">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-lightblue text-lg">
              Sched.
            </div>
          </div>
          <h3 class="card-title"><i class="far fa-calendar"></i>LIST OF SCHEDULE <a href="?brgypage=upcommingmonitoringschedule" class="btn btn-secondary"><i class="far fa-calendar"></i>&nbsp;Upcoming Schedule</a></h3>
        </div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Blotter ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Compalainant Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Respondent Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Schedule</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;
				  $now = date('m/d/Y');
				  $crud -> sql("SELECT * FROM blotter_tbl WHERE brgy_id_fk='{$brgy_id}' AND schedule_date<='{$now}' AND status='ONGOING' && schedule_date!=''");
                  $rs_sched = $crud -> getResult();

                  foreach($rs_sched as $rs_schedval){
					
					// $id = getTblResVal("brgy_id_fk_house", "houseno_tbl", "house_id", $rs_issuedval['house_no_fk']);
					// $ids = getTblResVal("sitio_id_fk_house", "houseno_tbl", "house_id", $rs_issuedval['house_no_fk']);
					
					// $houseno = gethousenumber($rs_issuedval['house_no_fk']);
					// $brgy_name_issued = getbrgyname($id);
					// $sitioname_Issued = getbrgyname($ids);
					// $or = getOrNumber($rs_issuedval['brgy_id_fk_resident']);
					// $cedula = getCedulaId($rs_issuedval['brgy_id_fk_resident']);
					
                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $rs_schedval['blotter_id'];?></td>
                    <td><?php echo getResidentFullName($rs_schedval['resident_id_fk']);?></td>
					<td><?php echo getResidentFullName($rs_schedval['respondent_id_fk']);?></td>
					<td><?php echo $rs_schedval['status'];?></td>
                    <td><?php echo date('F d Y', strtotime($rs_schedval['schedule_date']))." /".$rs_schedval['timeofSched'];?></td>
               
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


