<?php require_once("include/top.php"); ?>
	<button class="print" id="print" onclick="window.print();"><i class="fas fa-print" title="Print the report"></i></button>
	<div class="printReport"> 
		<h2 style="text-align: center;color: #000;">YoYo Online Market</h2>
		<h3 style="text-align: center;color: #000;">Inventory Left report as at <?php echo date('d D, M Y'); ?></h3>
		<table nae="user" id="user" align="center">
			<tr>
				<th>Item Id</th>
				<th>Thumbnail</th>
				<th>Item Name</th>
				<th>Quantity Left</th>
				<th>Unit Price</th>
				<th>Description</th>
			</tr>

		<?php
			$sql = "SELECT * FROM item;";
			$query = $conn->query($sql);
			while ($result = $query->fetch_assoc()) {
				echo "<tr>";
				echo "<td>{$result['itemId']}</td>";
				echo "<td><img class='thumbnail' src='{$result['thumbnail']}' alt='{$result['itemName']}' ></td>";
				echo "<td>{$result['itemName']}</td>";
				echo "<td>{$result['quantity']}</td>";
				echo "<td>{$result['unitPrice']}</td>";
				echo "<td>{$result['description']}</td>";
				echo "</tr>";
			}
		 ?>

		</table>
		<h4 style="text-align: center;color: #000;"> - END - </h4>
	<script>
		onload = function() {
			_('print').click();
		}
	</script>
<?php require_once("include/bottom.php"); ?>