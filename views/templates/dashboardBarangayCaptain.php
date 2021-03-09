<div class="content-wrapper" style="min-height: 511px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-success">Dashboard /Barangay Information System</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
              <li class="breadcrumb-item active text-success">Dashboard v1.0</li>
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


		<div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-lightblue">
				  <span class="info-box-icon"><i class="fas fa-building"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Businesses</span>
						<span class="info-box-number"><?php echo countDILGTblRes("businesspermit_tbl", "brgy_id_fk", $brgy_id);?>
						</span>
						<a href="?brgypage=businesscount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
					</div>


				</div>

		  </div>

		  <div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-green">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Registered Residence</span>
						<span class="info-box-number"><?php echo countDILGTblRes("resident_tbl", "brgy_id_fk_resident", $brgy_id);?></span>
						<a href="?brgypage=residencecount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

					</div>
				</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-olive">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total Number of Household</span>
					<span class="info-box-number"><?php echo countDILGTblRes("houseno_tbl", "brgy_id_fk_house", $brgy_id);?></span>
					<a href="?brgypage=householdcount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

				  </div>
				</div>
		  </div>


		  <div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-navy">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total Number of Voters</span>
					<span class="info-box-number"><?php echo countDILGTblResults("resident_tbl", "voter", "Yes", "brgy_id_fk_resident", $brgy_id);?></span>
					<a href="?brgypage=Votercount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

				  </div>
				</div>
		  </div>

		<div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-red">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total No. of Senior Citizen</span>
					<span class="info-box-number"><?php echo countDILGTblResCitizenPerBarangay("resident_tbl", "age", "60", "brgy_id_fk_resident", $brgy_id);?></span>
					<a href="?brgypage=SeniorCount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

				  </div>
				</div>
		  </div>
		   <div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-teal">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total Number of </span>
					<span class="info-box-number">
            <?php
            echo countNumberOfIndigent($brgy_id);
            ?>

        </span>

          <a href="?brgypage=Indigentcount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

				 </div>
				</div>
		  </div>
		</div>

		<!-- BAR CHART -->
		<div class="row">
			<div class="col-md-6">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Residential and Commercial Building</h3>
				<!--<select class="" onchange="window.location.href='index.php&brgy_id='+this.value+''" name="brgy_id" id="brgy_id">
						  <option value="" selected disabled>--SELECT BARANGAY--</option>
						  <option value="0">ALL BARANGAY</option>
						  <?php
                        // $crud -> sql("SELECT * FROM brgy_tbl ORDER BY brgy_id ASC");
                        // $rs_brgy = $crud -> getResult();
                        // foreach ($rs_brgy as $rs_brgyval) {

						  // $s = '';
							// if($rs_brgyval['brgy_id']==$sitio_id_find){
								// $s = 'selected';
							// }

							// echo '<option value="'.$rs_brgyval['brgy_id'].'" '.$s.'>'.ucwords($rs_brgyval['brgy_name']).'</option>';
                          // }
                          ?>
			</select>-->

                <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
				<div id="Building" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			</div>

			<div class="col-md-6">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Settled and Ongoing Blotter</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
				<div id="Blotter" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			</div>

		</div>

		<div class="row">
			<div class="col-md-6">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Male and Female Residence</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
				<div id="Residence" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			</div>


			<div class="col-md-6">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Employeed and Unemployeed Residence</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
				<div id="Employeed" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			</div>

		</div>




		<div class="row">
			<div class="col-md-12">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Total Number of Religious Group</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
				<div id="religious" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Total Number of Religious Group</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
				<div id="AgeGender" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Total Number of Civil Status</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
				<div id="CivilStatus" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			</div>

		</div>


		<div class="row">

		 <!-- BAR CHART -->
		 <div class="col-md-12">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Barangay Issuances / Blotter Cases / Business Opened</h3>

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
<script src="../assets/AdminLTE/plugins/canvas/canvasjs.min.js"></script>

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


<script>
window.onload = function () {

var Building = new CanvasJS.Chart("Building", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Residential and Commercial"
	},
	axisY: {
		title: "Building"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Count of Residential and Commercial",
		dataPoints: [
			{ y: <?php echo countResidentialPersitio($brgy_id);?>, label: "Residential" },
			{ y: <?php echo countCommercialPersitio($brgy_id);?>,  label: "Commercial" },

		]
	}]
});
//settled blotter and ongoing
var Blotter = new CanvasJS.Chart("Blotter", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "SETTLED AND ONGOING BLOTTER"
	},
	axisY: {
		title: "blotter"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Count of Settled and Ongoing",
		dataPoints: [
			{ y: <?php echo countDILGTblResults("blotter_tbl", "status", "ONGOING", "brgy_id_fk", $brgy_id);?>, label: "ONGOING" },
			{ y: <?php echo countDILGTblResults("blotter_tbl", "status", "SETTLED", "brgy_id_fk", $brgy_id);?>,  label: "SETTLED" },


		]
	}]
});
var Residence = new CanvasJS.Chart("Residence", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Male and Female"
	},
	axisY: {
		title: "Residence"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Count of Male and Female",
		dataPoints: [
			{ y: <?php echo countDILGTblResults("resident_tbl", "gender", "1", "brgy_id_fk_resident", $brgy_id);?>, label: "Male" },
			{ y: <?php echo countDILGTblResults("resident_tbl", "gender", "2", "brgy_id_fk_resident", $brgy_id);?>,  label: "Female" },


		]
	}]
});

var Employeed = new CanvasJS.Chart("Employeed", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Employeed and Unemployeed"
	},
	axisY: {
		title: "Residence"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Count of Employeed and Unemployeed",
		dataPoints: [
			{ y: <?php echo countEmployeedResidentPersitio($brgy_id);?>, label: "Employeed" },
			{ y: <?php echo countUnEmployeedResidentPersitio($brgy_id);?>,  label: "Unemployeed" },


		]
	}]
});

var religious = new CanvasJS.Chart("religious", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Total Religious Group"
	},
	axisY: {
		title: "Religious"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Count of Religious Group",
		dataPoints: [
			<?php
				$crud -> sql("SELECT * FROM religion_tbl ORDER BY religion_id ASC");
				$rsre = $crud->getResult();
				foreach($rsre as $rsreval){
			?>
			{ y: <?php echo countReligionPersitio($rsreval['religion_id'], $brgy_id);?>, label: "<?php echo $rsreval['religion_name']; ?>" },

			<?php }?>

			{ y: <?php echo countReligionPersitio("0", $brgy_id);?>, label: "Others" },


		]
	}]
});

var CivilStatus = new CanvasJS.Chart("CivilStatus", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Total Number of Civil Status"
	},
	axisY: {
		title: "CivilStatus"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Count of Civil Status",
		dataPoints: [
			<?php
				foreach(civilstatus() as $id => $val){
			?>
			{ y: <?PHP ECHO countDILGTblResults("resident_tbl", "civil_status", $id, "brgy_id_fk_resident", $brgy_id);?>, label: "<?php echo $val;?>" },
			<?php
			}
			?>
		]
	}]
});

CivilStatus.render();
religious.render();
Employeed.render();
Residence.render();
Building.render();
Blotter.render();

var AgeGender = new CanvasJS.Chart("AgeGender", {
	theme:"light2",
	animationEnabled: true,
	title:{
		text: "Number of Male and Female By Age and Gender"
	},
	axisY :{
		includeZero: false,
		title: "Number of Male and Female By Age",
		suffix: "Count"
	},
	toolTip: {
		shared: "true"
	},
	legend:{
		cursor:"pointer",
		itemclick : toggleDataSeries
	},
	data: [{
		type: "spline",
		visible: true,
		showInLegend: true,
		yValueFormatString: "##",
		name: "Male",
		dataPoints: [
			<?php for($age=0; $age<=66; $age++){?>
			{ label: "Age <?php echo $age;?>", y: <?php echo countAgeAdminPersitio($age, "1", $brgy_id);?> },
			<?php }?>
			{ label: "Above 66", y: <?php echo countAgeAdminAbovePersitio("1", $brgy_id);?> }
		]
	},
	{
		type: "spline",
		showInLegend: true,
		yValueFormatString: "##",
		name: "Female",
		dataPoints: [
			<?php for($age=0; $age<=66; $age++){?>
			{ label: "Age <?php echo $age;?>", y: <?php echo countAgeAdminPersitio($age, "2", $brgy_id);?> },
			<?php }?>
			{ label: "Above 66", y: <?php echo countAgeAdminAbovePersitio("2", $brgy_id);?> }
		]
	}]
});
AgeGender.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	AgeGender.render();
}

}
</script>
