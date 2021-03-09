<?php
$select = (isset($_POST['search_key'])) ? (string) $_POST['search_key'] : "";
$search = (isset($_POST['search'])) ? (string) $_POST['search'] : "";

?>

<div class="content-wrapper" style="min-height: 1589.56px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>YOU SEARCH FOR THE KEYWORD <u><?php echo $select;?></u></h1>
			<h1>YOU TYPE <u><?php echo $search;?></u></h1>
          </div>
          <div class="col-sm-6">

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
            <div class="ribbon bg-success text-lg">
              Search.
            </div>
          </div>
          <h3 class="card-title">Here is the list of data you search</h3>
		</div>
        <div class="card-body table-responsive" style="display: block;">


          <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">House Number</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Resident Names</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Gender</th>

				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Birth Date</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Civil Status</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Religion</th>

				<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>

              </tr>
              </thead>
              <tbody>
                <?php
                  $c = 1;


				  if($select=="FULLNAME"){
					$crud -> sql("SELECT * FROM resident_tbl WHERE brgy_id_fk_resident='{$brgy_id}' && fname LIKE '%{$search}%' ORDER BY dateregistered ASC");
				  }elseif($select=="AGE"){
					$crud -> sql("SELECT * FROM resident_tbl WHERE brgy_id_fk_resident='{$brgy_id}' && age LIKE '%{$search}%' ORDER BY dateregistered ASC");
				  }
					$rs_issued = $crud -> getResult();

                  foreach($rs_issued as $rs_issuedval){


					      $house_id = gethouse_id($rs_issuedval['house_no_fk']);
	              $id = getTblResVal("brgy_id_fk_house", "houseno_tbl", "house_id", "'{$rs_issuedval['house_no_fk']}'");
      					$ids = getTblResVal("sitio_id_fk_house", "houseno_tbl", "house_id", "'{$rs_issuedval['house_no_fk']}'");

      					$houseno = gethousenumber($rs_issuedval['house_no_fk']);
					           //$brgy_name_issued = getbrgyname($id);
      					$sitioname_Issued = getsitioname($ids);
      					$or = getOrNumber($rs_issuedval['brgy_id_fk_resident']);
      					$cedula = getCedulaId($rs_issuedval['brgy_id_fk_resident']);

                ?>

                <tr role="row" class="even">
                    <td class="sorting_1"><?php echo $c;?></td>
                    <td><?php echo $houseno.' '.$sitioname_Issued;?></td>
                    <td><?php echo $rs_issuedval['fname'].' '.$rs_issuedval['mname'].' '.$rs_issuedval['lname'];?></td>
          					<td><?php echo getidentityofAll($rs_issuedval['gender']);?></td>
          					<td><?php echo date('F d Y', strtotime($rs_issuedval['bday']));?></td>
          					<td><?php echo getCivilStatus($rs_issuedval['civil_status']);?></td>
          					<td><?php
          						if($rs_issuedval['religion']=="0"){
          							echo $rs_issuedval['religion_specify'];
          						}else{
          							echo getReligionName($rs_issuedval['religion']);
          						}
          						?></td>
          					<td><a href="?brgypage=viewDetailsImage&resident_id=<?php echo $rs_issuedval['resident_id'];?>&house_id=<?php echo $rs_issuedval['house_no_fk'];?>" data-toggle="tooltip" title="View Details" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>&nbsp;View Profile</a></td>
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
