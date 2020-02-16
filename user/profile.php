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
	  <a href="../index"><i class="fas fa-home"></i></a>
	  <span>
	  	<form action="index" method='get'>
	  		<input type="text" name="s" id="searchBox" placeholder="Search...">
	  		<button type="submit" name="q" id="submit" value="true"></button>
	  	</form>
		  <i class="fas fa-search" onclick="search();"></i>
		  <a href="cart" target="_blank">
		  	<i class="fas fa-shopping-cart">
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
		  	<i class="fas fa-user"></i>
		  </a>
		  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id='logout-form' method='post'>
				<i class="fas fa-sign-out-alt" onclick="document.getElementById('logout-btn').click();"></i>
			<button type="submit" name="logout" id="logout-btn"></button>
		  </form>
	  </span>
	</nav>
	<?php 
 		$sql = "SELECT * FROM user WHERE userId = {$_SESSION['userId']};";
 		$result  = ($conn->query($sql))->fetch_array();
 	 ?>
	<main>
		<div class="form">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
				<label>First Name</label>
				<input type="text" name="fName" value="<?php echo $result['fName']; ?>">
				<label>Last Name</label>
				<input type="text" name="lName" value="<?php echo $result['lName']; ?>">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $result['email']; ?>">
				<label>Telephone</label>
				<input type="number" name="tp" value="<?php echo $result['tp']; ?>">
				<?php 
					if (isset($_POST['save'])) {
						echo $msg;
						$msg = "";
					}
				 ?>
				<button type="submit" name="save" class="btn">SAVE</button>
			</form>
		</div>
		<div class="form2">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
				<label>Current Password</label>
				<input type="password" name="currentPass">
				<label>New Password</label>
				<input type="password" name="newPass">
				<label>Confirm New Password</label>
				<input type="password" name="newPassConf">
				<button class="btn" type="submit" name="change">Update Password</button>
			</form>
		</div>
	</main>
	<script src="js/user.js"></script>
</body>
</html>

<?php $conn->close(); ?>
