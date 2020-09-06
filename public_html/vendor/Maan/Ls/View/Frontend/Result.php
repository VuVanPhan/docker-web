<?php
	$data = $this->getParams("data");
	$totals = $data->total;
	$totals = json_encode($totals);
	// echo "<pre>";
	// var_dump($data);
	// die('fff');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kết quả lãi suất kép</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo JS_URL."chart/chart.min.css" ?>" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo SKIN_URL.'css/frontend/styles.css'; ?>" crossorigin="anonymous">
	<script type="text/javascript" src="<?php echo JS_URL.'jquery-3.5.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo JS_URL.'chart/chart.min.js'?>"></script>
</head>
<body>
	<div id="wrap-container" class="wrap-container text-center">
		<div class="container" style="width:1200px; height: 600px;">
			<div class="chart">
				<h1>Đồ thị lãi suất</h1>
				<canvas class="text-center row" id="myChart"></canvas>
			</div>
			<div><a href="<?php echo HOME_URL; ?>">Trang chủ</a></div>
		</div>
		<script type="text/javascript">
			var label = "<?php echo $data->label; ?>";
			var sonam = [];
			var sotien = [];
			var sotiens = <?php echo $totals; ?>;
			for (var i in sotiens) {
				sonam.push(i);
				sotien.push(sotiens[i]);
			}
			console.log(sonam);
			console.log(sotien);
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'line',
			    data: {
			        labels: sonam,
			        datasets: [{
			            label: label,
			            data: sotien,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 2
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
	</div>
</body>
</html>
