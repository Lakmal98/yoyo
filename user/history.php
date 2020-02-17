<?php require_once('include/check-login.php'); ?>

<?php 
	if (isset($_POST['save'])) {
		$sql = "UPDATE user SET fName = '{$_POST['fName']}', lName = '{$_POST['lName']}', email = '{$_POST['email']}', tp = '{$_POST['tp']}';";

		if ($conn->query($sql) === false) {
			$msg = "<div style='color: red;'>Failed to Update<div>";
		} else {
			$msg = "<div style='color: green;'>Updated Successfully.<div>";
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>YoYo Profile | <?php echo $_SESSION['fName'] . " " . $_SESSION['lName'] ; ?></title>

	<link rel="stylesheet" type="text/css" href="../css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/user.css" >
	<link rel="stylesheet" type="text/css" href="css/profile.css" >

</head>
<body>
	<nav id="nav">
	  <i class="fas fa-bars" onclick="//showSideNav();"></i>
	  <a href="../index"><i class="fas fa-home" title="home"></i></a>
	  <a href="history">
		<i class="fas fa-history" title="Shopping history"></i>
	  </a>
	  <span>
	  	<form action="index" method='get'>
	  		<input type="text" name="s" id="searchBox" placeholder="Search..." title="Search here...">
	  		<button type="submit" name="q" id="submit" value="true"></button>
	  	</form>
		  <i class="fas fa-search" onclick="search();" title="Click here to search"></i>
		  <a href="cart" target="_blank">
		  	<i class="fas fa-shopping-cart" title="cart">
	  		 	<?php 
	  		 		$sql = "SELECT COUNT(userId) FROM cart WHERE userId = {$_SESSION['userId']};";
	  		 		$result  = ($conn->query($sql))->fetch_array();
	  		 		if ($result[0] > 0) {
	  		 			echo "<span>{$result[0]}</span>";
	  		 		}
	  		 	 ?>
		  	</i>
		  </a>
		  <a href="profile">
		  	<i class="fas fa-user" title="Profile"></i>
		  </a>
		  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id='logout-form' method='post'>
				<i class="fas fa-sign-out-alt" onclick="document.getElementById('logout-btn').click();" title="Log out"></i>
			<button type="submit" name="logout" id="logout-btn"></button>
		  </form>
	  </span>
	</nav>
		<h1 style="text-align: center;color: #fff;">Order History will be there</h1>
	<main><!-- 
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
				$sql = "SELECT * FROM orderHistory WHERE userId = {$_SESSION['userId']} ORDER BY pDate DESC LIMIT {$limit}, " . ($limit + 15) . " ;";
				$query = $conn->query($sql);
				while ($result = $query->fetch_assoc()) {
					echo "<tr>";
					echo "<td>{$result['id']}</td>";
					echo "<td>{$result['pDate']}</td>";
					echo $result['details'];
					$data = json_decode($result['details'], true);
					print_r($data);
					die();
					echo $sql = "SELECT thumbnail, itemName, description FROM item WHERE itemId = {$data['itemId']}";
					$queries = $conn->query($sql);
					$results = $queries->fetch_assoc();

					echo "<td><img class='thumbnail' src='{$results['thumbnail']}' alt='thumbnail'></td>";
					echo "<td>{$results['itemName']}</td>";
					echo "<td>{$results['quantity']}</td>";
					echo "<td>{$result['quantity']}</td>";
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
		</div> -->
	</main>
	<script src="js/user.js"></script>
</body>
</html>

<?php $conn->close(); ?>
