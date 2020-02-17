<?php require_once("include/top.php"); ?>
	
	<div class="main"> 
		<table nae="user" id="user" align="center">
			<tr>
				<th>Item Id</th>
				<th>Item Name</th>
				<th>Quantity Left</th>
				<th>Unit Price</th>
				<th>Description</th>
				<th>Thumbnail</th>
				<th>Remove</th>
			</tr>

		<?php
			if (isset($_GET['l'])) {
				$limit = $_GET['l'];
			}else if (!isset($limit)) {
				$limit = 0;
			}
			$sql = "SELECT * FROM item LIMIT {$limit}, " . ($limit + 15) . " ;";
			$query = $conn->query($sql);
			while ($result = $query->fetch_assoc()) {
				echo "<tr>";
				echo "<td>{$result['itemId']}</td>";
				echo "<td><form method='post' action='edit-item'><button class='edit-btn' type='submit' name='itemName' value='{$result['itemName']}'>{$result['itemName']}</button></form></td>";
				echo "<td>{$result['quantity']}</td>";
				echo "<td>{$result['unitPrice']}</td>";
				echo "<td>{$result['description']}</td>";
				echo "<td><img class='thumbnail' src='{$result['thumbnail']}' alt='{$result['itemName']}' ></td>";
				echo "<td><form method='post'><button type='submit' name='delete' value='{$result['itemId']}'><i class='fas fa-trash'></i></button></form></td>";
				echo "</tr>";
			}
		 ?>
		 <?php 
		 	if (isset($_POST['delete'])) {
		 		echo "<script>if(confirm('Delete item {$_POST['delete']} ?')) { location.replace('php-script/delete-item?i={$_POST['delete']}');}</script>";
		 	}
		 ?>

		</table>
		<div class="table-navigation">
			<div>
				<?php 
					$sql = "SELECT COUNT(itemId) FROM item;";
					$query = ($conn->query($sql))->fetch_array();
				 ?>
				<a href="<?php echo $_SERVER['PHP_SELF']  . '?l=0'; ?>"><span>First</span></a>
				<?php if($limit > 0) {echo "<a href='{$_SERVER['PHP_SELF']}?l=" . $limit . "'><span>" . $limit . "</span></a>";} ?>
				<a href="<?php echo $_SERVER['PHP_SELF']  . '?l=' . ($limit + 1); ?>"><span><?php echo $limit + 1; ?></span></a>
				<?php if($query[0] > $limit + 2) {echo "<a href='{$_SERVER['PHP_SELF']}?l=" . ($limit + 2). "'><span>" . ($limit + 2) . "</span></a>";} ?>
				<a href="<?php echo $_SERVER['PHP_SELF']  . '?l=' . $query[0]; ?>"><span>Last</span></a>
			</div>
		</div>
	</div>

<?php require_once("include/bottom.php"); ?>