<?php require_once("include/top.php"); ?>
	<div style="color:white;">
		<div class="row">
			<div class="col">
				Users <i class="fas fa-user"></i>
				<div style="margin-top: 10%;">
					Admins : 
					<?php 
						$sql = "SELECT COUNT(userId) FROM user WHERE type = 0;";
						echo (($conn->query($sql))->fetch_array())[0];
					 ?>
					 <br>
					 Reguler Users :
					 <?php 
						$sql = "SELECT COUNT(userId) FROM user WHERE type = 1;";
						echo (($conn->query($sql))->fetch_array())[0];
					 ?>
				</div>
			</div>
			<div class="col">
				Suppliers :
				<?php 
					$sql = "SELECT COUNT(supplierId) FROM supplier;";
					echo (($conn->query($sql))->fetch_array())[0];
				 ?>
			</div>
			<div class="col">
				Categories :
				<?php 
					$sql = "SELECT COUNT(categoryId) FROM category;";
					echo (($conn->query($sql))->fetch_array())[0];
				 ?>
			</div>
			<div id="piechart"></div>
		</div>
	</div>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script type="text/javascript">
	// Load google charts
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	// Draw the chart and set the chart values
	function drawChart() {
	  var data = google.visualization.arrayToDataTable([
	  ['Item', 'Quantity'],
	  <?php 
	  	$sql = "SELECT itemName, quantity FROM item;";
	  	$query = $conn->query($sql);
	  	$data = '';
	  	while ($result = $query->fetch_assoc()) {
	  		$data .= "['" . $result['itemName'] . "', " . $result['quantity'] . "],";
	  	}
	  	echo $data = rtrim($data,',')
	   ?>
	]);

	  // Optional; add a title and set the width and height of the chart
	  var options = {'title':'Inventory', 'width':550, 'height':400};

	  // Display the chart inside the <div> element with id="piechart"
	  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	  chart.draw(data, options);
	}
	</script>

<?php require_once("include/bottom.php"); ?>