<?php include 'includes/session.php'; ?>
<?php 
  include 'formatMoney.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php
    $sql = "SELECT city_id, count(*) AS no_of_sales FROM orders GROUP BY city_id";
    $oquery = $conn->query($sql);
    $pie_data = array();

    While($row = $oquery->fetch_array()){
      $citid = $row['city_id'];
      $csql = "SELECT * FROM city WHERE city_id = '$citid' ";
      $cquery = $conn->query($csql);
      $cdrow = $cquery->fetch_array();
      $pie_data[] = array(
        'label' => $cdrow['city_name'],
        'value' => $row['no_of_sales']
      );
    }
    $pie_data = json_encode($pie_data);    

?>
<?php
    $sql = "SELECT *, SUM(profit) AS rev FROM orders  
             GROUP BY user_id ORDER BY user_id ASC ";
    $oquery = $conn->query($sql);
    $line_data = array();

    While($row = $oquery->fetch_array()){
      //$line_data .= "{y: '".$row['user_id']."', netsales: '".$row['rev']."', labels: '".$row['rev']."' }, ";
      $line_data[] = array(
        'user' => $row['user_id'],
        'netsales' => $row['rev'],
        'label' => $row['rev'],
        'l' => $row['user_id']
      );
    }
    $line_data = json_encode($line_data);  

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Report by Graph and Chart</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
				<div class="col-md-8">
				<p class="text-center">
                    <strong>Sales By Month</strong>
                  </p>
				  <div class="chart">
					<br>
					<div id="legend" class="text-center"></div>
					<canvas id="barChart" style="height:350px"></canvas>
				  </div>
				</div>
				<div class="col-md-4">
				<p class="text-center">
                    <strong>Sales By City</strong>
                  </p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
					<div class="box-body chart-responsive">
						<div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
					</div>
				</div>
            </div>
			<div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header">
					<?php
						$sql = "SELECT * FROM orders";
						$query = $conn->query($sql);

						echo $query->num_rows;
					  ?>
					</h5>
                    <span class="description-text">TOTAL NO SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header">
						<?php
							$sql = "SELECT SUM(total) AS revenue FROM orders";
							$query = $conn->query($sql);
							$row = $query->fetch_assoc(); 
							$sum = $row['revenue'];

							echo "$".formatMoney($sum, true);
						  ?>
					</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header">
						<?php
							$sql = "SELECT SUM(profit) AS profit FROM orders";
							$query = $conn->query($sql);
							$row = $query->fetch_assoc(); 
							$pro = $row['profit'];

							echo "$".formatMoney($pro, true);
						  ?>
					</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header">
						<?php
							$sql = "SELECT * FROM products";
							$query = $conn->query($sql);

							echo $query->num_rows;
						  ?>
					</h5>
                    <span class="description-text">NO OF PRODUCT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
  $and = 'AND YEAR(order_date) = '.$year;
  $months = array();
  $sales = array();
  $profit = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT SUM(total) AS revenue FROM orders WHERE MONTH(order_date) = '$m' $and";
    $oquery = $conn->query($sql);
    $rs = $oquery->fetch_assoc();
    array_push($sales, $rs['revenue']);

    $sql = "SELECT SUM(profit) AS profit FROM orders WHERE MONTH(order_date) = '$m' $and";
    $lquery = $conn->query($sql);
    $rr = $lquery->fetch_assoc();
    array_push($profit, $rr['profit']);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $profit = json_encode($profit);
  $sales = json_encode($sales);

?>
<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Sales',
        fillColor           : '#c0392b',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#c0392b',
        data                : <?php echo $sales; ?>
      },
      {
        label               : 'Profit',
        fillColor           : '#2c3e50',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#2c3e50',
        data                : <?php echo $profit; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
<script>
//DONUT CHART
var donut = Morris.Donut({
      element: 'sales-chart',
      resize: true,
      //colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: <?php echo $pie_data; ?>,
      hideHover: 'auto'
});
var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: <?php echo $line_data; ?>,
      xkey: 'user',
      ykeys: ['netsales'],
      labels: ['label l'],
      lineColors: ['#00b894'],
      hideHover: 'auto'
    });
</script>
</body>
</html>