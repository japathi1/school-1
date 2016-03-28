<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
            	<div class="box-header with-border">
                    <div class="col-xs-12">
						<div class="col-xs-4">
							<div class="info-box">
							  <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>
							  <div class="info-box-content">
							    <span class="info-box-text">Total Students</span>
							    <span class="info-box-number"><?php echo sizeof($all_students); ?></span>
							  </div><!-- /.info-box-content -->
							</div><!-- /.info-box -->		
						</div>
						<div class="col-xs-4">
							<div class="info-box">
							  <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
							  <div class="info-box-content">
							    <span class="info-box-text">Paid Students</span>
							    <span class="info-box-number"><?php echo sizeof($p_students); ?></span>
							  </div><!-- /.info-box-content -->
							</div><!-- /.info-box -->		
						</div>
						<div class="col-xs-4">
							<div class="info-box">
							  <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
							  <div class="info-box-content">
							    <span class="info-box-text">Not Paid Students</span>
							    <span class="info-box-number"><?php echo sizeof($np_students); ?></span>
							  </div><!-- /.info-box-content -->
							</div><!-- /.info-box -->		
						</div>
					</div>
                </div>
                <div class="box-body">
                    <div class="col-xs-12">
                    	<h5>Graphical Representation of Fee</h5>
						<canvas id="fee_graph"></canvas>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
  $baseUrl = Yii::app()->theme->baseUrl; 
?>
<script src="<?php echo $baseUrl;?>/plugins/chartjs/Chart.min.js"></script>
<script type="text/javascript">
	var pieChartCanvas = $("#fee_graph").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data; ?>;
  var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
    //String - A tooltip template
    tooltipTemplate: "<%=label%> Fee Total Rs.<%=value %>"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
</script>