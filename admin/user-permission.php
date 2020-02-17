<?php require_once("include/top.php"); ?>
	
	<div class="main"> 
		<table nae="user" id="user" align="center">
			<tr>
				<th>User Id</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>User Type</th>
				<th>User Status</th>
			</tr>

		<?php
			if (isset($_POST['toggleAdmin'])) {
				$sql = "UPDATE user SET type = 0 WHERE userId = {$_POST['toggleAdmin']};";
				if ($conn->query($sql) !== true) {
					echo "<script>alert('Failed to promote the user.');</script>";
				}
				unset($_POST['toggleAdmin']);
			}
			if (isset($_POST['toggleUser'])) {
				$sql = "UPDATE user SET type = 1 WHERE userId = {$_POST['toggleUser']};";
				if ($conn->query($sql) !== true) {
					echo "<script>alert('Failed to demote the Admin.');</script>";
				}
				unset($_POST['toggleUser']);
			}
			if (isset($_POST['ban'])) {
				$sql = "UPDATE user SET status = 2 WHERE userId = {$_POST['ban']};";
				if ($conn->query($sql) !== true) {
					echo "<script>alert('Unable to Ban the User.');</script>";
				}
				unset($_POST['ban']);
			}
			if (isset($_POST['unban'])) {
				$sql = "UPDATE user SET status = 1 WHERE userId = {$_POST['unban']};";
				if ($conn->query($sql) !== true) {
					echo "<script>alert('Unable to Unban the User.');</script>";
				}
				unset($_POST['unban']);
			}
			if (isset($_POST['confirm'])) {
				$sql = "UPDATE user SET status = 1 WHERE userId = {$_POST['confirm']};";
				if ($conn->query($sql) !== true) {
					echo "<script>alert('Unable to confirm the User.');</script>";
				}
				unset($_POST['confirm']);
			}

			if (isset($_GET['l'])) {
				$limit = $_GET['l'];
			}else if (!isset($limit)) {
				$limit = 0;
			}
			$sql = "SELECT * FROM user LIMIT {$limit}, " . ($limit + 15) . " ;";
			$query = $conn->query($sql);
			while ($result = $query->fetch_assoc()) {
				echo "<tr>";
				echo "<td>{$result['userId']}</td>";
				echo "<td>{$result['email']}</td>";
				echo "<td>{$result['fName']}</td>";
				echo "<td>{$result['lName']}</td>";
				switch ($result['type']) {
					case 0:
						echo "<td>Admin <form method='post'><button type='submit' name='toggleUser' value='{$result['userId']}'><i class='icon-btn fas fa-toggle-on'></i></button></form></td>";
						break;
					default:
						echo "<td>Reguler User <form method='post'><button type='submit' name='toggleAdmin' value='{$result['userId']}'><i class='icon-btn fas fa-toggle-off'></i></button></form></td>";
						break;
				}
				switch ($result['status']) {
					case 1:
						echo "<td>Confirmed user <form method='post'><button type='submit' name='ban' value='{$result['userId']}'><i class='icon-btn fas fa-check'></i></button></form></td>";
						break;
					case 2:
						echo "<td>Banned user <form method='post'><button type='submit' name='unban' value='{$result['userId']}'><i class='icon-btn fas fa-ban'></i></button></form></td>";
						break;
					default:
						echo "<td>Uncomfired user <form method='post'><button type='submit' name='confirm' value='{$result['userId']}'><i class='icon-btn fas fa-check'></i></button></form></td>";
						break;
				}
				echo "</tr>";
			}
		 ?>
		
		</table>
		<div class="table-navigation">
			<div>
				<?php 
					$sql = "SELECT COUNT(userId) FROM user;";
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