
  <div class="content-wrapper" style="min-height: 1589.56px;">
   <BR>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-success">
          <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-success text-lg">
              <i class="fas fa-user-friends"></i>
              PROFILE
            </div>
          </div>
        <h3 class="card-title">USER PROFILE INFORMATION</h3>
       
        </div>
		
		
		
		
		
        <div class="card-body table-responsive" style="display: block;">
	
	
		<div class="table-responsive">
              <div class="col-md-5">
              <table  class="table table-responsive table-stripped">
                <thead>
                  <th>Full Name:</th>
                  <th><u style="color:blue;"><?php echo $_SESSION['fullname'];?></u>
                    <a href="" data-toggle="modal" data-target="#modalprofile"><i class="fa fa-edit" style="color:yellowgreen;"></i></a>
                  </th>

                </thead>
                  <tbody>
                  <tr>
                    <th>User Name:</th>
                    <td><?php echo $_SESSION['username'];?></td>
                  </tr>
                  <tr>
                    <th>Password:</th>
					
					
					
					<td><?php echo md5($_SESSION['password']);?></td>
                  </tr>
                  <tr>
                    <th>User Type:</th>
                    <td style="color:green;"><?php echo $_SESSION['usertype']?></td>
                   
                  </tr>

                  </tbody>
              </table>
            </div>


            </div>
	</div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
          USER PROFILE
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  
   <div class="modal fade" id="modalprofile">
                  <div class="modal-dialog modal-sm">
                    <form role="form" method="post" id="form_editprofile" enctype="multipart/form-data">

                    <div class="modal-content">
                      <div class="modal-header bg-success">
                        <div class="ribbon-wrapper">
                          <div class="ribbon bg-success text-xs">
                            Profile.
                          </div>
                        </div>
                        <h4 class="modal-title">Update Profile</h4>

                      </div>
                      <div class="modal-body">
                        <div id="msgboxprofile"></div>
                        <div class="form-group">
						<input type="text" name="id" id="id" value="<?php echo $_SESSION['user_id']; ?>">
			
							
									<label>USERNAME:</label>
									
										<input type="text"  name="uname" id="uname" class="form-control" value="<?php echo $_SESSION['username']; ?>">
									
								
									<label>FULLNAME:</label>
									
										<input type="text" class="form-control"  id="fname" name="fname" value="<?php echo $_SESSION['fullname']; ?>">
									
								
									<label>PASSWORD:</label>
									<input type="text" readonly class="form-control" value="<?php echo $_SESSION['password']; ?>">
									
									<label>NEW PASSWORD:</label>
									<input type="text" class="form-control"  id="pword" name="pword">
									
						</div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_editprofile" name="btn_editprofile" class="btn btn-success">Update</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </form>
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
  