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
						<span class="info-box-number"><?php echo countDILGTblResultKagawad("businesspermit_tbl", "brgy_id_fk", $brgy_id, "sitio_id_fk_bus" ,$sitio_id_user);?>
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
						<span class="info-box-number"><?php echo countDILGTblResultKagawad("resident_tbl", "brgy_id_fk_resident", $brgy_id , "sitio_id_fk_resident", $sitio_id_user);?></span>

						<a href="?brgypage=residencecount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

					</div>
				</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-olive">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total Number of Household</span>
					<span class="info-box-number"><?php echo countDILGTblResultKagawad("houseno_tbl", "brgy_id_fk_house", $brgy_id ,"sitio_id_fk_house" ,$sitio_id_user);?></span>
					<a href="?brgypage=householdcount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

				  </div>
				</div>
		  </div>


		  <div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-navy">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total Number of Voters</span>
					<span class="info-box-number"><?php echo countDILGTblResultKagawadthreeID("resident_tbl", "voter", "Yes", "brgy_id_fk_resident", $brgy_id, "sitio_id_fk_resident" ,$sitio_id_user);?></span>
					<a href="?brgypage=Votercount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

				  </div>
				</div>
		  </div>

		<div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-red">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total No. of Senior Citizen</span>
					<span class="info-box-number"><?php echo countDILGTblResCitizenPerBarangayKagawad("resident_tbl", "age", "60", "brgy_id_fk_resident", $brgy_id, "sitio_id_fk_resident" ,$sitio_id_user);?></span>
					<a href="?brgypage=SeniorCount" class="text-white">View Details &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>

				  </div>
				</div>
		  </div>
		   <div class="col-12 col-sm-6 col-md-4">
			  <div class="info-box mb-3 bg-teal">
				  <span class="info-box-icon"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
					<span class="info-box-text">Total Number of Indigent</span>
					<span class="info-box-number">
            <?php
                echo countNumberOfIndigentKagawad($sitio_id_user);
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
                <h3 class="card-title">Employeed and Unemployeed Residence</h3>

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
			<div class="col-md-6">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">Male and Female Residence</h3>

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
                <h3 class="card-title">Settled and Ongoing Blotter</h3>

                <!--<div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>-->

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


		<div class="row">
			<div class="col-md-12">
            <div class="card card-olive">
              <div class="card-header">
                <h3 class="card-title">EMPLOYED AND UNEMPLOYED</h3>

              </div>
              <div class="card-body">
                <div class="chart">
				<div id="EmpUn" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
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
					echo countClerancebyGraphKagawad($array[$count] = "0".$i,$brgy_id, $sitio_id_user).',';
					}else{
						 $res = $array[$count]=$i.'';
						echo countClerancebyGraphKagawad($res,$brgy_id, $sitio_id_user).',';
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
					echo countBlotterByGraphKagawad($array[$count] = "0".$i,$brgy_id, $sitio_id_user).',';
					}else{
						 $res = $array[$count]=$i.'';
						echo countBlotterByGraphKagawad($res,$brgy_id, $sitio_id_user).',';
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
					echo countBusinessByGraphKagawad($array[$count] = "0".$i,$brgy_id, $sitio_id_user).',';
					}else{
						 $res = $array[$count]=$i.'';
						echo countBusinessByGraphKagawad($res,$brgy_id, $sitio_id_user).',';
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
			{ y: <?php echo countResidentialPersitioKagawad($brgy_id, $sitio_id_user);?>, label: "Residential" },
			{ y: <?php echo countCommercialPersitioKagawad($brgy_id, $sitio_id_user);?>,  label: "Commercial" },

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
			{ y: <?php echo countDILGTblResults("blotter_tbl", "status", "ONGOING", "complainant_sitio_fk", $sitio_id_user);?>, label: "ONGOING" },
			{ y: <?php echo countDILGTblResults("blotter_tbl", "status", "SETTLED", "respondent_sitio_fk", $sitio_id_user);?>,  label: "SETTLED" },
			{ y: <?php echo countDILGTblRes("blotter_tbl", "complainant_sitio_fk", $sitio_id_user);?>,  label: "COMPLAINANT" },
			{ y: <?php echo countDILGTblRes("blotter_tbl", "respondent_sitio_fk", $sitio_id_user);?>,  label: "RESPONDENT" },


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
			{ y: <?php echo countDILGTblResultKagawadthreeID("resident_tbl", "gender", "1", "brgy_id_fk_resident", $brgy_id ,"sitio_id_fk_resident" ,$sitio_id_user);?>, label: "Male" },
			{ y: <?php echo countDILGTblResultKagawadthreeID("resident_tbl", "gender", "2", "brgy_id_fk_resident", $brgy_id ,"sitio_id_fk_resident" ,$sitio_id_user);?>,  label: "Female" },


		]
	}]
});

var Employeed = new CanvasJS.Chart("Employeed", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Employed and Unemployed"
	},
	axisY: {
		title: "Residence"
	},
	data: [{
		type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "Count of Employed and Unemployed",
		dataPoints: [
			{ y: <?php echo countEmployeedResidentPersitioKagawad($brgy_id, $sitio_id_user);?>, label: "Employed" },
			{ y: <?php echo countUnEmployeedResidentPersitioKagawad($brgy_id, $sitio_id_user);?>,  label: "Unemployed" },


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
			{ y: <?php echo countReligionPersitioKagawad($rsreval['religion_id'], $brgy_id, $sitio_id_user);?>, label: "<?php echo $rsreval['religion_name']; ?>" },

			<?php }?>
			{ y: <?php echo countReligionPersitioKagawad("0", $brgy_id, $sitio_id_user);?>, label: "Others" },

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
			{ y: <?PHP ECHO countDILGTblResultKagawadthreeID("resident_tbl", "civil_status", $id, "brgy_id_fk_resident", $brgy_id ,"sitio_id_fk_resident" ,$sitio_id_user);?>, label: "<?php echo $val; ?>" },

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
			{ label: "Age <?php echo $age;?>", y: <?php echo countAgeAdminPersitioKagawad($age, "1", $brgy_id, $sitio_id_user);?> },
			<?php }?>
			{ label: "Above 66", y: <?php echo countAgeAdminAbovePersitioKagawad("1", $brgy_id, $sitio_id_user);?> }
		]
	},
	{
		type: "spline",
		showInLegend: true,
		yValueFormatString: "##",
		name: "Female",
		dataPoints: [
			<?php for($age=0; $age<=66; $age++){?>
			{ label: "Age <?php echo $age;?>", y: <?php echo countAgeAdminPersitioKagawad($age, "2", $brgy_id, $sitio_id_user);?> },
			<?php }?>
			{ label: "Above 66", y: <?php echo countAgeAdminAbovePersitioKagawad("2", $brgy_id, $sitio_id_user);?> }
		]
	}]
});
AgeGender.render();




var EmpUn = new CanvasJS.Chart("EmpUn", {
	animationEnabled: true,
	title:{
		text: "Employed and Unemployed"
	},
	axisY: {
		title: "EMPLOYED",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "UNEMPLOYED",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Male",
		legendText: "Male",
		showInLegend: true,
		dataPoints:[
			{ label: "EMPLOYED", y: <?php echo countEmployeedResidentPersitioKagawadEmployed($brgy_id, "1", $sitio_id_user);?> },
			{ label: "UNEMPLOYED", y: <?php echo countUnEmployeedResidentPersitioKagawadUnemployed($brgy_id, "2", $sitio_id_user);?> }
		]

	},
	{
		type: "column",
		name: "Female",
		legendText: "Female",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "EMPLOYED", y: <?php echo countEmployeedResidentPersitioKagawadEmployed($brgy_id, "2", $sitio_id_user);?> },
			{ label: "UNEMPLOYED", y: <?php echo countUnEmployeedResidentPersitioKagawadUnemployed($brgy_id, "1", $sitio_id_user);?> }
		]
	}]
});
EmpUn.render();













function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	AgeGender.render();
	EmpUn.render();
}













}
</script>
