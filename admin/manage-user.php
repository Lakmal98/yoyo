<?php require_once("include/top.php"); ?>
	
	<div class="main"> 
		<table nae="user" id="user" align="center">
			<tr>
				<th>User Id</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Tele phone</th>
				<th>User Type</th>
				<th>User Status</th>
				<th>Remove</th>
			</tr>

		<?php
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
				echo "<td>{$result['tp']}</td>";
				switch ($result['type']) {
					case 0:
						echo "<td>Admin</td>";
						break;
					default:
						echo "<td>Reguler User</td>";
						break;
				}
				switch ($result['status']) {
					case 1:
						echo "<td>Confirmed user</td>";
						break;
					case 2:
						echo "<td>Banned user</td>";
						break;
					default:
						echo "<td>Unconfirmed user</td>";
						break;
				}
				echo "<td><form method='post'><button type='submit' name='delete' value='{$result['userId']}'><i class='fas fa-trash'></i></button></form></td>";
				echo "</tr>";
			}
		 ?>
		 <?php 
		 	if (isset($_POST['delete'])) {
		 		echo "<script>if(confirm('Delete user {$_POST['delete']} ?')) { location.replace('php-script/delete-user?u={$_POST['delete']}');}</script>";
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