<div class="content-wrapper" style="min-height: 511px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-success">Dashboard /Barangay Information System</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right bg-success">
              <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
              <li class="breadcrumb-item active text-white">Dashboard v1.0</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
		
		
		<div class="col-12 col-sm-6 col-md-3">
			  <div class="info-box mb-3 bg-lightblue">
				  <span class="info-box-icon"><i class="fas fa-building"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Businesses</span>
					<?php if($usertype=="Administrator"){?>
					<span class="info-box-number"><?php echo countDILGPops("businesspermit_tbl");?></span>
					<?php }else{?>
					<span class="info-box-number"><?php echo dashboardCountBusiness($brgy_id);?></span>
					<?php }?>
				 </div>
				</div>
		  </div>
		  
		  <div class="col-12 col-sm-6 col-md-3">
			  <div class="info-box mb-3 bg-green">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Registered Residence</span>
					<span class="info-box-number"><?php echo dashboardCountResident($brgy_id);?></span>
				</div>
				</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-3">
			  <div class="info-box mb-3 bg-olive">
				  <span class="info-box-icon"><i class="fas fa-file"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Settled Blotter</span>
					<span class="info-box-number"><?php echo dashboardCountSettledBlotter($brgy_id);?></span>
				  </div>
				</div>
		  </div>
		 
		  <div class="col-12 col-sm-6 col-md-3">
			  <div class="info-box mb-3 bg-red">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Ongoing Blotter</span>
					<span class="info-box-number"><?php echo dashboardCountOngoingBlotter($brgy_id);?></span>
				  </div>
				</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-6">
			<div class="card card-lightblue">
              <div class="card-header">
                <h3 class="card-title">List of Barangay Officials</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                
				
				<table style="border:1px solid white;" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              
				<thead>
					<tr class="bg-indigo">
						<th>POSITION</th>
						<th>OFFICIAL NAME</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$crud -> sql("SELECT * FROM users_tbl WHERE brgy_id_fk='{$brgy_id}'");
				$rs = $crud -> getResult();
				foreach($rs as $rsval){
					
				
				?>
					<tr>
						<td><b><?php echo $rsval['usertype'];?></b></td>
						<td><?php echo strtoupper($rsval['fullname']);?></td>
					</tr>
				<?php }?>
				</tbody>
			  </table>
				
				
				
				
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		</div>

		<div class="col-12 col-sm-6 col-md-3">
			  <div class="info-box mb-3 bg-warning">
				  <span class="info-box-icon"><i class="fas fa-users" style="color:white;"></i></span>
					<div class="info-box-content">
					<span class="info-box-text" style="color:white;">Businesses in Barangay</span>
					<span class="info-box-number" style="color:white;"><?php echo dashboardCountBusinesses($brgy_id);?></span>
				  </div>
				</div>
		  </div>
		  
		  <div class="col-12 col-sm-6 col-md-3">
			  <div class="info-box mb-3 bg-purple">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text" >Issued Clearance</span>
					<span class="info-box-number"><?php echo dashboardCountClearance($brgy_id);?></span>
				  </div>
				</div>
		  </div>
		  
        </div>
       
		
		<div class="row">
		
		 <!-- BAR CHART -->
		 <div class="col-md-12">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		</div>
		
	
	</div>
	</div>
	</div>
  </section>
  
  <!-- jQuery -->
<script src="../assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
 <!-- ChartJS -->
<script src="../assets/AdminLTE/plugins/chart.js/Chart.js"></script>

  <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
	// Get context with jQuery - using jQuery's .get() method.
	var areaChartCanvas = $('#barChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
	 
	 datasets: [
        {
          label               : 'Issued Barangay Clearance',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php 
				$count = 0;
				$array = [];
				for($i=1;$i<=12;$i++)
				{
					if($i<=9){
					 $res = $array[$count] = "0".$i.',';
					echo countClerancebyGraph($array[$count] = "0".$i,$brgy_id).',';
					}else{
						 $res = $array[$count]=$i.'';
						echo countClerancebyGraph($res,$brgy_id).',';
					}
					$count++;
				}
		  
		  ?>],
        },
		  {
          label               : 'Blotter Cases',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php 
			$count = 0;
				$array = [];
				for($i=1;$i<=12;$i++)
				{
					if($i<=9){
					 $res = $array[$count] = "0".$i.',';
					echo countBlotterByGraph($array[$count] = "0".$i,$brgy_id).',';
					}else{
						 $res = $array[$count]=$i.'';
						echo countBlotterByGraph($res,$brgy_id).',';
					}
					$count++;
				}
		  ?>]
        },
		{
          label               : 'Business Opened',
          backgroundColor     : 'rgba(260, 200, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php 
			$count = 0;
				$array = [];
				for($i=1;$i<=12;$i++)
				{
					if($i<=9){
					 $res = $array[$count] = "0".$i.',';
					echo countBusinessByGraph($array[$count] = "0".$i,$brgy_id).',';
					}else{
						 $res = $array[$count]=$i.'';
						echo countBusinessByGraph($res,$brgy_id).',';
					}
					$count++;
				}
		  ?>]
        },
		
      ]
    }


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
	var temp2 = areaChartData.datasets[2]
    
    barChartData.datasets[0] = temp0
	barChartData.datasets[1] = temp1
	barChartData.datasets[2] = temp2
	

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    

    
  })
</script>
